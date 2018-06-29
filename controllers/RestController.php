<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 29/06/2018
 * Time: 11:14 AM
 */

namespace app\controllers;

use yii\rest\ActiveController;

class RestController extends ActiveController
{
    public $modelClass = 'app\models\Memo';
}