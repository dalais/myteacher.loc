<?php
/* @var $this PupilController */

$this->breadcrumbs=array(
	'Ученик',
);
?>
<?php
    foreach($models as $one)
    {
        echo CHtml::link($one->pupilname.'<br>',array('view','id'=>$one->id));
    }

?>
