<p>
    Здесь вы можете сделать поиск учителей по определенному набору учеников
</p>
<font size="2" color="#5f9ea0">Введите имена учеников через пробел и нажмите "Найти"</font>

<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tracing-form',
        'clientOptions' => array(
            'validateOnSubmit' => true,

        ),
        'enableAjaxValidation'=>true,
    )); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'string_search'); ?>
        <?php echo $form->textArea($model, 'string_search'); ?>
        <?php echo $form->error($model, 'string_search'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Найти'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>

<br>
<br>

<table class="table table-bordered">
    <thead>
    <tr>
        <th><h5>Искомый набор учеников</h5></th>
        <th><p>Учителя у которых ТОЛЬКО<br> данный набор учеников</p></th>
        <th><p>Учителя у которых данный набор<br> В ТОМ ЧИСЛЕ среди его учеников</p></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="width: 300px">
            <p class="text-error">
                <?php

                if (isset($pupil)) {
                    if (!empty($pupil)) {
                        echo '<br>';
                        foreach ($pupil as $item) {
                            echo '<p>' . $item['pupilname'] . '</p>';
                        }
                        echo '<hr>'.'<br>'.'<p>'.'<font style="color: #8a1f11" size="3">
                            Внимание! Если в отображенном
                        <br>списке нет некоторых введенных
                        <br>вами имен, то, пожалуйста, проверьте
                        <br>есть ли такие имена в <a href="pupil/index">списке учеников</a></font>'.'</p>';
                    } else {
                        echo 'Пусто';
                        echo '<hr>'.'<br>'.'<p>'.'<font style="color: #8a1f11" size="3">
                            Внимание! Если в отображенном
                        <br>списке нет некоторых введенных
                        <br>вами имен, то, пожалуйста, проверьте
                        <br>есть ли такие имена в <a href="pupil/index">списке учеников</a></font>'.'</p>';
                    }
                }

                ?>

            </p>
        </td>
        <td><?php
            if (isset($teacher)) {
                if (!empty($teacher)) {
                    echo '<br>';
                    foreach ($teacher as $item) {
                        echo CHtml::link('<h4>'.$item['teachername'].'</h4>',array('teacher/view','id'=>$item['teacher_id']));
                    }
                } else {
                    echo 'Пусто';
                }
            }
            ?>
        </td>
        <td>
            <?php

            if (isset($teacherInc)) {
                if (!empty($teacherInc)) {
                    echo '<br>';
                    foreach ($teacherInc as $item) {
                        $model = new TracingController($item['teacher_id']);
                        $count = $model->count($item['teacher_id']);
                        $c = '-';
                        if (!empty($count)) {
                            $c = $count;
                        } else {
                            $c = '-';
                        }
                        echo CHtml::link('<span style="font-size: large">'.$item['teachername'].'</span>',array('teacher/view','id'=>$item['teacher_id'])).'&nbsp&nbsp'.'уч-ов: '.$c.'<br>'.'<br>';
                    }
                } else {
                    echo 'Пусто';
                }
            }
            ?>
        </td>
    </tr>
    </tbody>
</table>


<!--SELECT *
FROM(SELECT myl_teacher.teachername, GROUP_CONCAT(myl_pupil.pupilname) groups
FROM myl_teacher
LEFT JOIN  myl_teacher_pupil ON myl_teacher_pupil.teacher_id  = myl_teacher.id
LEFT JOIN myl_pupil  ON myl_teacher_pupil.pupil_id = myl_pupil.id
GROUP BY myl_teacher.teachername) res
WHERE res.groups = 'Георгий,Харитон,Денис,Андрей'-->
