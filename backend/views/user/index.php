<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

  <div class="box">
    <div class="box-header">
       <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
        <!-- <p> -->
                <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        <!-- </p> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            ['label'=>'status',
            'value' => function($data){
                if($data->status=='10'){
                    return 'Active';
                }else{
                    return 'Deleted';
                }
            }
            ],
            ['label'=>'role',
            'value' => function($data){
                if($data->role=='1'){
                    return 'Admin';
                }elseif ($data->role=='2') {
                    return 'Driver';
                }else{
                    return 'Customer';
                }
            }
            ],
            'created_at',
            'updated_at',


            ['class' => 'yii\grid\ActionColumn'],

        ],
        'clientOptions' => [
                        "sScrollX" => true,
                         "responsive"=>true, 
                         
                    ],
    ]); ?>
    </div>
</div>
