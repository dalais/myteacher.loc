<?php

class PupilController extends Controller
{
	public function actionIndex()
	{
        $models=Pupil::model()->findAll();
		$this->render('index',array('models'=>$models));
	}

	public function actionView($id)
	{
        $model=Pupil::model()->findByPk($id);
		$this->render('view',array('model'=>$model));
	}
}