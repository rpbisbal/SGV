<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property integer $id
 * @property string $problem_type
 * @property string $description
 * @property integer $record_id
 * @property string $problemcol
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
            [['problem_type', 'record_id'], 'required'],
            [['record_id'], 'integer'],
            [['problem_type', 'description'], 'string', 'max' => 255],
            [['problemcol'], 'string', 'max' => 45]
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
            'record_id' => 'Record ID',
            'problemcol' => 'Problemcol',
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
