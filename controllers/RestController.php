<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 29/06/2018
 * Time: 11:14 AM
 */

namespace app\controllers;

use app\library\CorsCustom;
use app\models\Memo;
use app\modules\user\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class RestController extends ActiveController
{
    public $modelClass = 'app\models\Memo';

    public function behaviors()
    {
        $behaviors = parent::behaviors();


        $behaviors['corsFilter'] = [
            'class' => CorsCustom::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Headers' => ['Authorization', 'Content-Type'],
                'Access-Control-Request-Method' => ['POST', 'PUT', 'GET', 'DELETE'],
            ],

        ];

        return $behaviors;
    }

    public function actionAuth()
    {
        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();

            //return $post;

            $check = User::find()
                ->where(['username' =>$post['username']])
                //->andWhere(['password' => $post['password']])
                ->asArray()->one();

            if($check)
            {
                return [
                    'msg' =>'Success Login'
                ];
            }
            else
            {
                return [
                    'msg' =>'Failed Login'
                ];
            }
        }
        else
        {
            return [
                'msg' =>'No Credential'
            ];
        }


    }
}
