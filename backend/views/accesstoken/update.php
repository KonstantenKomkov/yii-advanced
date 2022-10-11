<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\AccessToken $model */

$this->title = 'Update Access Token: ' . $model->tokenId;
$this->params['breadcrumbs'][] = ['label' => 'Access Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tokenId, 'url' => ['view', 'tokenId' => $model->tokenId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="access-token-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
