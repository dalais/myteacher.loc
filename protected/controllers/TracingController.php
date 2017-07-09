<?php

class TracingController extends Controller
{
	public function actionIndex()
	{

        $model = new TracingForm;
        $data = null;
        $teacher = null;
        $pupil = null;
        $teacherInc = null;

        if(isset($_POST['TracingForm']))
        {
            $model->attributes=$_POST['TracingForm'];

            if (! ctype_space($model->string_search) && ! empty($model->string_search)) {
                $str_res = null;
                $string = $model->string_search;

                if (! empty($string)) {
                    $str_trim = trim($string,' ');
                    $str_res = '\'' . str_replace(' ', '\',\'', $str_trim) . '\'';
                } else {
                    $str_res = null;
                }

                $data = Pupil::tracing($str_res);

                if ($data != null) {
                    $teacher = Teacher::teacherStrictlyByGroup($data);
                    $teacherInc = Teacher::teacherByGroupInclusive($data);
                }
                $pupil = Yii::app()->db->createCommand(
                    "SELECT * from  `myl_pupil`
                  WHERE pupilname IN ({$str_res});"
                )->queryAll();
            }
        }
        $this->render('index', array('model'=>$model, 'data'=>$data, 'teacher'=>$teacher,'teacherInc'=> $teacherInc, 'pupil'=>$pupil));
	}

	public function actionView()
	{
		$this->render('view');
	}

    public function count($id)
    {
        $count = TeacherPupil::model()->count('teacher_id = :teacher_id', array(':teacher_id' => $id));
        return $count;
    }


    /*
    SET @c = 'xxx,yyy,zzz';

    SELECT * from countries
    WHERE FIND_IN_SET(countryname,@c);*/

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}