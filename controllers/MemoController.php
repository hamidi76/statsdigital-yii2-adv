<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 26/06/2018
 * Time: 4:14 PM
 */

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Memo;

class MemoController extends Controller
{
    public function actionIndex()
    {
        $query = Memo::find();


        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $memos = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'memos' => $memos,
            'pagination' => $pagination,
        ]);
    }
}