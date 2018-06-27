<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "takwim".
 *
 * @property int $id
 * @property string $tajuk
 * @property string $keterangan
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 * @property string $updated_at
 */
class Takwim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'takwim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['tajuk', 'keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tajuk' => 'Tajuk',
            'keterangan' => 'Keterangan',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TakwimQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TakwimQuery(get_called_class());
    }
}
