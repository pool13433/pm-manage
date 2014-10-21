<?php

/**
 * This is the model class for table "problem".
 *
 * The followings are the available columns in table 'problem':
 * @property integer $prob_id
 * @property integer $mem_id
 * @property string $prob_name
 * @property string $prob_detail
 * @property integer $prob_priority
 * @property string $prob_createdate
 */
class Problem extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'problem';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('mem_id, prob_name, prob_detail, prob_createdate', 'required'),
            array('mem_id, prob_priority', 'numerical', 'integerOnly' => true),
            array('prob_name', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('prob_id, mem_id, prob_name, prob_detail, prob_priority, prob_createdate', 'safe', 'on' => 'search'),
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
            'prob_id' => 'Prob',
            'mem_id' => 'Mem',
            'prob_name' => 'Prob Name',
            'prob_detail' => 'Prob Detail',
            'prob_priority' => 'Prob Priority',
            'prob_createdate' => 'Prob Createdate',
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

        $criteria->compare('prob_id', $this->prob_id);
        $criteria->compare('mem_id', $this->mem_id);
        $criteria->compare('prob_name', $this->prob_name, true);
        $criteria->compare('prob_detail', $this->prob_detail, true);
        $criteria->compare('prob_priority', $this->prob_priority);
        $criteria->compare('prob_createdate', $this->prob_createdate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Problem the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function countNewProblem() {
        $problem = Yii::app()->db->createCommand()
                ->select("count( * ) AS countview0")
                ->from("problem")
                ->where("prob_view = 0")
                ->queryRow();

        //var_dump($problem);
        $count = $problem["countview0"];
        return $count;
    }

}
