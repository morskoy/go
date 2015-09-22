<?php
if  (Yii::app()->getLanguage() == 'en') $order_country = 'country ASC';
else $order_country = 'l_country ASC';

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'transport-form',
    'action'=>$model->isNewRecord ? $this->createUrl('add') :  $this->createUrl('update',array('id' => $model->id)),
    'method'=>'post',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block"><?=Yii::t('site','Fields with');?>&nbsp;<span class="required">*</span>&nbsp;<?=Yii::t('site','are required');?></p>

<?php echo $form->errorSummary($model); ?>


<div class="well">
    <div class="page-header">
      <h1><small><?=Yii::t('site','From');?></small></h1>
    </div>
<?php

echo CHtml::label(Yii::t('site','Country'), 'Country_start_id', array('required' => true));
$this->widget('bootstrap.widgets.TbSelect2', array(
        'asDropDownList' => true,
        'name'           => 'Transport[country_start_id]',
        'data'           => Chtml::listData(Country::model()->findAll(array('order'=>$order_country)),'id','country'),
        'val'           =>($model->isNewRecord ? '' : $model->country_start_id),
        'options'        => array(
            'width'       => '200px',
            'allowClear' => true,
        ),
        'htmlOptions' => array(
            'placeholder' => Yii::t('site','Country')
        ),
        'events'         => array( // обрабатываем события
            'change' => "function() {
                $('#Transport_code_start').select2().select2('val', $('#Transport_country_start_id').val());
            }"
        )
    )
);
echo "&nbsp;&nbsp;";
$this->widget('bootstrap.widgets.TbSelect2', array(
        'asDropDownList' => true,
        'name'           => 'Transport[code_start]',
        'data'           => Chtml::listData(Country::model()->findAll(array('order'=>'code ASC')),'id','code'),
        'val'           =>($model->isNewRecord ? '' : $model->country_start_id),
        'options'        => array(
            'width'       => '200px',
            'allowClear' => true,
        ),
        'events'         => array( // обрабатываем события
            'change' => "function() {
                $('#Transport_country_start_id').select2().select2('val', $('#Transport_code_start').val());
            }"
        )
    )
);

echo $form->error($model,'country_start_id');

?>


<?php echo $form->textFieldRow($model,'city_start',array('class'=>'span3')); ?>

<?php echo $form->textFieldRow($model,'postal_code_start',array('class'=>'span3','maxlength'=>15)); ?>

<?php

echo $form->datepickerRow($model, 'date_start', array(
        //'hint'=>'Click inside! This is a super cool date field.',
        'prepend'=>'<i class="icon-calendar"></i>',
        'class' => 'span3',
        'options' => array(
            'language' => Yii::app()->language,
            'format' => 'dd-mm-yyyy',
        ),
    )); ?>
</div>

<div class="well">
    <div class="page-header">
      <h1><small><?=Yii::t('site','To');?></small></h1>
    </div>
<?php

echo CHtml::label(Yii::t('site','Country'), 'Country_finish_id', array('required' => true));
$this->widget('bootstrap.widgets.TbSelect2', array(
        'asDropDownList' => true,
        'name'           => 'Transport[country_finish_id]',
        'data'           => Chtml::listData(Country::model()->findAll(array('order'=>$order_country)),'id','country'),
        'val'           =>($model->isNewRecord ? '' : $model->country_finish_id),
        'options'        => array(
            'width'       => '200px',
            'allowClear' => true,
        ),
        'htmlOptions' => array(
            'placeholder' => Yii::t('site','Country')
        ),
        'events'         => array( // обрабатываем события
            'change' => "function() {
                $('#Transport_code_finish').select2().select2('val', $('#Transport_country_finish_id').val());
            }"
        )
    )
);
echo "&nbsp;&nbsp;";
$this->widget('bootstrap.widgets.TbSelect2', array(
        'asDropDownList' => true,
        'name'           => 'Transport[code_finish]',
        'data'           => Chtml::listData(Country::model()->findAll(array('order'=>'code ASC')),'id','code'),
        'val'           =>($model->isNewRecord ? '' : $model->country_finish_id),
        'options'        => array(
            'width'       => '200px',
            'allowClear' => true,
        ),
        'events'         => array( // обрабатываем события
            'change' => "function() {
                $('#Transport_country_finish_id').select2().select2('val', $('#Transport_code_finish').val());
            }"
        )
    )
);

echo $form->error($model,'country_start_id');
?>

<?php echo $form->textFieldRow($model,'city_finish',array('class'=>'span3')); ?>

<?php echo $form->textFieldRow($model,'postal_code_finish',array('class'=>'span3')); ?>

</div>

<?php echo $form->textAreaRow($model,'dop_info',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>

<?php echo $form->textAreaRow($model,'contacts',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('site','Add') : Yii::t('site','Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
