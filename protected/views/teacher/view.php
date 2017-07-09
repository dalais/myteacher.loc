<?php
/* @var $this TeacherController */

$this->breadcrumbs=array(
	'Учителя'=>array('/teacher'),
	$model->teachername,
);

?>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Учитель</th>
        <th>Ученики</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><h3 class="text-error"><?php echo $model->teachername; ?></h3></td>
        <td><?php

                if (! empty($model->pupils)) {
                    foreach($model->pupils as $pupils) {
                        echo $pupils->pupilname, '<br/>';
                        echo '<br/>';
                    }
                } else {
                    echo '<br>';
                    echo 'пусто';
                }


            ?>
        </td>
    </tr>
    <tr>
        <td>...</td>
        <td>...</td>
    </tr>
    </tbody>
</table>


