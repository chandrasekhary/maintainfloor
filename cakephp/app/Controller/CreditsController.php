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
class CreditsController extends AppController {
	
//	var $uses = array('Credit');

public function beforeFilter() {
    parent::beforeFilter();
    // Allow Credits to register and logout.
    $this->Auth->allow('admin_add', 'admin_logout');
}


    public function admin_index() {
		
        $this->Credit->recursive = 0;
		
		$arrCredits = $this->Credit->find('all');	
		
		$this->set('arrCredits', $arrCredits);
    }

    public function admin_view($id = null) {
        $this->Credit->id = $id;
        if (!$this->Credit->exists()) {
            throw new NotFoundException(__('Invalid Credit'));
        }
        $this->set('Credit', $this->Credit->findById($id));
    }

    public function admin_add () {
		
		if ($this->request->is('post')) {			
			
			
			echo "<pre>";
			print_r($this->request->data);
			
            $this->Credit->create();
            if ($this->Credit->save($this->request->data)) {
                $this->Flash->success(__('The Credit has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The Credit could not be saved. Please, try again.')
            );
        }
    }

    public function admin_edit($id = null) {
        $this->Credit->id = $id;
        if (!$this->Credit->exists()) {
            throw new NotFoundException(__('Invalid Credit'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Credit->save($this->request->data)) {
                $this->Flash->success(__('The Credit has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The Credit could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Credit->findById($id);
            unset($this->request->data['Credit']['password']);
        }
    }

    public function admin_delete($id = null) {
        $this->request->allowMethod('post');

        $this->Credit->id = $id;
        if (!$this->Credit->exists()) {
            throw new NotFoundException(__('Invalid Credit'));
        }
        if ($this->Credit->delete()) {
            $this->Flash->success(__('Credit deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Credit was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
