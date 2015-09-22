<?php
$this->breadcrumbs=array(
	'Transports'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Transport','url'=>array('index')),
array('label'=>'Create Transport','url'=>array('create')),
);

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

<h1>Manage Transports</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'transport-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'user_id',
		'country_start_id',
		'city_start',
		'postal_code_start',
		'date_start',
		/*
		'correction_start',
		'country_finish_id',
		'city_finish_id',
		'postal_code_finish',
		'date_finish',
		'correction_finish',
		'dop_info',
		'date_add',
		'visible',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
