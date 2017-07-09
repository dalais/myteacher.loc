<?php
$this->menu=array(
	array('label'=>'Журнал', 'url'=>array('index')),
);
?>

<h1>Создание новой связки</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>