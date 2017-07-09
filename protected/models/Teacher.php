<?php

/**
 * This is the model class for table "{{teacher}}".
 *
 * The followings are the available columns in table '{{teacher}}':
 * @property integer $id
 * @property string $teachername
 */
class Teacher extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{teacher}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('teachername', 'required'),
            array('teachername', 'length', 'max' => 255),
            array('teachername', 'unique', 'message' => 'Уже существует'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, teachername', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'pupils' => array(self::MANY_MANY, 'Pupil', '{{teacher_pupil}}(teacher_id,pupil_id)')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'teachername' => 'Учитель',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('teachername', $this->teachername, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public static function all()
    {
        return CHtml::listData(self::model()->findAll(), 'id', 'teachername');
    }

    public static function teacherStrictlyByGroup($string = null)
    {
        $str = (string)$string;
        $teacher = 'Пусто';
        if (! is_null($str)) {
            $part = explode('|',$str);
            $count = (int)$part[0];
            $pupil_id = $part[1];
            $teacher = Yii::app()->db->createCommand(
                "SELECT teacher_id,teachername 
                      FROM `myl_teacher_pupil` a
                        JOIN `myl_teacher` ON a.teacher_id = myl_teacher.id
                     GROUP BY teacher_id
                    HAVING count(1)={$count} and sum(pupil_id IN ({$pupil_id}))={$count};"
            )->queryAll();
        }


        /*$teacher = Yii::app()->db->createCommand(
            "SELECT teachername
                    FROM `myl_teacher_pupil` a
                          JOIN myl_teacher ON a.teacher_id = myl_teacher.id
                    WHERE  pupil_id IN ({$pupil_id}) AND
                            EXISTS
                            (
                                SELECT  1
                                FROM    `myl_teacher_pupil` b
                                WHERE   a.teacher_id = b.teacher_id
                                GROUP   BY teacher_id
                                HAVING  COUNT(DISTINCT pupil_id) = {$count}
                            )
                    GROUP  BY teacher_id
                    HAVING COUNT(*) = {$count};"
        )->queryAll();*/

        return $teacher;
    }

    public static function teacherByGroupInclusive($string = null)
    {
        $str = (string)$string;
        $teacher = 'Пусто';
        if (!is_null($str)) {
            $part = explode('|',$str);
            $count = $part[0];
            $pupil_id = $part[1];

            $teacher = Yii::app()->db->createCommand(
                "SELECT teacher_id,teachername 
                          FROM `myl_teacher_pupil` a
                            JOIN `myl_teacher` ON a.teacher_id = myl_teacher.id
                         GROUP BY teacher_id
                        HAVING count(1)>{$count} and sum(pupil_id IN ({$pupil_id}))={$count};"
            )->queryAll();
        }
        /*$teacher = Yii::app()->db->createCommand(
            "SELECT teachername
                    FROM `myl_teacher_pupil` a
                          JOIN myl_teacher ON a.teacher_id = myl_teacher.id
                    WHERE  pupil_id IN ({$pupil_id}) AND
                            EXISTS 
                            (
                                SELECT  1
                                FROM    `myl_teacher_pupil` b
                                WHERE   a.teacher_id = b.teacher_id
                                GROUP   BY teacher_id
                                HAVING  COUNT(DISTINCT pupil_id) > {$count}
                            )
                    GROUP  BY teacher_id
                    HAVING COUNT(*) = {$count};"
        )->queryAll();*/

        return $teacher;
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Teacher the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
