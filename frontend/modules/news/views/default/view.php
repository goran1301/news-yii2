<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->captiopn;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::encode($model->text) ?>
<?php if($model->theme!==null):?>   
    <div>
        <?= Html::a(Html::encode($model->theme->name), ['theme', 'id' => $model->theme_id])?>
        
    </div>
<?php endif; ?> 

</div>
