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
class FlatsController extends AppController {
	
	var $uses = array('Flat');

public function beforeFilter() {
    parent::beforeFilter();
    // Allow Flats to register and logout.
    $this->Auth->allow('admin_add', 'admin_logout');
}


    public function admin_index() {
		
		$appartment_id =  $this->request->params['pass'][0];
		
        $this->Flat->recursive = 0;
		$uid = $this->Auth->user('id');
        
		$arrFlats = $this->Flat->find('all', array(
        'conditions' => array('Flat.appartment_id' => $appartment_id)
    ));
	
		
		$this->set('Flats', $arrFlats);
		$this->set('appartment_id', $appartment_id);
    }

    public function admin_view($id = null) {
        $this->Flat->id = $id;
        if (!$this->Flat->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->Flat->findById($id));
    }

    public function admin_add () {
		
		$appartment_id =  $this->request->params['pass'][0];
		$this->set('appartment_id', $appartment_id);
		
		
		$this->loadModel('User');
		
		$uid = $this->Auth->user('id');
        
		$arrAuthors = $this->User->find('all');
	
		
		$arrUpdatedAuthers = array();
		for($i = 0; $i < count($arrAuthors); $i++){
			$uid = $arrAuthors[$i]['User']['id'];
			$uname = $arrAuthors[$i]['User']['username'];
			$arrUpdatedAuthers[$uid]= $uname;
		}
		
		$this->set('Authors', $arrUpdatedAuthers);
		
        if ($this->request->is('post')) {
			
			//echo "<pre>";
			//print_r($this->request->data);
			
			 $appartment_id = $this->request->data['Flat']['appartment_id'];
		//	exit;
            $this->Flat->create();
            if ($this->Flat->save($this->request->data)) {
                $this->Flash->success(__('The Flat has been saved'));
                return $this->redirect(array('action' => 'index', $appartment_id));
            }
            $this->Flash->error(
                __('The Flat could not be saved. Please, try again.')
            );
        }
    }

    public function admin_edit($id = null) {
        $this->Flat->id = $id;
        if (!$this->Flat->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Flat->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Flat->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function admin_delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->Flat->id = $id;
        if (!$this->Flat->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Flat->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
