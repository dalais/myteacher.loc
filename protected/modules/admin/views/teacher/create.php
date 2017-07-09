<?php
$this->menu=array(
	array('label'=>'К списку учителей', 'url'=>array('index')),
);
?>

<h1>Добавление нового учителя</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>