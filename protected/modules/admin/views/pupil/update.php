<?php
$this->menu=array(
	array('label'=>'К списку учеников', 'url'=>array('index')),
	array('label'=>'Добавить нового ученика', 'url'=>array('create'))
);
?>

<h1>Изменение ученика <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>