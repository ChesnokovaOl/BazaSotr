<br>

<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',  
        'post',
        'date_birth',
        'date_employment',
        'nomber',
        'email',
        ['attribute' => 'foto', 
        'format' => ['image', ['width'=>'150', 'height'=>'200']], 
    ],
],
]);

?>

        <div class="form-group">
        <div class="col-lg-offset-0 col-lg-15">
            <?= Html::a("Назад", ["home1"],['class' => 'btn btn-primary']); ?>
        </div>
        </div>