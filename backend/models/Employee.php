<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $cbs_lastname
 * @property string $cbs_firstname
 * @property integer $admins_id
 *
 * @property Admins $admins
 * @property Record[] $records
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cbs_lastname', 'admins_id'], 'required'],
            [['admins_id'], 'integer'],
            [['cbs_lastname', 'cbs_firstname'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cbs_lastname' => 'Cbs Lastname',
            'cbs_firstname' => 'Cbs Firstname',
            'admins_id' => 'Admins ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmins()
    {
        return $this->hasOne(Admins::className(), ['id' => 'admins_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['employee_id' => 'id']);
    }
}
