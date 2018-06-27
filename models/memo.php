<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 26/06/2018
 * Time: 4:11 PM
 */

namespace app\models;

use yii\db\ActiveRecord;

class Memo extends ActiveRecord
{

    public function rules()
    {
        return [
            // define validation rules here
            [['name','memo','memo_owner'], 'required'],
            [['memo_owner'],'integer'],
            [['created_at','updated_at'],'safe']
        ];
    }



}