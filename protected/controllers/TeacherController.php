<?php

class TeacherController extends Controller
{
	public function actionIndex()
	{
        $models=Teacher::model()->findAll();

		$this->render('index',array('models'=>$models));
	}

	public function actionView($id)
	{
        $model=Teacher::model()->findByPk($id);
        $this->render('view',array('model'=>$model));
	}

	public function count($id)
    {
        $count = TeacherPupil::model()->count('teacher_id = :teacher_id', array(':teacher_id' => $id));
        return $count;
    }
}