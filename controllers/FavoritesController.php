<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:01 PM
 */

namespace lo\modules\ucp\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

use lo\modules\love\models\AphorismSearch;
use lo\core\db\ActiveRecord;


class FavoritesController extends Controller
{

    /**
     * @var array сортировка
     */
    public $orderBy = ["date" => SORT_DESC];

    /**
     * @var int количество новостей на странице
     */
    public $pageSize = 20;

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    ['allow' => true, 'actions' => ['aphorism', 'index'], 'roles' => ['@']],
                    //['allow' => true, 'actions' => ['show'], 'roles' => ['?', '@']],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAphorism()
    {
        $searchModel = Yii::createObject(['class' => AphorismSearch::className(), 'scenario' => ActiveRecord::SCENARIO_SEARCH]);
        $filter = $searchModel->load(Yii::$app->request->queryParams);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, ['ucp' => true]);
        $dataProvider->getSort()->defaultOrder = $this->orderBy;
        $dataProvider->getPagination()->pageSize = $this->pageSize;

        $res["html"] = $this->renderPartial('@lo/modules/love/views/aphorism/_grid', ["dataProvider" => $dataProvider]);

        return $this->render('aphorism', compact('res', 'searchModel'));
    }



} 