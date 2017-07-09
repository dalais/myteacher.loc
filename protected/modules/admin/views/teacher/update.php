<?php

$this->menu=array(
	array('label'=>'К списку учителей', 'url'=>array('index')),
	array('label'=>'Добавить нового учителя', 'url'=>array('create')),
);
?>

<h1>Изменение учителя <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>