<?php

/**
 * This is the model class for table "{{pupil}}".
 *
 * The followings are the available columns in table '{{pupil}}':
 * @property integer $id
 * @property string $pupilname
 */
class Pupil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{pupil}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pupilname', 'required'),
			array('pupilname', 'length', 'max'=>255),
			array('pupilname', 'unique', 'message'=>'Этот ученик уже записан'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pupilname', 'safe', 'on'=>'search'),
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
            'teachers'=>array(self::MANY_MANY, 'Teacher','{{teacher_pupil}}(pupil_id,teacher_id)')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pupilname' => 'Ученик',
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
		$criteria->compare('pupilname',$this->pupilname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public static function all()
    {
        return CHtml::listData(self::model()->findAll(),'id','pupilname');
    }

    public static function tracing($string=null)
    {
        $string = '\''.str_replace(' ','\',\'',$string).'\'';

        $pupil = Yii::app()->db->createCommand(
            "SELECT * from  `myl_pupil`
                  WHERE pupilname IN ({$string});"
        )->queryAll();
        $data = null;
        $counter = 0;
        foreach ($pupil as $key) {
            $data .= $key['id'] . ',';

            $counter++;
        }

        $res = rtrim($data,',');

        return $counter.'|'.$res;
    }


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pupil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
