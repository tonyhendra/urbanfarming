<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearcch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

      <div class="box">
            <div class="box-header">
               <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                <!-- <p> -->
                    <?= Html::a('Add Country', ['create'], ['class' => 'btn btn-success']) ?>
                <!-- </p> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?= DataTables::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'code',
                        'name',
                        'population',
                        'image',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                    'clientOptions' => [
                        "sScrollX" => true,
                         "responsive"=>true, 
                         
                    ],
                ]); ?>
            </div>
    </div>