<?php

/**
 * This is the model class for table "problem_answer".
 *
 * The followings are the available columns in table 'problem_answer':
 * @property integer $proa_id
 * @property integer $mem_id
 * @property string $proa_detail
 * @property string $proa_createdate
 * @property integer $proa_good
 * @property integer $proa_bad
 */
class ProblemAnswer extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'problem_answer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('mem_id, prob_id,proa_detail, proa_createdate, proa_good, proa_bad', 'required'),
            array('mem_id, prob_id,proa_good, proa_bad', 'numerical', 'integerOnly' => true),
            array('proa_detail', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('proa_id, mem_id, proa_detail, proa_createdate, proa_good, proa_bad', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'problem'=>array(self::BELONGS_TO, 'Problem', 'prob_id'),
            'member'=>array(self::BELONGS_TO, 'Member', 'mem_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'proa_id' => 'Proa',
            'prob_id' => 'Prob Id',
            'mem_id' => 'Mem',
            'proa_detail' => 'Proa Detail',
            'proa_createdate' => 'Proa Createdate',
            'proa_good' => 'Proa Good',
            'proa_bad' => 'Proa Bad',
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

        $criteria->compare('proa_id', $this->proa_id);
        $criteria->compare('mem_id', $this->mem_id);
        $criteria->compare('proa_detail', $this->proa_detail, true);
        $criteria->compare('proa_createdate', $this->proa_createdate, true);
        $criteria->compare('proa_good', $this->proa_good);
        $criteria->compare('proa_bad', $this->proa_bad);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProblemAnswer the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
