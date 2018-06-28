<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 26/06/2018
 * Time: 4:14 PM
 */

namespace app\controllers;

use app\modules\quiz\models\UploadForm;
use app\modules\user\models\User;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\memo;
use yii\web\UploadedFile;

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
    public function actionDownload()
    {
        //Declare Php Office extension model
        $spreadsheet = new Spreadsheet();
        //getting the active spreadsheet
        $sheet = $spreadsheet->getActiveSheet();


        //if want to change excel column name or structure
        $sheet->setCellValue('A1', 'NAME');
        $sheet->setCellValue('B1', 'MEMO');
        $sheet->setCellValue('C1', 'OWNER');

        //querying data from memo
        $memo = Memo::find()->asArray()->all();

        //looping that from memo into excel format
        $bil = 1;
        foreach ($memo as $value)
        {
            $sheet->setCellValue('A'.$bil, $value['name']);
            $sheet->setCellValue('B'.$bil, $value['memo']);
            $sheet->setCellValue('C'.$bil, $value['memo_owner']);

            $bil++;
        }


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
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {

            if ($_FILES) {
                //die(var_dump($_FILES));
                $model = new UploadForm();

                $model->uploadFile = UploadedFile::getInstance($model, 'uploadFile');
                //die(var_dump($model));
                if ($model->upload()) {

                    $upload_path = $model->getUploadFilePath();

                    if ($this->ReadExcellFile($upload_path)) {

                        return $this->redirect(['default/review-import']);
                    }
                }
            }
        }
        return $this->render('upload_memo', compact('model'));
    }

    private function ReadExcellFile($upload_path)
    {
        $inputFileName = $upload_path;
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $objPHPExcel = $reader->load($inputFileName);
        $objWorksheet = $objPHPExcel->getActiveSheet();

        $highestRow = $objWorksheet->getHighestRow();

        $quiz_data = [];
        $data = [];
        $question = null;
        $answer_a = null;
        $answer_b = null;
        $answer_c = null;
        $answer_d = null;
        $type_id = null;
        $real_answer = null;
        $difficulty = null;
        $season_id = null;

        for ($row = 2; $row <= $highestRow; ++$row) {

            for ($col = 1; $col <= 8; ++$col) {

                $question = $objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
                $answer_a = $objWorksheet->getCellByColumnAndRow(2, $row)->getValue();
                $answer_b = $objWorksheet->getCellByColumnAndRow(3, $row)->getValue();
                $answer_c = $objWorksheet->getCellByColumnAndRow(4, $row)->getValue();
                $answer_d = $objWorksheet->getCellByColumnAndRow(5, $row)->getValue();
                $type_id = $objWorksheet->getCellByColumnAndRow(6, $row)->getValue();
                $real_answer = $objWorksheet->getCellByColumnAndRow(7, $row)->getValue();
                $difficulty = $objWorksheet->getCellByColumnAndRow(8, $row)->getValue();
                $season_id = $objWorksheet->getCellByColumnAndRow(9, $row)->getValue();

                $data = [
                    'question' => $question,
                    'answer_a' => $answer_a,
                    'answer_b' => $answer_b,
                    'answer_c' => $answer_c,
                    'answer_d' => $answer_d,
                    'type_id'=> $type_id,
                    'real_answer' => $real_answer,
                    'difficulty' => $difficulty,
                    'season_id' => $season_id,
                ];
            }
            array_push($quiz_data, $data);

            Yii::$app->session->set('quiz_data', $quiz_data);

        }

        return true;

    }

    public function actionReviewImport()
    {

        $quiz = new Quiz();

        $count_quiz = count(Yii::$app->session->get('quiz_data'));

        if (Yii::$app->request->post()) {

            if (Yii::$app->session->has('quiz_data')) {

                $quiz_data = Yii::$app->session->get('quiz_data');


                foreach ($quiz_data as $value) {

                    $quiz = new Quiz();

                    $quiz->question = $value['question'];

                    $quiz->answer_a = (string)$value['answer_a'];
                    $quiz->answer_b = (string)$value['answer_b'];
                    $quiz->answer_c = (string)$value['answer_c'];
                    $quiz->answer_d = (string)$value['answer_d'];
                    $quiz->type_id = $value['type_id'];
                    $quiz->real_answer = $value['real_answer'];
                    $quiz->difficutly = $value['difficulty'];
                    $quiz->season_id = $value['season_id'];
                    $quiz->status_id = 1;
                    $quiz->created_at = SiteController::GetNow();;
                    $quiz->updated_at = SiteController::GetNow();;

                    $quiz->save();
                    //var_dump($quiz);

                }
                //die();
                Yii::$app->session->setFlash('success-create', 'Information Successfully Added.');
                return Yii::$app->response->redirect('index');
            }
        }
        $quiz_data = Yii::$app->session->get('quiz_data');

        $provider = new ArrayDataProvider([
            'allModels' => $quiz_data,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['question','type_id', 'answer_a','answer_b','answer_c','answer_d','real_answer','difficulty','season_id'],
            ],
        ]);

        return $this->render('review_import', compact('provider','quiz','count_quiz'));
    }

}