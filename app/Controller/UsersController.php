<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
public function beforeFilter(){
	parent::beforeFilter();
	// Allow users to register and logout.
	$this->Auth->allow('add', 'logout');
}

	public function index() {

	}

  public function view(){
    $users = $this->User->find('all');
    $this->set('users', $users);
  }

	public function add(){
		if ($this->request->is('post')) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->request->data['User']['password'] = $passwordHasher->hash($this->request->data['User']['password']);

				$this->User->create();
				if ($this->User->save($this->request->data)) {
						$this->Flash->success(__('The user has been saved'));
						return $this->redirect(array('controller' => 'Tchoutchou', 'action' => 'setId'));
				}
				$this->Flash->error(
						__('The user could not be saved. Please, try again.')
				);
		}
	}

	public function login(){
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				debug($this->Auth->user());
				return $this->redirect(array('controller' => 'Tchoutchou', 'action' => 'index'));
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
	}
}
