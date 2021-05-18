<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
  <div id="loader-wrapper">
          <div id="loader"></div>
          <div class="loader-section section-left"></div>
          <div class="loader-section section-right"></div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
          <div class="container-fluid">
              <a class="navbar-brand" href="#">
              <img src="/img/logo3.png" alt="Image">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link nav-link-1 <?=$this->context->action->id=="index"?"active":""?>" aria-current="page" href="/">Bosh sahifa</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nav-link-1 <?=$this->context->action->id=="videos"?"active":""?>" href="<?=\yii\helpers\Url::to(['videos']);?>">Barcha darslar</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nav-link-1 <?=$this->context->action->id=="about"?"active":""?>" href="<?=\yii\helpers\Url::to(['about', 'id'=>1])?>">Biz haqimizda</a>
                  </li>
              </ul>
              </div>
          </div>
      </nav>
        <div style="margin-top: 10px;">
            <?= Breadcrumbs::widget([
                'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>\n", 
                'activeItemTemplate' => "<li class='breadcrumb-item active'>{link}</li>\n",
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class'=>'breadcrumb float-sm-left'],
            ]); ?>
            <?= Alert::widget() ?>
        </div>
        <div class="container-fluid tm-container-content tm-mt-60" >
            <?=$content?>
        </div>

      <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Biz haqimzda qizqacha</h3>
                    <p>Catalog-Z is free <a rel="sponsored" href="https://v5.getbootstrap.com/">Bootstrap 5</a> Alpha 2 HTML Template for video and photo websites. You can freely use this TemplateMo layout for a front-end integration with any kind of CMS website.</p>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Bizning havolalar</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="/">Bosh sahifa</a></li>
                        <li><a href="<?=\yii\helpers\Url::to(['videos']);?>">Barcha darslar</a></li>
                        <li><a href="<?=\yii\helpers\Url::to(['videos']);?>">Biz haqimizda</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5 row">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://telegram.org"><i class="fab fa-telegram-plane"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php
    $js = <<<JS
      $(window).on("load", function() {
          $('body').addClass('loaded');
      });
    JS;
    $this->registerJS($js, \Yii\web\View::POS_END);
    ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
