<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
/*echo '<pre>';
var_dump($model);
echo '</pre>';*/
?>
<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'date')->widget(DatePicker::classname(),[
        'model' => $model,
        'attribute' => 'date',
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>
    
  

    <?= $form->field($model, 'theme_id')->dropDownList($themesList,[
        'prompt' => 'укажите привязку к теме',
    ]); ?>

    <?= $form->field($model, 'captiopn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
