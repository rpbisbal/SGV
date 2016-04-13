<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property integer $id
 * @property integer $tnf
 * @property integer $lan_cable
 * @property integer $ip_phone
 * @property string $remarks
 * @property integer $problem_id
 *
 * @property Problem $problem
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tnf', 'lan_cable', 'ip_phone', 'problem_id'], 'integer'],
            [['problem_id'], 'required'],
            [['remarks'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tnf' => 'Tnf',
            'lan_cable' => 'Lan Cable',
            'ip_phone' => 'Ip Phone',
            'remarks' => 'Remarks',
            'problem_id' => 'Problem ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProblem()
    {
        return $this->hasOne(Problem::className(), ['id' => 'problem_id']);
    }
}
