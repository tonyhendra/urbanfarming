<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">
    <div class="user-form">
     	<section class="content">
      		<div class="row">
        	<!-- left column -->
        	<div class="col-md-6">
    		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		    <?php $form = ActiveForm::begin(); ?>
		    <div class="box-body">

		    <?= $form->field($model, 'username')->textInput() ?>
		    <?= $form->field($model, 'password_hash')->passwordInput() ?>
		    <?= $form->field($model, 'email')->input('email')?>
		    <?= $form->field($model, 'status')->dropDownList(['10'=>'ACTIVE','0'=>'DELETED'])?>
		    <?= $form->field($model, 'role')->dropDownList(['1'=>'Admin','2'=>'Driver','3'=>'Customer'])?>

		    </div>

            <div class="box-footer">
            	 <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

		    <?php ActiveForm::end(); ?>
          </div>
          </div>
          </div>
          </section>

	</div>


</div>
