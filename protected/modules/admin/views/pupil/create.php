<?php

$this->menu=array(
	array('label'=>'К списку учеников', 'url'=>array('index'))
);
?>

<h1>Добавление нового ученика</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>