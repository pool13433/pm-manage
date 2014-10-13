<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $event_id
 * @property string $event_name
 * @property string $event_detail
 * @property string $event_createdate
 * @property string $event_startdate
 * @property string $event_enddate
 * @property integer $event_status
 */
class Event extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'event';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('event_name, event_detail, event_createdate, event_priority,event_startdate, event_enddate,event_finishdate', 'required'),
            array('mem_id,event_status', 'numerical', 'integerOnly' => true),
            array('event_name', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('event_id, mem_id,event_name, event_detail, event_priority,event_createdate, event_startdate, event_enddate,event_finishdate, event_status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'member' => array(self::BELONGS_TO, 'Member', 'mem_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'event_id' => 'Event',
            'mem_id' => 'Mem id',
            'event_name' => 'Event Name',
            'event_detail' => 'Event Detail',
            'event_createdate' => 'Event Createdate',
            'event_priority' => 'Event Priority',
            'event_startdate' => 'Event Startdate',
            'event_enddate' => 'Event Enddate',
            'event_finishdate' => 'Event Finishdate',
            'event_status' => 'Event Status',
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

        $criteria->compare('event_id', $this->event_id);
        $criteria->compare('event_name', $this->event_name, true);
        $criteria->compare('event_detail', $this->event_detail, true);
        $criteria->compare('event_createdate', $this->event_createdate, true);
        $criteria->compare('event_startdate', $this->event_startdate, true);
        $criteria->compare('event_enddate', $this->event_enddate, true);
        $criteria->compare('event_status', $this->event_status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Event the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
