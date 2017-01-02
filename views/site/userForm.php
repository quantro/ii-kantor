<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if(Yii::$app->session->hasFlash('sukses'))
{
    echo "<div class='alert alert-success'>".Yii::app->session->getFlash('sukses')."</div>";
}

$form = ActiveForm::begin();

echo $form->field($model,'name');
echo $form->field($model,'email');
echo Html::submitButton('Submit',['class'=>'btn btn-success']);

?>