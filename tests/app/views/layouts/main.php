<?php

use app\assets\AppAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $content string */
?>
<?AppAsset::register($this);?>
<?php $this->beginPage() ?>
<html>
<head>
<title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="container-fluid">
    <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>