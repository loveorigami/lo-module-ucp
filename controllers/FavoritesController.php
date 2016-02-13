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


class FavoritesController extends Controller
{

    /**
     * @var array сортировка
     */
    public $orderBy = ["id" => SORT_DESC];

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
                    ['allow' => true, 'actions' => ['index'], 'roles' => ['@']],
                    ['allow' => true, 'actions' => ['show'], 'roles' => ['?', '@']],
                ],
            ],
        ];
    }

    public function actionIndex(){

        return $this->render('index');
    }


    public function actionView($slug){
        {

            return $this->render('view', compact('model'));

        }
    }
} 