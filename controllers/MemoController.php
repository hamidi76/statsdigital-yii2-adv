<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 26/06/2018
 * Time: 4:14 PM
 */

namespace app\controllers;

use app\modules\user\models\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\memo;

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

    public function actionDownloadExcel()
    {
        //Declare Php Office extension model
        $spreadsheet = new Spreadsheet();
        //getting the active spreadsheet
        $sheet = $spreadsheet->getActiveSheet();


        //if want to change excel column name or structure
        $sheet->setCellValue('A1', 'NAME');
        $sheet->setCellValue('B1', 'MEMO');
        $sheet->setCellValue('C1', 'OWNER');


        //for changing excel file design
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFFF',
                ],
            ],
        ];


        //to loop width and alignment for each declared column
        for ($i = 'A'; $i <= 'H'; $i++) {
            $spreadsheet->getActiveSheet()->getColumnDimension($i)->setWidth(15);
            $spreadsheet->getActiveSheet()->getStyle($i . '1')->applyFromArray($styleArray);
        }


        //this is towrite the coded above comfiguration into phpoffice write
        $writer = new Xlsx($spreadsheet);
        //->send('hello world.xlsx');

        //to change file name
        $filename = 'MemoTemplate';

        //setting mandatory for browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"'); /*-- $filename is  xsl filename ---*/
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        //this will save the writed phpoffice model into php output
        $writer->save('php://output');
        //this is to avoid unwanted setting to be loading into exported excel
        exit;


    }

    public function actionUploadTemplate()
    {

    }
}