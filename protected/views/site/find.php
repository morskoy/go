<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'transport-form',
    'action'=>Yii::app()->createUrl('transport/find'),
    'method'=>'post',
    'enableAjaxValidation'=>false,
)); ?>
<table>
    <tr>
        <td>
            <?php
            echo CHtml::label(Yii::t('site','Country start'), 'Code_start');
            $this->widget('bootstrap.widgets.TbSelect2', array(
                    'asDropDownList' => true,
                    'name'           => 'Transport[country_start_id]',
                    'data'           => Chtml::listData(Country::model()->findAll(),'id','country'),
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
            ?>
        </td>
        <td>
            <?php
            echo CHtml::label(Yii::t('site','Country start'), 'Code_start');
            $this->widget('bootstrap.widgets.TbSelect2', array(
                    'asDropDownList' => true,
                    'name'           => 'Transport[code_start]',
                    'data'           => Chtml::listData(Country::model()->findAll(),'id','code'),
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
            ?>


        </td>
        <td>
            <?php
                echo CHtml::label(Yii::t('site','City start'), 'city_start');
                echo $form->textField($model,'city_start',array('class'=>'span2')); ?>

        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo CHtml::label(Yii::t('site','Country end'), 'Country_finish_id');
            $this->widget('bootstrap.widgets.TbSelect2', array(
            'asDropDownList' => true,
            'name'           => 'Cargo[country_finish_id]',
            'data'           => Chtml::listData(Country::model()->findAll(),'id','country'),
            'options'        => array(
                'width'       => '200px',
                'allowClear' => true,
            ),
            'events'         => array( // обрабатываем события
            'change' => "function() {
            $('#Cargo_code_finish').select2().select2('val', $('#Cargo_country_finish_id').val());
            }"
            )
            )
            );
            ?>

        </td>
        <td>
            <?php
            echo CHtml::label(Yii::t('site','Country end'), 'Code_finish');
            $this->widget('bootstrap.widgets.TbSelect2', array(
                    'asDropDownList' => true,
                    'name'           => 'Cargo[code_finish]',
                    'data'           => Chtml::listData(Country::model()->findAll(),'id','code'),
                    'options'        => array(
                        'width'       => '200px',
                        'allowClear' => true,
                    ),
                    'events'         => array( // обрабатываем события
                        'change' => "function() {
                $('#Cargo_country_finish_id').select2().select2('val', $('#Cargo_code_finish').val());
            }"
                    )
                )
            );
            ?>
        </td>
        <td>
            <?php
                echo CHtml::label(Yii::t('site','City end'), 'city_finish');
                echo $form->textField($model,'city_finish',array('class'=>'span2'));
            ?>

        </td>
    </tr>
    <tr>
        <td>
            <?php
            echo $form->datepickerRow($model, 'date_start', array(
                'prepend'=>'<i class="icon-calendar"></i>',
                'class' => 'span3',
                'options' => array(
                    'language' => Yii::app()->language,
                    'format' => 'dd-mm-yyyy',
                ),
            ));
            ?>
        </td>
        <td>
            <?php
            echo $form->datepickerRow($model, 'date_finish', array(
                'prepend'=>'<i class="icon-calendar"></i>',
                'class' => 'span3',
                'options' => array(
                    'language' => Yii::app()->language,
                    'format' => 'dd-mm-yyyy',
                ),
            ));
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>Yii::t('site','Find')
            )); ?>
            </div>
        </td>
     </tr>
</table>
<?php $this->endWidget(); ?>