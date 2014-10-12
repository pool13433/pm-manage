<?php

/**
 * This is the model class for table "tools_database".
 *
 * The followings are the available columns in table 'tools_database':
 * @property integer $tooldata_id
 * @property string $tooldata_name
 * @property string $tooldata_desc
 * @property string $tooldata_createdate
 */
class ToolsDatabase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tools_database';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tooldata_name, tooldata_desc, tooldata_createdate', 'required'),
			array('tooldata_name', 'length', 'max'=>100),
			array('tooldata_desc', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tooldata_id, tooldata_name, tooldata_desc, tooldata_createdate', 'safe', 'on'=>'search'),
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
			'tooldata_id' => 'Tooldata',
			'tooldata_name' => 'Tooldata Name',
			'tooldata_desc' => 'Tooldata Desc',
			'tooldata_createdate' => 'Tooldata Createdate',
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

		$criteria->compare('tooldata_id',$this->tooldata_id);
		$criteria->compare('tooldata_name',$this->tooldata_name,true);
		$criteria->compare('tooldata_desc',$this->tooldata_desc,true);
		$criteria->compare('tooldata_createdate',$this->tooldata_createdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ToolsDatabase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
