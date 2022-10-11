<?php

use common\models\AccessToken;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AccessTokenSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Access Tokens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-token-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Access Token', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tokenId',
            'userId',
            'accessToken',
            'createdAt',
            'updatedAt',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AccessToken $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'tokenId' => $model->tokenId]);
                 }
            ],
        ],
    ]); ?>


</div>
