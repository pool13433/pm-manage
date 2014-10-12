<?php

/**
 * This is the model class for table "uml".
 *
 * The followings are the available columns in table 'uml':
 * @property integer $uml_id
 * @property string $uml_name
 * @property string $uml_desc
 * @property integer $uml_group
 * @property string $uml_createdate
 */
class Uml extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'uml';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uml_name, uml_desc, uml_group, uml_createdate', 'required'),
			array('uml_group', 'numerical', 'integerOnly'=>true),
			array('uml_name', 'length', 'max'=>100),
			array('uml_desc', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uml_id, uml_name, uml_desc, uml_group, uml_createdate', 'safe', 'on'=>'search'),
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
			'uml_id' => 'Uml',
			'uml_name' => 'Uml Name',
			'uml_desc' => 'Uml Desc',
			'uml_group' => 'Uml Group',
			'uml_createdate' => 'Uml Createdate',
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

		$criteria->compare('uml_id',$this->uml_id);
		$criteria->compare('uml_name',$this->uml_name,true);
		$criteria->compare('uml_desc',$this->uml_desc,true);
		$criteria->compare('uml_group',$this->uml_group);
		$criteria->compare('uml_createdate',$this->uml_createdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Uml the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
