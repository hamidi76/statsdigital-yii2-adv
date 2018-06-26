<?php
/**
 * Created by PhpStorm.
 * User: amzari
 * Date: 6/26/18
 * Time: 4:54 PM

/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 26/06/2018
 * Time: 4:14 PM
 */

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Status;

class StatusController extends Controller
{
    public function actionIndex()
    {
        $query = Status::find();


        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);

        $status = $query->orderBy('status_name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'status' => $status,
            'pagination' => $pagination,
        ]);
    }
}