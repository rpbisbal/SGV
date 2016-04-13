<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $category_type
 *
 * @property Record[] $records
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_type'], 'required'],
            [['category_type'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_type' => 'Category Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['category_id' => 'id']);
    }
}
