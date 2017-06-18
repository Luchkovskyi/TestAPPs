<?php
namespace api\controllers;

use common\models\NewsSeach;
use common\models\Polls;
use yii\data\ActiveDataProvider;
use common\models\News;




class NewsController extends BaseController
{
    public $modelClass = 'common\models\News';

    public function actions() {
        $act = parent::actions();
        $actions=[];
        $actions['index']=$act['index'];
        $actions ['index'] ['prepareDataProvider'] = [
            $this,
            'prepareDataProvider'
        ];
        $actions['view']=$act['view'];
        return $actions;
    }

    public function actionIndex() {
       $allNews = News::find()->all();
        return $allNews;
    }

}
