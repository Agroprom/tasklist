<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\selectize\SelectizeTextInput;
/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'priority')->dropDownList([1 => 'low', 2 => 'medium', 3 => 'high']) ?>

    <?= $form->field($model, 'status')->dropDownList([1 => 'In work', 0 => 'Not in work']) ?>

    
    <?= $form->field($model, 'tagNames')->widget(SelectizeTextInput::className(), [
    // calls an action that returns a JSON object with matched
    // tags
    'loadUrl' => ['tag/list'],
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'plugins' => ['remove_button'],
        'valueField' => 'name',
        'labelField' => 'name',
        'searchField' => ['name'],
        'create' => true,
    ],
])->hint('Use commas to separate tags') ?>
    
    
    
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
