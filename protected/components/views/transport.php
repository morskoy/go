<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl('transport/find'),
    'method'=>'get',
)); ?>

        <table>
            <tr>
                <td><?php echo $form->textFieldRow($transport,'id',array('class'=>'span1')); ?></td>
                <td><?php
                    echo CHtml::label(Yii::t('site','Country start'), 'Code_start');
                    $this->widget('bootstrap.widgets.TbSelect2', array(
                            'asDropDownList' => true,
                            'name'           => 'Transport[country_start_id]',
                            'data'           => array(''=>'')+Chtml::listData(Country::model()->findAll(),'id','country'),
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
                                'data'           => array(''=>'')+Chtml::listData(Country::model()->findAll(),'id','code'),
                                'options'        => array(
                                    'width'       => '200px',
                                    'allowClear' => true,
                                ),
                                'htmlOptions' => array(
                                    'placeholder' => Yii::t('site','Country code')
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
                    echo CHtml::label(Yii::t('site','Country end'), 'Country_finish_id');
                    $this->widget('bootstrap.widgets.TbSelect2', array(
                            'asDropDownList' => true,
                            'name'           => 'Transport[country_finish_id]',
                            'data'           => array(''=>'')+Chtml::listData(Country::model()->findAll(),'id','country'),
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
                    ?>
                </td>
                <td>
                    <?php
                    echo CHtml::label(Yii::t('site','Country end'), 'Code_finish');
                    $this->widget('bootstrap.widgets.TbSelect2', array(
                            'asDropDownList' => true,
                            'name'           => 'Transport[code_finish]',
                            'data'           => array(''=>'')+Chtml::listData(Country::model()->findAll(),'id','code'),
                            'options'        => array(
                                'width'       => '200px',
                                'allowClear' => true,
                            ),
                            'htmlOptions' => array(
                                'placeholder' => Yii::t('site','Country code')
                            ),
                            'events'         => array( // обрабатываем события
                                'change' => "function() {
                        $('#Transport_country_finish_id').select2().select2('val', $('#Transport_code_finish').val());
                    }"
                            )
                        )
                    );
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan=3> <?php echo $form->dateRangeRow($transport,'date_start',array(
                        'class'=>'span3',
                        'prepend'=>'<i class="icon-calendar"></i>',
                        'options' => array(
                            'language' => Yii::app()->language,
                            'format' => 'dd-MM-yyyy',
                        ),
                    )); ?>
                </td>
                <td colspan=2>
                    <?php echo $form->dateRangeRow($transport,'date_finish',array(
                        'class'=>'span3',
                        'prepend'=>'<i class="icon-calendar"></i>',
                        'options' => array(
                            'language' => Yii::app()->language,
                            'format' => 'dd-MM-yyyy',
                        ),
                    )); ?>
                </td>

            </tr>   

        </table>
        

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>Yii::t('site','Find'),
        )); ?>
    </div>

<?php $this->endWidget(); ?>
