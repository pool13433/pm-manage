<?php

/**
 * This is the model class for table "project_uml".
 *
 * The followings are the available columns in table 'project_uml':
 * @property integer $prouml_id
 * @property integer $uml_id
 * @property integer $pro_id
 * @property integer $prouml_status
 */
class ProjectUml extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'project_uml';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('uml_id, pro_id, prouml_status', 'required'),
            array('uml_id, pro_id, prouml_status', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('prouml_id, uml_id, pro_id, prouml_status', 'safe', 'on' => 'search'),
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
            'uml' => array(self::BELONGS_TO, 'Uml', 'uml_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'prouml_id' => 'Prouml',
            'uml_id' => 'Uml',
            'pro_id' => 'Pro',
            'prouml_status' => 'Prouml Status',
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

        $criteria->compare('prouml_id', $this->prouml_id);
        $criteria->compare('uml_id', $this->uml_id);
        $criteria->compare('pro_id', $this->pro_id);
        $criteria->compare('prouml_status', $this->prouml_status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProjectUml the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
