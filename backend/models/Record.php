<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "record".
 *
 * @property integer $id
 * @property string $employee_name
 * @property string $action_taken
 * @property string $date_recieved
 * @property string $remarks
 * @property integer $employee_id
 * @property integer $common_id
 *
 * @property Common $common
 * @property Employee $employee
 */
class Record extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_name', 'action_taken', 'employee_id', 'common_id'], 'required'],
            [['date_recieved'], 'safe'],
            [['employee_id', 'common_id'], 'integer'],
            [['employee_name'], 'string', 'max' => 45],
            [['action_taken', 'remarks'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_name' => 'Employee Name',
            'action_taken' => 'Action Taken',
            'date_recieved' => 'Date Recieved',
            'remarks' => 'Remarks',
            'employee_id' => 'Employee ID',
            'common_id' => 'Common ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommon()
    {
        return $this->hasOne(Common::className(), ['id' => 'common_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }
}
