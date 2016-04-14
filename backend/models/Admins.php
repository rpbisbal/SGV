<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admins".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $admin_type
 * @property string $created_time
 * @property string $updated_time
 * @property integer $employee_id
 *
 * @property Employee $employee
 */
class Admins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_type', 'employee_id'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['employee_id'], 'required'],
            [['username', 'password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'admin_type' => 'Admin Type',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }
}
