<?php

namespace app\models;

use Yii;

/**
 * This is the model class for collection "memo_mongo".
 *
 * @property \MongoDB\BSON\ObjectID|string $_id
 * @property mixed $name
 * @property mixed $memo
 * @property mixed $memo_owner
 */
class MemoMongo extends \yii\mongodb\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'memo_mongo';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'name',
            'memo',
            'memo_owner',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'memo', 'memo_owner'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'memo' => Yii::t('app', 'Memo'),
            'memo_owner' => Yii::t('app', 'Memo Owner'),
        ];
    }
}
