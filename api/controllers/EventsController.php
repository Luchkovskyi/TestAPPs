<?php
namespace api\controllers;

use common\models\Events;
use Yii;
use yii\data\ActiveDataProvider;


class EventsController extends BaseController
{
    public $modelClass = 'common\models\events';
    public function actions() {
        $act = parent::actions();
        return $act;
    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator']['except']=['index','view','create','update','delete','head'];
        return $behaviors;
    }
}
