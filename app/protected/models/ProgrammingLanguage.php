<?php

/**
 * This is the model class for table "programming_language".
 *
 * The followings are the available columns in table 'programming_language':
 * @property integer $prolan_id
 * @property string $prolan_name
 * @property string $prolan_desc
 * @property string $prolan_createdate
 */
class ProgrammingLanguage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'programming_language';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prolan_name, prolan_desc, prolan_createdate', 'required'),
			array('prolan_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('prolan_id, prolan_name, prolan_desc, prolan_createdate', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'prolan_id' => 'Prolan',
			'prolan_name' => 'Prolan Name',
			'prolan_desc' => 'Prolan Desc',
			'prolan_createdate' => 'Prolan Createdate',
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

		$criteria->compare('prolan_id',$this->prolan_id);
		$criteria->compare('prolan_name',$this->prolan_name,true);
		$criteria->compare('prolan_desc',$this->prolan_desc,true);
		$criteria->compare('prolan_createdate',$this->prolan_createdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProgrammingLanguage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
