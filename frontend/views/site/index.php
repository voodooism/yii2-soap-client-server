<?php

/* @var $this yii\web\View */
/* @var \frontend\models\soap\request\Calculate $calculateModel*/
/* @var int $price */

use yii\bootstrap\Html;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;
use frontend\assets\CalculatorAsset;

CalculatorAsset::register($this);
$this->title = 'Calculator';
?>
<div class="site-index">
    <?php $activeForm = ActiveForm::begin([
            'options' => [
                'class' => 'js-calculator-form'
            ],
    ]); ?>
      <div class="row">
        <div class="col-md-6">
            <?= $activeForm->field($calculateModel, 'city')->textInput()?>
        </div>
        <div class="col-md-6">
            <?= $activeForm->field($calculateModel, 'name')->textInput()?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <?= $activeForm->field($calculateModel, 'date')
                ->widget(DatePicker::class, [
                    'options' => [
                        'placeholder' => 'Select date...',
                        'autocomplete' => 'off'
                    ],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]); ?>
        </div>
        <div class="col-md-6">
            <?= $activeForm->field($calculateModel, 'customParam1')->textInput()?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <?= $activeForm->field($calculateModel, 'customParam2')->textInput()?>
        </div>
        <div class="col-md-6">
            <?= $activeForm->field($calculateModel, 'customParam3')->textInput()?>
        </div>
      </div>
      <div class="form-group">
        <div class="btn-group">
            <?=Html::submitButton('Рассчитать', ['class' => 'btn btn-primary']) ?>
        </div>
      </div>
    <?php ActiveForm::end(); ?>
    <div class="alert alert-danger alert-dismissible soap-error-alert" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <p><strong>Произошла ошибка: </strong><span class="js-error-message"></span></p>
    </div>
    <div class="alert alert-success alert-dismissible soap-message-alert" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <p><strong>Стоимость: </strong><span class="js-price"></span></p>
      <p><strong>Информационное сообщение: </strong><span class="js-info-message"></span></p>
    </div>
</div>
