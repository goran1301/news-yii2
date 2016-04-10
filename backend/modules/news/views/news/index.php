<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'author_id',
           // 'preview',
            [
                'label' => 'Дата',
                'value' => function($data){
                    return $data->date;
                },
                'attribute' => 'date',
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'date',
                    'dateFormat' => 'yyyy-MM-dd'
                ]),
                //'attribute' => 'date',
                'format' => 'date',
                //'sort' => true,
            ],
            [
                'label' => 'Тема',
                'attribute' => 'theme_id',
                'value' => 'theme.name',
                'filter' => $themesList
            ],
            'captiopn',
            // 'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
