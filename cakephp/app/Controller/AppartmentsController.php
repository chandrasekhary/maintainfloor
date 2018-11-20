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
class AppartmentsController extends AppController {
	
	var $uses = array('Appartment');

public function beforeFilter() {
    parent::beforeFilter();
    // Allow Appartments to register and logout.
    $this->Auth->allow('admin_add', 'admin_logout');
}


    public function admin_index() {
		
        $this->Appartment->recursive = 0;
		$uid = $this->Auth->user('id');
        
		$arrAppartments = $this->Appartment->find('all', array(
        'conditions' => array('Appartment.admin_id' => $uid)
    ));
	
		
		$this->set('Appartments', $arrAppartments);
    }
	
	public function admin_all() {
		
        $this->Appartment->recursive = 0;
		$uid = $this->Auth->user('id');
        
		$arrAppartments = $this->Appartment->find('all');
	
		
		$this->set('Appartments', $arrAppartments);
    }

    public function admin_view($id = null) {
        $this->Appartment->id = $id;
        if (!$this->Appartment->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->Appartment->findById($id));
    }

    public function admin_add () {
        		
		$this->loadModel('User');		
		$uid = $this->Auth->user('id');        
		$arrAuthors = $this->User->find('all');	
		
		$arrUpdatedAuthers[0] = array('-Select-');
		for($i = 0; $i < count($arrAuthors); $i++){
			$uid = $arrAuthors[$i]['User']['id'];
			$uname = $arrAuthors[$i]['User']['username'];
			$arrUpdatedAuthers[$uid]= $uname;
		}		
		$this->set('Authors', $arrUpdatedAuthers);					
			
		
		if ($this->request->is('post')) {
            $this->Appartment->create();
			
			
			/* code */
			if(!empty($this->data))
                {
                    //Check if image has been uploaded
                    if(!empty($this->data['Appartment']['vr_url']['name']))
                    {
                        $file = $this->data['Appartment']['vr_url']; //put the data into a var for easy use
						   $file2 = $this->data['Appartment']['image_url']; //put the data into a var for easy use

						/*
                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                        $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
						*/
						
                        //only process if the extension is valid
                        if(in_array($ext, $arr_ext))
                        {
                            //do the actual uploading of the file. First arg is the tmp name, second arg is
                            //where we are putting it
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'CakePHP/app/webroot/img/' . 
							$file['name']);
							
							move_uploaded_file($file2['tmp_name'], WWW_ROOT . 'CakePHP/app/webroot/img/' . $file['name']);

                            //prepare the filename for database entry
                            $this->request->data['Appartment']['vr_url'] = $file['name'];
							$this->request->data['Appartment']['image_url'] = $file2['name'];
                        }
                    }

                    //now do the save
                   // $this->products->save($this->data) ;
				   if ($this->Appartment->save($this->request->data)) {
                $this->Flash->success(__('The details are saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The Appartment could not be saved. Please, try again.')
            );
				   
                }
				/* code */
				/*
				https://stackoverflow.com/questions/23353568/cake-php-image-upload
				*/
				
			
			
			
            
        }
    }

    public function admin_edit($id = null) {
        $this->Appartment->id = $id;
		
		$this->loadModel('User');		
		$uid = $this->Auth->user('id');        
		$arrAuthors = $this->User->find('all');	
		
		$arrUpdatedAuthers[0] = array('-Select-');
		for($i = 0; $i < count($arrAuthors); $i++){
			$uid = $arrAuthors[$i]['User']['id'];
			$uname = $arrAuthors[$i]['User']['username'];
			$arrUpdatedAuthers[$uid]= $uname;
		}		
		$this->set('Authors', $arrUpdatedAuthers);
		
        if (!$this->Appartment->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Appartment->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The appartment could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Appartment->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function admin_delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->Appartment->id = $id;
        if (!$this->Appartment->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Appartment->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
