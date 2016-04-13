<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property integer $id
 * @property string $category
 * @property string $top1
 * @property string $top2
 * @property string $top3
 * @property integer $tnf
 * @property integer $lan_cable
 * @property integer $ip_phone
 * @property string $remarks
 *
 * @property Problem[] $problems
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
            [['top1', 'top2', 'top3'], 'required'],
            [['tnf', 'lan_cable', 'ip_phone'], 'integer'],
            [['category', 'top1', 'top2', 'top3', 'remarks'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'top1' => 'Top1',
            'top2' => 'Top2',
            'top3' => 'Top3',
            'tnf' => 'Tnf',
            'lan_cable' => 'Lan Cable',
            'ip_phone' => 'Ip Phone',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProblems()
    {
        return $this->hasMany(Problem::className(), ['reports_id' => 'id']);
    }
}
