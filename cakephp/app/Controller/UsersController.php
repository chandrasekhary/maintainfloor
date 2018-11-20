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
class UsersController extends AppController {

public function beforeFilter() {
    parent::beforeFilter();
	
    // Allow users to register and logout.
    $this->Auth->allow('admin_add', 'admin_logout');
}

public function admin_login() {
    if ($this->request->is('post')) {
			
	if($_POST['g-recaptcha-response'] == ""){
		$this->Flash->error(__('Please click the captcha'));
		return $this->redirect(array('controller' => 'users', 'action' => 'login'));
	}

	$res = $this->post_captcha($_POST['g-recaptcha-response']);

	if (!$res['success']) {
		echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
	} 
		
		
        if ($this->Auth->login()) {
			//	print_r($this->Auth);
			if($this->Auth->user('role') == "superadmin"){
			return $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
			}else if($this->Auth->user('role') == "admin"){
				return $this->redirect(array('controller' => 'users', 'action' => 'index'));
			
			}else if($this->Auth->user('role') == "author"){
				return $this->redirect(array('controller' => 'users', 'action' => 'authorlist'));
			
			}else{
				return $this->redirect(array('controller' => 'users', 'action' => 'autherlist'));
			
			}
        }
        $this->Flash->error(__('Invalid username or password, try again'));
    }
}

public function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LdpMXAUAAAAANSoiUeKdrnUEnxvGXiGBe8Qn3yC',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
		$this->autoRender = false;
    }

	public function admin_dashboard(){
		/*
		$this->User->recursive = 0;
			$this->set('users', $this->paginate());
		*/	
			$arrAuthors = $this->User->find('all', array(
			'conditions' => array('User.role' => 'admin')
		));
		
		$this->set('users', $arrAuthors);
	}

	public function admin_authorlist(){
		
		$uid = $this->Auth->user('id');
		$this->loadModel('Flat');
		$data=$this->Flat->query('select * from flats, appartments where flats.user_id = 12 and flats.appartment_id = appartments.id');
		$this->set('arrUserDetails', $data);
	}

	public function admin_logout() {
		return $this->redirect($this->Auth->logout());
	}


    public function admin_index() {
		$arrAuthors = $this->User->find('all', array(
        'conditions' => array('User.role' => 'admin')
    ));
	
	$this->set('users', $arrAuthors);
    }
	

    public function admin_view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function admin_add() {
		
		$role = "author";
		if(isset($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "admin"){
			$role = "admin";
		}
		$this->set('role', $role);
        if ($this->request->is('post')) {
			
			
			if($_POST['g-recaptcha-response'] == ""){
				$this->Flash->error(__('Please click the captcha'));
				return $this->redirect(array('controller' => 'users', 'action' => 'login'));
			}

			$res = $this->post_captcha($_POST['g-recaptcha-response']);

			if (!$res['success']) {
				echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
			}
			
			
            $this->User->create();
			
			if(isset($this->request->data['User']['password'])){
				 $password = $this->request->data['User']['password'];
				
				 $confirm_password = $this->request->data['User']['confirm_password'];
				//exit;
				
				
				if($password != $confirm_password){
					$this->Flash->error(
						__('Password and confirm password are not same.')
					);
					return $this->redirect(array('action' => 'add'));
				}	
			}
			
			
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function admin_edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function admin_delete($id = null) {

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
