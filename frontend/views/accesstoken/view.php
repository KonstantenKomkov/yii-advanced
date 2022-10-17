<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\AccessToken $model */

$this->title = $model->tokenId;
$this->params['breadcrumbs'][] = ['label' => 'Access Tokens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="access-token-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'tokenId' => $model->tokenId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'tokenId' => $model->tokenId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tokenId',
            'userId',
            'accessToken',
            'createdAt',
            'updatedAt',
        ],
    ]) ?>

</div>
