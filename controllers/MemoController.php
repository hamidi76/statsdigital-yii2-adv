<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 26/06/2018
 * Time: 4:14 PM
 */

namespace app\controllers;

use app\modules\user\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Memo;

class MemoController extends Controller
{
    public function actionIndex()
    {
        $query = Memo::find();

        //Basic Calling query using active record

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $memos = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        //calling data using active data provider

        $dataProvider = new ActiveDataProvider([
            "query" => $query,
            "pagination" => [
                "pageSize" => 10,
            ]
        ]);


        //var_dump($dataProvider);

        return $this->render('index', [
            'memos' => $memos,
            'pagination' => $pagination,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        //
        $model = new Memo();

        //$var = array();

        //check if there any data submited
        if (Yii::$app->request->isPost) {

            if ($model->load(Yii::$app->request->post())) {

                $model->created_at = Yii::$app->formatter->asDatetime(date('d-m-Y H:i:s'), 'php:Y-m-d H:i:s');
                $model->updated_at = Yii::$app->formatter->asDatetime(date('d-m-Y H:i:s'), 'php:Y-m-d H:i:s');
                $model->memo_owner = Yii::$app->user->id;

                if($model->save())
                {
                    $user_mail = User::find()->asArray()->all();

                    foreach ($user_mail as $val)
                    {

                        \Yii::$app->mailer->compose()
                            ->setTo($val['email'])
                            ->setSubject('[NOTIFICATION] New Memo')
                            ->setHtmlBody('Dear Staff '
                                . '<br>New Memo have been created '
                                . 'using <strong>' . $model->memo . ''
                                . '</strong> . <br>TQ.')
                            ->send();
                    }
                    $this->redirect(['index']);
                }
            }


        }

        return $this->render('create', compact('model'));

    }


    public function actionUpdate($id)
    {
        //
        $model = Memo::findOne($id);

        //$var = array();

        //check if there any data submited
        if (Yii::$app->request->isPost) {

            if ($model->load(Yii::$app->request->post())) {

                $model->created_at = Yii::$app->formatter->asDatetime(date('d-m-Y H:i:s'), 'php:Y-m-d H:i:s');
                $model->updated_at = Yii::$app->formatter->asDatetime(date('d-m-Y H:i:s'), 'php:Y-m-d H:i:s');
                $model->memo_owner = Yii::$app->user->id;

                if($model->save())
                {
                    $this->redirect(['index']);
                }
            }


        }

        return $this->render('update', compact('model'));

    }
}