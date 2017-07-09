<?php
/* @var $this PupilController */

$this->breadcrumbs=array(
	'Ученики'=>array('/pupil'),
	$model->pupilname,
);
?>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Ученик</th>
        <th>Учителя</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><h3 class="text-info"><?php echo $model->pupilname; ?></h3></td>
        <td><?php
            if (! empty($model->teachers)) {
                foreach($model->teachers as $teachers)
                {
                    echo $teachers->teachername,'<br/>';
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
