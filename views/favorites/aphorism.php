<?php

use yii\helpers\Html;
use lo\core\widgets\block\Block;

$this->title = Yii::t('frontend', 'Favorites aphorismes');

$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Ucp'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Favorites aphorismes')];

$this->params['search'] = [
    'action'=>['favorites/aphorism'],
    'searchModel'=>$searchModel,
    'title' => 'Поиск избранных афоризмов'
];

echo $this->render('/_left');
?>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <?= $res['html']?>
</div>