<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Reports */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reports-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'problem_id')->dropDownList(
       ArrayHelper::map(\backend\models\Problem::find()->all(),'id', 'problem_type'),
	   ['prompt'=>'Top 3 problems']
    ) ?>

    <?= $form->field($model, 'tnf')->textInput() ?>

    <?= $form->field($model, 'lan_cable')->textInput() ?>

    <?= $form->field($model, 'ip_phone')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
