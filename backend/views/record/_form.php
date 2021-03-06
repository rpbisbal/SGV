<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Record */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>
	
	
    <?= $form->field($model, 'action_taken')->textInput(['maxlength' => true]) ?>
	
	
	<?= $form->field($model, 'date_recieved')->textInput() ?>


    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

	
	<?= $form->field($model, 'employee_id')->textInput() ?>


   	<?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>

   	
   	<?= $form->field($model, 'problem_id')->textInput() ?>

   	
   	<?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>
   
   <div class="form-group">
       <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
 
   <?php ActiveForm::end(); ?>
</div>