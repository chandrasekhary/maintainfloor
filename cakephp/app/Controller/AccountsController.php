<?php


App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AccountsController extends AppController {
	
	var $uses = array('Account');

public function beforeFilter() {
    parent::beforeFilter();
    // Allow Accounts to register and logout.
    $this->Auth->allow('admin_add', 'admin_logout');
}


    public function admin_index() {
		
        $this->Account->recursive = 0;
		$uid = $this->Auth->user('id');
		
		$user_id = $uid;
		
		if(isset($this->request->params['pass'][0])){
			$user_id = $this->request->params['pass'][0];
		}
     	
		$this->loadModel('Account');
		$arrAccounts =$this->Account->query('select * from accounts where admin_id='.$user_id);
			
		$this->set('arrAccounts', $arrAccounts);
	
		
    }

    public function admin_view($id = null) {
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->Account->findById($id));
    }

    public function admin_add () {
		
		$this->loadModel('Appartment');
			
		
		$uid = $this->Auth->user('id');
        
		
		
		$arrAccountCategory = array(1=> "Credit", '2' => "Debit");
		$this->set('arrAccountCategory', $arrAccountCategory);
		$arrAppartments = $this->Appartment->find('all', array(
        'conditions' => array('Appartment.admin_id' => $uid)
    ));
	
		$this->set('arrAppartments', $arrAppartments);
		$this->set('admin_id', $uid);


		
        if ($this->request->is('post')) {
			
		    $this->Account->create();
            if ($this->Account->save($this->request->data)) {
                $this->Flash->success(__('The Account has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The Account could not be saved. Please, try again.')
            );
        }
    }
	
	

    public function admin_edit($id = null) {
		
		
		$this->loadModel('Appartment');		
		$uid = $this->Auth->user('id');        
		
		$arrAccountCategory = array(1=> "Credit", '2' => "Debit");
		$this->set('arrAccountCategory', $arrAccountCategory);
		$this->set('arrCredits', $arrUpdatedCredits);
		$this->set('arrDebits', $arrUpdatedDebits);
		$this->set('admin_id', $uid);

		$arrAppartments = $this->Appartment->find('all', array(
        'conditions' => array('Appartment.admin_id' => $uid)
    ));
	
		$this->set('arrAppartments', $arrAppartments);
		
				
        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Account->save($this->request->data)) {
                $this->Flash->success(__('The Account has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The Account could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Account->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function admin_delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->Account->id = $id;
        if (!$this->Account->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Account->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
