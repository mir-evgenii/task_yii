<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\grid\GridView;
use app\models\Log;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
?>
<h1>Логи действия пользователей</h1>

<label>Кол-во записей на странице: </label>
<span><?= Html::a(100, Url::current(['per-page' => 100])) ?></span>
<span><?= Html::a(50, Url::current(['per-page' => 50])) ?></span>
<span><?= Html::a(10, Url::current(['per-page' => 10])) ?></span>
<span><?= Html::a(5, Url::current(['per-page' => 5])) ?></span>


<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'id',
            'format' => 'raw'
        ],
        [
            'label' => 'Имя',
            'attribute' => 'user.name',
            'format' => 'text'
        ],
        [
            'label' => 'Почта',
            'attribute' => 'user.email',
            'format' => 'text'
        ],
        [
            'label' => 'Действие',
            'attribute' => 'action',
            'format' => 'text'
        ],
        [
            'label' => 'Дата и время действия',
            'attribute' => 'date',
            'format' => ['date', 'php:Y-m-d h:m:s']
        ],
    ],
]);

?>