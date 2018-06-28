<?php
/**
 * Created by PhpStorm.
 * User: far-east
 * Date: 13/12/2017
 * Time: 5:30 PM
 */

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $uploadFile;
    public $uploadfilePath;

    public function rules()
    {
        return [
            [['uploadFile'], 'file','checkExtensionByMimeType'=>false, 'skipOnEmpty' => false, 'extensions' => 'xlsx'],
        ];
    }

    public function upload()
    {
       // die(print_r($this));
        if ($this->validate()) {

            $this->uploadfilePath = 'uploads/'. $this->uploadFile->baseName . '.' . $this->uploadFile->extension;

            $this->uploadFile->saveAs($this->uploadfilePath);


            return true;
        } else {

            //die(print_r($this->errors));
            return false;
        }
    }

    public function getUploadFilePath()
    {
        return $this->uploadfilePath;
    }
}
?>