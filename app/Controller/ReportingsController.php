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

App::uses('AppController', 'Controller', 'Controller/Component/Auth');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class ReportingsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
  public function index()
	{
		$trainId =$this->Session->read('numTrain');
		//$this->set('reportings',$this->reportings->find('all',array('conditions'=>array('trainid'=>$trainId))));
		$this->loadModel('reportings');
		$reportings = $this->reportings->query("SELECT * FROM reportings WHERE trainid = ".$trainId." and datetime like '".date('Y-m-d')."%' ");
		$this->set('reportings',$reportings);


	}

  public function add(){

    $this->set('user_id',$this->Auth->user('id'));
    $this->set('train_id',$this->Session->read('numTrain'));
    if ($this->request->is('post'))
    {

      $userId = $this->request->data['Reporting']['user_id'];
      $trainId = $this->request->data['Reporting']['train_id'];
      $type = $this->request->data['Reporting']['types'];
      $content = $this->request->data['Reporting']['content'];

			$this->loadModel('reportings');
			$reportings = $this->reportings->query("INSERT INTO reportings (userid,trainid,type,content,datetime) VALUES (".$userId.",".$trainId.",'".$type."','".$content."','".date('Y-m-d H:i:s')."')");

     return $this->redirect(array('controller' => 'TchouTchou', 'action' => 'index'));
    }
  }
}
