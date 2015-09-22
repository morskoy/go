<?php
Yii::app()->clientScript->registerScript("", "$('.ipopover').popover();", CClientScript::POS_READY);
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => CHtml::link(Yii::t('site','Home'), Yii::app()->createUrl('site/index')),
    'links'=>array(Yii::t('site','Transport')=>'index', Yii::t('site','Find')),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('transport-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<h1><?=Yii::t('site','Searching for transporter');?></h1>

<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
<!--
<?php echo CHtml::link(Yii::t('site','Find transport'),'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
-->
</div><!-- search-form -->
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'transport-grid',
    'type'=>'striped bordered condensed',
    'template'=>"{items}",
    'dataProvider'=>$model->search(),
    //'filter'=>$model,
    

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
