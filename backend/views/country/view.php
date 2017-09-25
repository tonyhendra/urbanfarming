<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    

    <div class="box">
            <div class="box-header">
                <?= Html::a('Update', ['update', 'id' => $model->code], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->code], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'code',
                    'name',
                    'population',
                    [
                         'label'=>'Image',
                         'format'=>'raw',
                         'value'=>Html::img(Yii::$app->request->baseUrl.'/uploads/'.$model->image,['width'=>'100px']),
                   ],
                ],
            ]) ?>
            </div>
            <!-- /.box-body -->
          </div>
   

</div>
