<?php

namespace frontend\themes\votpusk;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class VotpuskAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/votupsk/web/libs/bootstrap/css/bootstrap-grid.min.css',
        'themes/votupsk/web/libs/owl/assets/owl.carousel.min.css',
        'themes/votupsk/web/css/fonts.css',
//        'themes/votupsk/web/css/site.css',
       'themes/votupsk/web/css/main.css',
        'themes/votupsk/web/css/media.css',

    ];

    public $js = [
        "themes/votupsk/web/libs/html5shiv/es5-shim.min.js",
        "themes/votupsk/web/libs/html5shiv/html5shiv.min.js",
        "themes/votupsk/web/libs/html5shiv/html5shiv-printshiv.min.js",
        "themes/votupsk/web/libs/respond/respond.min.js",
        "themes/votupsk/web/libs/jquery/jquery-1.11.2.min.js",
        "themes/votupsk/web/libs/scroll2id/PageScroll2id.min.js",
        "themes/votupsk/web/libs/owl/owl.carousel.min.js",
        "themes/votupsk/web/js/common.js",
        'themes/votupsk/web/js/main.js',
    ];

    public $depends = [
//        'frontend\assets\AppAsset',
    ];
}