<?php
/* @var $this TeacherController */

$this->breadcrumbs=array(
	'Учителя',
);
?>
<?php

    foreach($models as $one)
    {
        $model = new TeacherController($one->id);
        $count = $model->count($one->id);
        $c = '-';
        if (!empty($count)) {
            $c = $count;
        } else {
            $c = '-';
        }
        echo CHtml::link('<h4 class="text-error">'.$one->teachername.'</h4>' ,array('view','id'=>$one->id))
            . 'Кол-во учеников '.'&nbsp;&nbsp;&nbsp;'.'<font size="5">'. $c .'</font>';
        echo '<br/>';
        echo '<br/>';
        echo '<hr/>';
    }


?>
