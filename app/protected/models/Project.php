<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property integer $pro_id
 * @property string $pro_nameth
 * @property string $pro_nameeng
 * @property integer $mem_id
 * @property string $pro_descrition
 * @property integer $pro_prices
 * @property string $pro_startdate
 * @property string $pro_enddate
 * @property string $pro_createdate
 * @property integer $pro_paytype
 * @property integer $pro_tooldevelop
 * @property integer $pro_tooldatabase
 * @property integer $pro_applicationtype
 * @property string $pro_remark
 * @property integer $pro_status
 * @property integer $pro_pay_step
 * @property integer $prouml_use
 */
class Project extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'project';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pro_nameth, pro_nameeng, mem_id, pro_descrition, pro_prices, pro_startdate, pro_enddate, pro_createdate, pro_paytype, pro_tooldevelop, pro_tooldatabase, pro_applicationtype, pro_process, pro_status, pro_pay_step, prouml_use', 'required'),
            array('mem_id, pro_prices, pro_paytype, pro_tooldevelop, pro_tooldatabase, pro_applicationtype, pro_status, pro_pay_step, prouml_use,pro_process', 'numerical', 'integerOnly' => true),
            array('pro_nameth, pro_nameeng', 'length', 'max' => 150),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('pro_id, pro_nameth, pro_nameeng, mem_id, pro_descrition, pro_prices, pro_startdate, pro_enddate, pro_createdate, pro_paytype, pro_tooldevelop, pro_tooldatabase, pro_applicationtype, pro_process, pro_status, pro_pay_step, prouml_use', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tools_developer' => array(self::BELONGS_TO, 'ToolsDeveloper', 'pro_tooldevelop'),
            'tools_database' => array(self::BELONGS_TO, 'ToolsDatabase', 'pro_tooldatabase'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'pro_id' => 'Pro',
            'pro_nameth' => 'Pro Nameth',
            'pro_nameeng' => 'Pro Nameeng',
            'mem_id' => 'Mem',
            'pro_descrition' => 'Pro Descrition',
            'pro_prices' => 'Pro Prices',
            'pro_startdate' => 'Pro Startdate',
            'pro_enddate' => 'Pro Enddate',
            'pro_createdate' => 'Pro Createdate',
            'pro_paytype' => 'Pro Paytype',
            'pro_tooldevelop' => 'Pro Tooldevelop',
            'pro_tooldatabase' => 'Pro Tooldatabase',
            'pro_applicationtype' => 'Pro Applicationtype',
            'pro_process' => 'Pro process',
            'pro_status' => 'Pro Status',
            'pro_pay_step' => 'Pro Pay Step',
            'prouml_use' => 'Prouml Use',
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

        $criteria->compare('pro_id', $this->pro_id);
        $criteria->compare('pro_nameth', $this->pro_nameth, true);
        $criteria->compare('pro_nameeng', $this->pro_nameeng, true);
        $criteria->compare('mem_id', $this->mem_id);
        $criteria->compare('pro_descrition', $this->pro_descrition, true);
        $criteria->compare('pro_prices', $this->pro_prices);
        $criteria->compare('pro_startdate', $this->pro_startdate, true);
        $criteria->compare('pro_enddate', $this->pro_enddate, true);
        $criteria->compare('pro_createdate', $this->pro_createdate, true);
        $criteria->compare('pro_paytype', $this->pro_paytype);
        $criteria->compare('pro_tooldevelop', $this->pro_tooldevelop);
        $criteria->compare('pro_tooldatabase', $this->pro_tooldatabase);
        $criteria->compare('pro_applicationtype', $this->pro_applicationtype);
        $criteria->compare('pro_process', $this->pro_process, true);
        $criteria->compare('pro_status', $this->pro_status);
        $criteria->compare('pro_pay_step', $this->pro_pay_step);
        $criteria->compare('prouml_use', $this->prouml_use);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Project the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
