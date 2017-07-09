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
        <td>
            <h3 class="text-error"><?php echo $model->teachername; ?></h3>
            <?php
            if (! empty($teacher)) {
                foreach ($teacher as $item) {
                    if ($item['teachername'] !== $model->teachername) {
                        echo '<hr style="height: 5px; width: 50%;">';
                        echo '<font size="3">Такой же набор учеников у:</font>'.'<br><br>';
                    }
                }

                foreach ($teacher as $item) {
                    if ($item['teachername'] !== $model->teachername) {
                        echo '<h5>'.$item['teachername'].'</h5><br>';
                    }
                }
            }
            ?>
        </td>
        <td><?php

                if (! empty($model->pupils)) {
                    foreach($model->pupils as $pupils) {
                        echo $pupils->pupilname . '<br/>';
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
        <td>

        </td>
        <td>
            <?php

            if (! empty($teacherInc)) {
                echo '<font size="3">Учителя у которых данные ученики<br> среди общего числа учеников:</font>'.'<br><br>';
                foreach ($teacherInc as $item) {
                    echo '<h5>'.$item['teachername'].'</h5><br>';
                }
            }

            ?>
        </td>
    </tr>
    </tbody>
</table>


