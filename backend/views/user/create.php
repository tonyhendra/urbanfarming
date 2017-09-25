<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <div class="user-form">
    <section class="content">
      		<div class="row">
        	<!-- left column -->
        	<div class="col-md-6">
    		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
		    <?php $form = ActiveForm::begin(); ?>
		    <div class="box-body">


		    <?= $form->field($model, 'username')->textInput() ?>
		    <?= $form->field($model, 'password')->passwordInput() ?>
		    <?= $form->field($model, 'email')->input('email') ?>
		    <?= $form->field($model, 'role')->dropDownList(['1'=>'Admin','2'=>'Driver','3'=>'Customer']) ?> 

 
 
		    </div>

		    <div class="box-footer">
		                <?= Html::submitButton('Add User', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
		    </div>

		    <?php ActiveForm::end(); ?>
		    </div>
		    </div>
		    </div>
		    </section>
    </div>

</div>
