<?php
/**
 * Created by PhpStorm.
 * User: faridyusof727
 * Date: 28/02/2018
 * Time: 11:08 AM
 */

namespace app\library;

use Yii;
use yii\filters\Cors;

class CorsCustom extends Cors
{
    public function __construct(array $config = [])
    {
        parent::__construct();
        $this->cors["Access-Control-Expose-Headers"] = [
            "X-Pagination-Current-Page",
            "X-Pagination-Page-Count",
            "X-Pagination-Per-Page",
            "X-Pagination-Total-Count"
        ];;
    }

    public function beforeAction($action)
    {
        parent::beforeAction($action);



        if (Yii::$app->getRequest()->getMethod() === 'OPTIONS') {
            Yii::$app->getResponse()->getHeaders()->set('Allow', 'POST GET PUT DELETE');
            Yii::$app->end();
        }
        return true;
    }


}