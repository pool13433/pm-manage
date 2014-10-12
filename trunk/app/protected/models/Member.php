<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $mem_id
 * @property string $mem_username
 * @property string $mem_password
 * @property string $mem_fname
 * @property string $mem_lname
 * @property string $mem_tel
 * @property string $mem_email
 * @property string $mem_address
 * @property string $mem_status
 * @property integer $mem_point
 * @property integer $mem_active
 * @property string $mem_createdate
 */
class Member extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mem_username, mem_password, mem_fname, mem_lname, mem_tel, mem_email, mem_address, mem_status, mem_point, mem_createdate', 'required'),
			array('mem_point, mem_active', 'numerical', 'integerOnly'=>true),
			array('mem_username, mem_password, mem_fname, mem_lname, mem_email', 'length', 'max'=>50),
			array('mem_tel', 'length', 'max'=>15),
			array('mem_status', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mem_id, mem_username, mem_password, mem_fname, mem_lname, mem_tel, mem_email, mem_address, mem_status, mem_point, mem_active, mem_createdate', 'safe', 'on'=>'search'),
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
			'mem_id' => 'Mem',
			'mem_username' => 'Mem Username',
			'mem_password' => 'Mem Password',
			'mem_fname' => 'Mem Fname',
			'mem_lname' => 'Mem Lname',
			'mem_tel' => 'Mem Tel',
			'mem_email' => 'Mem Email',
			'mem_address' => 'Mem Address',
			'mem_status' => 'Mem Status',
			'mem_point' => 'Mem Point',
			'mem_active' => 'Mem Active',
			'mem_createdate' => 'Mem Createdate',
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

		$criteria->compare('mem_id',$this->mem_id);
		$criteria->compare('mem_username',$this->mem_username,true);
		$criteria->compare('mem_password',$this->mem_password,true);
		$criteria->compare('mem_fname',$this->mem_fname,true);
		$criteria->compare('mem_lname',$this->mem_lname,true);
		$criteria->compare('mem_tel',$this->mem_tel,true);
		$criteria->compare('mem_email',$this->mem_email,true);
		$criteria->compare('mem_address',$this->mem_address,true);
		$criteria->compare('mem_status',$this->mem_status,true);
		$criteria->compare('mem_point',$this->mem_point);
		$criteria->compare('mem_active',$this->mem_active);
		$criteria->compare('mem_createdate',$this->mem_createdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Member the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
