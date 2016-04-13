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
 * @property string $short_description
 * @property string $recordcol
 * @property integer $problem_id
 *
 * @property Employee $employee
 * @property Problem $problem
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
            [['employee_name', 'action_taken', 'employee_id', 'short_description', 'recordcol', 'problem_id'], 'required'],
            [['date_recieved'], 'safe'],
            [['employee_id', 'problem_id'], 'integer'],
            [['employee_name', 'recordcol'], 'string', 'max' => 45],
            [['action_taken', 'remarks', 'short_description'], 'string', 'max' => 255]
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
            'short_description' => 'Short Description',
            'recordcol' => 'Recordcol',
            'problem_id' => 'Problem ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProblem()
    {
        return $this->hasOne(Problem::className(), ['id' => 'problem_id']);
    }
}
