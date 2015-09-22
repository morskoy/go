<?php 
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => CHtml::link(Yii::t('site','Home'), Yii::app()->createUrl('site/index')),
    'links'=>array(Yii::t('site','Transport')),
));
?>

<h1><?=Yii::t('site','Transport');?></h1>

<?php
Yii::app()->clientScript->registerScript("", "$('.ipopover').popover();", CClientScript::POS_READY);
$this->widget('bootstrap.widgets.TbExtendedGridView', array(
    'type'=>'striped bordered condensed',
    'template'=>"{items}",
    'dataProvider'=>$dataProvider,

    'columns'=>array(
        array(
            'name' => 'id',
            'htmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;')
        ),
        array(
            'name' => 'date_add',
            'htmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
        ),
        array(
            'header' => Yii::t('site','Route'),
            'value' => function($data){
                if ($data->postal_code_start != '') $data->postal_code_start = "&nbsp;(".$data->postal_code_start.")&nbsp;";
                if ($data->postal_code_finish != '') $data->postal_code_finish = "&nbsp;(".$data->postal_code_finish.")&nbsp;";
                if($data->country_start_id == $data->country_finish_id) echo $data->city_start.$data->postal_code_start."&rarr;&nbsp;".$data->city_finish.$data->postal_code_finish."&nbsp;(".$data->countryStart->country."&nbsp;".$data->countryStart->code.")";
                else echo $data->countryStart->country."&nbsp;(".$data->countryStart->code.")&nbsp;&rarr;&nbsp;".$data->countryFinish->country."&nbsp;(".$data->countryFinish->code.")&nbsp;(".$data->city_start.$data->postal_code_start."&nbsp;&rarr;&nbsp;".$data->city_finish.$data->postal_code_finish.")";
            },

        ),
        array(
            'header' => Yii::t('site','Date start'),
            'value' => function($data){
                if($data->correction_start != '') echo $data->date_start."&nbsp;&plusmn;".$data->correction_start."&nbsp;".Yii::t('site','day(s)');
                else echo $data->date_start;
            },
            'htmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),

        ),

        array(
            'header' => Yii::t('site','Date end'),
            'value' => function($data){
                if($data->correction_finish != '') echo $data->date_finish."&nbsp;&plusmn;".$data->correction_finish."&nbsp;".Yii::t('site','day(s)');
                else echo $data->date_finish;
            },
            'htmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
        ),
        
        array(
            'header' => Yii::t('site','Contacts'),
            'value'=> function($data){
                     echo CHtml::Link('<i class="icon-info-sign"></i>', null, array(
                        'class' => 'ipopover',
                        'data-trigger' => 'click',
                        'data-html' => true,
                        'data-title' => Yii::t('site', 'User').':&nbsp;'.$data->user->username,
                        'data-content' => Yii::app()->format->ntext($data->contacts),
                    )); 
            },
            'htmlOptions'=>array('style'=>'width: 10px; text-align:center; vertical-align:middle;'),
            'headerHtmlOptions'=>array('style'=>'text-align:center; vertical-align:middle;'),
        ),
        
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'htmlOptions'=>array('style'=>'width: 10px; text-align:center; vertical-align:middle;'),
        ),

    ),
));
?>
