<?php
use \yii\widgets\LinkPager;
use common\widgets\DatesNews;
use yii\helpers\Html;
?>
<div class="col-md-3">
<?= DatesNews::widget()?>
</div>
<div class="col-md-9 news-default-index">

    <?php foreach ($news as $new):?>
        <div style="padding:25px;">
            <div>
                <?= $new->date ?> <?= Html::encode($new->captiopn) ?>
            </div>
            <div>
                <?= Html::encode($new->preview) ?>...
               <div> <?= Html::a('читать далее', ['view', 'id' => $new->id], ['class' => 'btn btn-success']) ?></div>
                
            </div>
        </div>
    <?php endforeach; ?>

    
</div>
