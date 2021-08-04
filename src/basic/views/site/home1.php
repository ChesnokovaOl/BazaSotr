<br>
<?php

use yii\vendor\autoload;
use yii\helpers\Html;
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
  //  'filterModel' => $searchModel,

    'columns'=>[
       // ['class' => 'yii\grid\SerialColumn'],
        'name',
        'post',
        'nomber',
        'email',
        ['class' => 'yii\grid\ActionColumn',
        'template' => '{view} {update}'
    
        ]  
    ]
]);


          
          


