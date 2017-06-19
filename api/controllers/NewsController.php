<?php
namespace api\controllers;

use common\models\Events;
use Yii;
use yii\data\ActiveDataProvider;
use common\models\News;

class NewsController extends BaseController
{
    public $modelClass = 'common\models\News';
    public function actions() {
        $act = parent::actions();
        unset($act['delete']);
        return $act;
    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except']=['index','view','create','update','delete','head'];
        return $behaviors;
    }

}
