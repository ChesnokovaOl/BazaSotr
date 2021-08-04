<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$form = ActiveForm::begin(['layout' => 'horizontal']) 

?>
    <br>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'post') ?>
    <?= $form->field($model, 'date_birth') ?>
    <?= $form->field($model, 'date_employment') ?>
    <?= $form->field($model, 'nomber') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?> 
    
        <div class="form-group">
        <div class="col-lg-offset-3 col-lg-9">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
            <?= Html::a("Отмена", ["home1"],['class' => 'btn btn-primary']); ?>
        </div>
        </div>

<?php ActiveForm::end() ?>