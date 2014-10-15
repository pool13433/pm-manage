<?php

/**
 * This is the model class for table "money".
 *
 * The followings are the available columns in table 'money':
 * @property integer $money_id
 * @property string $money_name
 * @property string $money_detail
 * @property integer $money_price
 * @property string $money_createdate
 * @property integer $money_type
 */
class Money extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'money';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('money_detail, money_price, money_createdate, money_type', 'required'),
            array('mem_id,money_price, money_type', 'numerical', 'integerOnly' => true),            
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('money_id, mem_id,money_detail, money_price, money_createdate, money_type', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'money_id' => 'Money',
            'mem_id'=> 'Mem Id',
            'money_detail' => 'Money Detail',
            'money_price' => 'Money Price',
            'money_createdate' => 'Money Createdate',
            'money_type' => 'Money Type',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('money_id', $this->money_id);
        $criteria->compare('money_detail', $this->money_detail, true);
        $criteria->compare('money_price', $this->money_price);
        $criteria->compare('money_createdate', $this->money_createdate, true);
        $criteria->compare('money_type', $this->money_type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Money the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
