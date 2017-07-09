<?php
/* @var $this TeacherPupilController */
/* @var $model TeacherPupil */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'teacher_id'); ?>
		<?php echo $form->textField($model,'teacher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pupil_id'); ?>
		<?php echo $form->textField($model,'pupil_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->