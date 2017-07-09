<?php

/**
 * This is the model class for table "{{teacher_pupil}}".
 *
 * The followings are the available columns in table '{{teacher_pupil}}':
 * @property integer $id
 * @property integer $teacher_id
 * @property integer $pupil_id
 */
class TeacherPupil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{teacher_pupil}}';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('teacher_id, pupil_id', 'required'),
			array('teacher_id, pupil_id', 'numerical', 'integerOnly'=>true),
			array('pupil_id', 'ext.CompositeUniqueKeyValidator', 'keyColumns' => 'teacher_id, pupil_id'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, teacher_id, pupil_id', 'safe', 'on'=>'search'),
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
            'teacher'=>array(self::BELONGS_TO, 'Teacher','teacher_id'),
            'pupil'=>array(self::BELONGS_TO, 'Pupil','pupil_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'teacher_id' => 'Учитель',
			'pupil_id' => 'Ученик',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('pupil_id',$this->pupil_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TeacherPupil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
