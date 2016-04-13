<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property integer $id
 * @property string $problem_type
 *
 * @property Record[] $records
 * @property Reports[] $reports
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
            [['problem_type'], 'required'],
            [['problem_type'], 'string', 'max' => 255]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['problem_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReports()
    {
        return $this->hasMany(Reports::className(), ['problem_id' => 'id']);
    }
}
