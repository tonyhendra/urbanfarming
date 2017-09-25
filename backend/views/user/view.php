<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <section class="content">
      <div class="row">
        <div class="col-md-8">
         <div class="box">
            <div class="box-header">
             <h1></h1>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'status',
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
        ],
    ]) ?>
    </div>
    </div>
    </div>
    </div>
    </section>

</div>
