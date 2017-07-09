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

        $id_p = null;
        $teacher = null;
        $teacherInc = null;
        $counter = 0;
        $result = null;
        if (! empty($model->pupils)) {
            foreach($model->pupils as $pupils) {
                $id_p .= $pupils->id.',';
                $counter++;
            }
            $str_id = rtrim($id_p,',');
            $result = $counter . '|' . $str_id;

            if ($counter == 0) {
                $result = null;
            }

            if ($result != null) {
                $teacherInc = Teacher::teacherByGroupInclusive($result);
                $teacher = Teacher::teacherStrictlyByGroup($result);
            }


        }

        $this->render('view',array('model'=>$model,'teacher'=>$teacher,'teacherInc'=>$teacherInc));
	}

	public function count($id)
    {
        $count = TeacherPupil::model()->count('teacher_id = :teacher_id', array(':teacher_id' => $id));
        return $count;
    }
}