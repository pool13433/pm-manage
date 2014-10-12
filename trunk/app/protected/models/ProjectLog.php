<?php

/**
 * This is the model class for table "project_log".
 *
 * The followings are the available columns in table 'project_log':
 * @property integer $prolog_id
 * @property string $prolog_name
 * @property string $prolog_createdate
 * @property string $prolog_fixdate
 * @property integer $prolog_status
 */
class ProjectLog extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'project_log';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('prolog_name,pro_id, prolog_createdate, prolog_fixdate, prolog_status', 'required'),
            array('prolog_status', 'numerical', 'integerOnly' => true),
            array('prolog_name', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('prolog_id, pro_id,prolog_name, prolog_createdate, prolog_fixdate, prolog_status', 'safe', 'on' => 'search'),
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
            'prolog_id' => 'Prolog',
            'pro_id' => 'Pro id',
            'prolog_name' => 'Prolog Name',
            'prolog_createdate' => 'Prolog Createdate',
            'prolog_fixdate' => 'Prolog Fixdate',
            'prolog_status' => 'Prolog Status',
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

        $criteria->compare('prolog_id', $this->prolog_id);
        $criteria->compare('prolog_name', $this->prolog_name, true);
        $criteria->compare('prolog_createdate', $this->prolog_createdate, true);
        $criteria->compare('prolog_fixdate', $this->prolog_fixdate, true);
        $criteria->compare('prolog_status', $this->prolog_status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProjectLog the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
