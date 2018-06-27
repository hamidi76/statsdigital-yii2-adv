<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Takwim]].
 *
 * @see Takwim
 */
class TakwimQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Takwim[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Takwim|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
