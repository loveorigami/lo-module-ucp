<?php
use lo\core\widgets\offcanvas\OffCanvas;
use lo\core\widgets\block\Block;
use lo\core\widgets\search\Search;
?>

<?php OffCanvas::begin(); ?>

<?php if (isset($this->params['search'])) {
    echo Search::widget([
        'searchModel' => $this->params['search']['searchModel'],
        'action' => $this->params['search']['action'] ? : '',
        'title' => $this->params['search']['title'],
    ]);
}
?>

<?php Block::begin(['title'=>'Избранное']); ?>
<?= \lo\modules\main\widgets\menu\Menu::widget(
    [
        "options" => [
            'id'=>'sidebar-nav',
            'class' => 'sidebar-nav-lo',
            //'parentLevel'=>0,
        ],
        "parentCode" => Yii::$app->blocksProvider->getArea('left', 'ucp-fav'),
        'level'=>2
    ]
); ?>
<?php Block::end(); ?>
<?php OffCanvas::end(); ?>