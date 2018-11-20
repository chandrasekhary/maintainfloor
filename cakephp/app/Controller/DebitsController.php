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
class DebitsController extends AppController {
	
//	var $uses = array('Debit');

public function beforeFilter() {
    parent::beforeFilter();
    // Allow Debits to register and logout.
   // $this->Auth->allow('admin_add', 'admin_logout');
   
   
   
    if ($this->Auth->user('role') == "superadmin"){
        return true;
    }

    // Default deny
    return false;

}


    public function admin_index() {
		
        $this->Debit->recursive = 0;
		
		$arrDebits = $this->Debit->find('all');	
		
		$this->set('arrDebits', $arrDebits);
    }

    public function admin_view($id = null) {
        $this->Debit->id = $id;
        if (!$this->Debit->exists()) {
            throw new NotFoundException(__('Invalid Debit'));
        }
        $this->set('Debit', $this->Debit->findById($id));
    }

    public function admin_add () {
		
		if ($this->request->is('post')) {			
			
			
            $this->Debit->create();
            if ($this->Debit->save($this->request->data)) {
                $this->Flash->success(__('The Debit has been saved'));
		       return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The Debit could not be saved. Please, try again.')
            );
        }
    }

    public function admin_edit($id = null) {
        $this->Debit->id = $id;
        if (!$this->Debit->exists()) {
            throw new NotFoundException(__('Invalid Debit'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Debit->save($this->request->data)) {
                $this->Flash->success(__('The Debit Category has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The Debit Category could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Debit->findById($id);
            unset($this->request->data['Debit']['password']);
        }
    }

    public function admin_delete($id = null) {
        $this->request->allowMethod('post');

        $this->Debit->id = $id;
        if (!$this->Debit->exists()) {
            throw new NotFoundException(__('Invalid Debit'));
        }
        if ($this->Debit->delete()) {
            $this->Flash->success(__('Debit Category Deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Debit was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
