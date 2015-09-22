<?php

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => CHtml::link(Yii::t('site','Home'), Yii::app()->createUrl('site/index')),
    'links'=>array(Yii::t('site','Transport')),
));
?>

<h1><?=Yii::t('site','Transport');?></h1>

<?php
Yii::app()->clientScript->registerScript("", "jQuery('.ipopover').popover();", CClientScript::POS_READY);
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'type'=>'striped bordered condensed',
    'template'=>"{items}",
    'dataProvider'=>$dataProvider,
    'afterAjaxUpdate' => 'function(){
    	    jQuery(".ipopover").popover();
        }',

    'columns'=>array(
        array(
            'name' => 'id',
            'htmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;width: 10px;'),
        ),
        array(
            'name' => 'date_start',
            'htmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;width: 120px;'),
        ),
        array(
            'header' => Yii::t('site','Countries'),
            'value' => function($data){
                    echo $data->countryStart->country."&nbsp;(".$data->countryStart->code.")&nbsp;&rarr;&nbsp;".$data->countryFinish->country."&nbsp;(".$data->countryFinish->code.")";
                },
            'htmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;width: 200px;'),
        ),
        array(
            'header' => Yii::t('site', 'Citys(Towns)'),
            'value' => function($data){
                    $rarr = '';
                    if($data->city_start != '' &&  $data->city_finish != '') $rarr = '&nbsp;&rarr;&nbsp;';
                    echo $data->city_start.$rarr.$data->city_finish;
                },
            'htmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;width: 200px;'),
        ),
        array(
            'header' => Yii::t('site', 'Post code(ZIP)'),
            'value' => function($data){
                    $rarr = '';
                    if ($data->postal_code_start != '' && $data->postal_code_finish != '')  $rarr = '&nbsp;&rarr;&nbsp;';
                    echo $data->postal_code_start.$rarr.$data->postal_code_finish;
                },
            'htmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;width: 70px;'),

        ),

        array(
            'header' => Yii::t('site','Info'),
            'value'=> function($data){
                    if ($data->dop_info != ''){
                        if (strlen($data->dop_info) > 50) $dop = '...';
                        else $dop = '';
                        $text = mb_substr($data->dop_info, 0, 50, 'UTF-8').$dop;
                        echo CHtml::Link($text, null, array(
                            'class' => 'ipopover',
                            'data-trigger' => 'click',
                            'data-html' => true,
                            'data-title' => Yii::t('site','Info'),
                            'data-content' => Yii::app()->format->ntext($data->dop_info),
                        ));
                    }
                },
            'htmlOptions'=>array('style'=>'width: 10px; text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;width: 200px;'),

        ),
        array(

            'header' => Yii::t('site','Contacts'),
            'value'=> function($data){
                    if ($data->contacts != '') {
                        if (strlen($data->contacts) > 50) $dop = '...';
                        else $dop = '';
                        $text = mb_substr($data->contacts, 0, 50, 'UTF-8').$dop;
                        echo CHtml::Link($text, null, array(
                            'class' => 'ipopover',
                            'data-trigger' => 'click',
                            'data-html' => true,
                            'data-title' => Yii::t('site','Contacts'),
                            'data-content' => Yii::app()->format->ntext($data->contacts),
                        ));
                    }

                },
            'htmlOptions'=>array('style'=>'width: 10px; text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;width: 200px;'),

        ),
    ),
));

?>