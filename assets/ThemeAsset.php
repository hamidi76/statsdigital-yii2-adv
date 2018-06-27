<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use p2m\SB\assets\CreativeAsset;
use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ThemeAsset extends CreativeAsset
{
    protected $resourceData = array(

        'published' => [
            'sourcePath' => '@vendor/p2made/yii2-startbootstrap-themes/assets/lib/creative',
            'css' => [
                'css/creative.min.css',
            ],
            'js' => [
                'js/creative.min.js',
            ],
        ],

        'depends' => [
            'p2m\assets\JqueryEasingAsset',
            'p2m\assets\ScrollRevealAsset',
            'p2m\assets\MagnificPopupAsset',
        ],
    );

    public function init()
    {
        $this->configureAsset($this->resourceData);
        parent::init();
    }
}
