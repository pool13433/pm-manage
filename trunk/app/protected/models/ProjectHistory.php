<?php

/**
 * This is the model class for table "project_history".
 *
 * The followings are the available columns in table 'project_history':
 * @property integer $prohis_id
 * @property integer $pro_id
 * @property string $prohis_topic
 * @property string $prohis_detail
 * @property string $prohis_getdate
 * @property string $prohis_starttime
 * @property string $prohis_endtime
 */
class ProjectHistory extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'project_history';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pro_id, prohis_topic, prohis_detail, prohis_getdate,prohis_startdate, prohis_starttime,prohis_enddate, prohis_endtime', 'required'),
            array('pro_id', 'numerical', 'integerOnly' => true),
            array('prohis_topic', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('prohis_id, pro_id, prohis_topic, prohis_detail, prohis_getdate, prohis_starttime, prohis_endtime', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'project' => array(self::BELONGS_TO, 'Project', 'pro_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'prohis_id' => 'Prohis',
            'pro_id' => 'Pro',
            'prohis_topic' => 'Prohis Topic',
            'prohis_detail' => 'Prohis Detail',            
            'prohis_getdate' => 'Prohis Getdate',
            'prohis_startdate' => 'Project StartDate',
            'prohis_starttime' => 'Prohis Starttime',
            'prohis_enddate' => 'Project Enddate',
            'prohis_endtime' => 'Prohis Endtime',
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

        $criteria->compare('prohis_id', $this->prohis_id);
        $criteria->compare('pro_id', $this->pro_id);
        $criteria->compare('prohis_topic', $this->prohis_topic, true);
        $criteria->compare('prohis_detail', $this->prohis_detail, true);
        $criteria->compare('prohis_getdate', $this->prohis_getdate, true);
        $criteria->compare('prohis_starttime', $this->prohis_starttime, true);
        $criteria->compare('prohis_endtime', $this->prohis_endtime, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProjectHistory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
