<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">
 	<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $model->isNewRecord ? 'Add' : 'Update'?> Country</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

              	<div class="box-body">
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    			<?= $form->field($model, 'population')->textInput() ?>
          <?= $form->field($model, 'image')->fileInput()?>
          <?= $model->isNewRecord?'' : Html::img(Yii::$app->request->baseUrl.'/uploads/'.$model->image,['width'=>'100px']) ?>
              	</div>
              <!-- /.box-body -->
              	<div class="box-footer">
			     	<?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>
			<?php ActiveForm::end(); ?>
          </div>
          <!-- /.box -->
         </div>
     	</div>
	</section>
 

</div>
