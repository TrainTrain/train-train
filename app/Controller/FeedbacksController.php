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

App::uses('AppController', 'Controller','Controller/Component/Auth');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class FeedbacksController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('ratings','rating_types','users');

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
	//afficher tous les feedbacks de l'user
	$userId = $this->Auth->user('id');
	$userInfos = $this->users->find('first',array('conditions'=>array('users.id'=>$userId)));
	$ratings = $this->ratings->find('all',array('conditions'=>array('ratings.user_id'=>$userId),'group'=>'ratings.datetime'));
	$this->set('ratings',$ratings);
	$this->set('userInfos',$userInfos);
	$this->set('train', $this->Session->read('train'));
	$this->set('num', $this->Session->read('numTrain'));
	}
  public function add(){

		$this->set('user_id',$this->Auth->user('id'));
		$this->set('train_id',$this->Session->read('numTrain'));
		$ratingTypes = $this->rating_types->find('all');
		//$this->set('ratingTypes',$ratingTypes);

    if ($this->request->is('post'))
		{
			$uId = $this->request->data['Feedback']['user_id'];
			$trainId = $this->request->data['Feedback']['train_id'];
			$valueSecurite = $this->request->data['Feedback']['securite'];
			$valueProprete = $this->request->data['Feedback']['proprete'];
			$valueConfort = $this->request->data['Feedback']['confort'];
			$valueTemperature = $this->request->data['Feedback']['temperature'];
			$comment = $this->request->data['Feedback']['comment'];

			$this->ratings->save(
        array(
          'user_id'=>$uId,
          'train_id'=>$trainId,
					'value'=>$valueSecurite,
          'comment'=>$comment,
          'datetime' => date('Y-m-d H:i:s'),
					'rating_type_id' => 1
        )
      );
			$this->ratings->save(
        array(
          'user_id'=>$uId,
          'train_id'=>$trainId,
					'value'=>$valueProprete,
          'comment'=>$comment,
          'datetime' => date('Y-m-d H:i:s'),
					'rating_type_id' => 2
        )
      );
			$this->ratings->save(
        array(
          'user_id'=>$uId,
          'train_id'=>$trainId,
					'value'=>$valueConfort,
          'comment'=>$comment,
          'datetime' => date('Y-m-d H:i:s'),
					'rating_type_id' => 3
        )
      );
			$this->ratings->save(
        array(
          'user_id'=>$uId,
          'train_id'=>$trainId,
					'value'=>$valueTemperature,
          'comment'=>$comment,
          'datetime' => date('Y-m-d H:i:s'),
					'rating_type_id' => 4
        )
      );

      return $this->redirect(array('controller' => 'Tchoutchou', 'action' => 'main'));
    }
  }
}
