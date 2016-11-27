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
class TchoutchouController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Horaire');

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

  public function setId(){
    if ($this->request->is('post')) {
      $num = $this->request->data['tchoutchou']['num'];
			//debug($num).die();
      $date_sql = date('Y-m-d');
      $num_jour_sem = date('N');
      $query = 'SELECT * FROM horaires WHERE num = '.$num.' AND (CONV(frequence,2,10) & POW(2,(7-'.$num_jour_sem.'))) AND "'.$date_sql.'" BETWEEN debut_val AND fin_val ORDER BY etape ASC';
      $horaires = $this->Horaire->query($query);
      $this->Session->write('train', $horaires);
      $this->Session->write('numTrain', $num);
      //return $this->redirect(array('controller' => 'Tchoutchou', 'action' => 'index'));
    }
  }
	public function main(){
		$train = $this->Session->read('train');
		$num = $this->Session->read('numTrain');
		//debug($train).die();
		$this->set('train', $train);
		$this->set('num', $num);
	}

	public function index() {
		if ($this->request->is('post')) {
			$num = $this->request->data['num'];
			$date_sql = date('Y-m-d');
			$num_jour_sem = date('N');
			$query = 'SELECT * FROM horaires WHERE num = '.$num.' AND (CONV(frequence,2,10) & POW(2,(7-'.$num_jour_sem.'))) AND "'.$date_sql.'" BETWEEN debut_val AND fin_val ORDER BY etape ASC';
			$horaires = $this->Horaire->query($query);
			$this->Session->write('train', $horaires);
			$this->Session->write('numTrain', $num);
			return $this->redirect(array(
				'controller' => 'Tchoutchou',
				'action' => 'main'
			));
		}
	}
}
