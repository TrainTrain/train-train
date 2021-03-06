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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PreferencesController extends AppController {
public $uses = array('UserPreferences');

/**
 * This controller does not use a model
 *
 * @var array	public $uses = array('RatingTypes');

 */
/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
public function beforeFilter(){
  	parent::beforeFilter();
  }


	public function index() {
    $preferences = $this->UserPreferences->find('all', ['conditions' => ['user_id' => $this->Auth->user('id')]]);
	}

  public function add(){
    $query = "SELECT id, name FROM preferences LEFT JOIN user_preferences ON preferences.id = user_preferences.preferences_id WHERE user_id IS NULL";
    $preferences = $this->UserPreferences->query($query);
    $this->set('preferences', $preferences);
  }
}
