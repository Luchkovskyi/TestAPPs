<?php
use yii\helpers\Html;
use yii\grid\GridView;
use \yii\bootstrap\Button;
use \backend\widgets\Alert;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

<?=Button::widget([
    'tagName'     => 'a',
    'label'       => Html::tag('i', '', ['class' => 'fa fa-plus-square']) . ' Add',
    'encodeLabel' => false,
    'options'     => [
    'class' => 'btn-success btn-add',
    'href'  => Url::toRoute(['events/update'])
    ],
    ]);
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'columns' => [
        'event_id',
        'event_title',
        'event_description',
        'event_start',
        'event_end',
        'event_country',
        'event_state',
        'event_city',
        'event_zip',
        'event_place',
        'event_place',
        'event_address',
        'event_help_link',
        [
            'header'         => 'Settings',
            'content'        => function ($dataProvider) {
                return Button::widget([
                    'tagName'     => 'a',
                    'label'       => Html::tag('i', '', ['class' => 'fa fa-pencil-square-o']),
                    'encodeLabel' => false,
                    'options'     => [
                        'class' => 'btn-primary',
                        'href'  => Url::toRoute(['events/update', 'id' => $dataProvider->event_id])
                    ],
                ]);
            },
            'headerOptions'  => ['class' => 'settings', 'style' => 'width: 75px;'],
            'contentOptions' => ['class' => 'grid-btn', 'style' => 'width: 75px;text-align: center;vertical-align: middle;'],
        ],
        ],
    'options' => [
        'style' => 'width: 65px;',
    ],
]) ?>

</div>
