<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Category;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'author')->textInput(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::activeDropDownList($model, 'category',
        ArrayHelper::map(Category::find()->all(), 'id', 'name')) ?>
        <br><br>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
