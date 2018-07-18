<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
<?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //  ['class' => 'yii\grid\SerialColumn'],

            'uuid',
            'name',
            [
                'attribute' => 'priority',
                'value' => function ($model) {
                    switch ($model->priority):
                        case 1: return 'low';
                        case 2: return 'medium';
                        case 3: return 'high';
                    endswitch;
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if ($model->status) {
                        return 'in work';
                    } else {
                        return 'not in work';
                    }
                }
            ],
            [
                'attribute' => 'tags',
                'value' => function ($model) {
                    $tags="";
                    foreach ($model->tags as $tag) {
                        $tags = $tags . $tag->name . " ";
                    }
                    return $tags;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
