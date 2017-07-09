<?php
$this->menu=array(
	array('label'=>'Создать новую связку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#teacher-pupil-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал связей</h1>


<?php echo CHtml::link('Поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'teacher-pupil-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id'=>array(
            'name'=>'id',
            'headerHtmlOptions'=>array('width'=>40)
        ),
		'teacher_id'=>array(
            'name'=>'teacher_id',
            'value'=>'$data->teacher->teachername',
            'filter'=>Teacher::all()
        ),
		'pupil_id'=>array(
            'name'=>'pupil_id',
            'value'=>'$data->pupil->pupilname',
            'filter'=>Pupil::all()
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{delete}'
		),
	),
)); ?>
