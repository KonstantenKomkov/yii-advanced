<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AccessTokenSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="access-token-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tokenId') ?>

    <?= $form->field($model, 'userId') ?>

    <?= $form->field($model, 'accessToken') ?>

    <?= $form->field($model, 'createdAt') ?>

    <?= $form->field($model, 'updatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
