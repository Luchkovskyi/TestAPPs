<?php
namespace api\controllers;

use common\models\Events;
use Yii;
use yii\data\ActiveDataProvider;


class EventsController extends BaseController
{
    public $modelClass = 'common\models\Events';
    public function actions() {
        $act = parent::actions();
        unset($act['delete']);
        return $act;
    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except']=['index'];
        return $behaviors;
    }
}
