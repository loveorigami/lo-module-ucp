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

    public function actionIndex(){

        return $this->render('index');
    }


    public function actionView($slug){
        {

            return $this->render('view', compact('model'));

        }
    }
} 