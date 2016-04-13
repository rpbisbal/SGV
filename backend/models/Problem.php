<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property integer $id
 * @property string $problem_type
 * @property string $description
 * @property string $top1
 * @property string $top2
 * @property string $top3
 * @property integer $reports_id
 *
 * @property Common[] $commons
 * @property Reports $reports
 */
class Problem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['problem_type', 'top1', 'top2', 'top3', 'reports_id'], 'required'],
            [['reports_id'], 'integer'],
            [['problem_type', 'description', 'top1', 'top2', 'top3'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'problem_type' => 'Problem Type',
            'description' => 'Description',
            'top1' => 'Top1',
            'top2' => 'Top2',
            'top3' => 'Top3',
            'reports_id' => 'Reports ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommons()
    {
        return $this->hasMany(Common::className(), ['problem_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasOne(Reports::className(), ['id' => 'reports_id']);
    }
}
