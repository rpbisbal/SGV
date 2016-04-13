<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Record */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_name')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'problem_id')->dropDownList(
       ArrayHelper::map(\backend\models\Problem::find()->all(),'id', 'problem_type'),
	   ['prompt'=>'Problem']
    ) ?>
	
	 <?= $form->field($model, 'short_description')->textInput(['maxlength' => true]) ?>
	 
	
	 
	 <?= $form->field($model, 'category_id')->dropDownList(
       ArrayHelper::map(\backend\models\Category::find()->all(),'id', 'category_type'),
	   ['prompt'=>'Category']
    ) ?>
	
	<?= $form->field($model, 'employee_id')->dropDownList(
       ArrayHelper::map(\backend\models\Employee::find()->all(),'id', 'cbs_firstname', 'cbs_lastname'),
	   ['prompt'=>'IT in-charged']
    ) ?>

    <?= $form->field($model, 'action_taken')->textInput(['maxlength' => true]) ?>
	
	
	<?= $form->field($model, 'date_recieved')->textInput() ?>
	
	
	

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

  

   

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
