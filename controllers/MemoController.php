<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 26/06/2018
 * Time: 4:14 PM
 */

namespace app\controllers;

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

                if($model->save())
                {
                    $this->redirect(['index']);
                }
            }


        }

        return $this->render('create', compact('model'));

    }

}