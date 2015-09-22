<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => CHtml::link(Yii::t('site','Home'), Yii::app()->createUrl('site/index')),
    'links'=>array(Yii::t('site','Cargo')=>'index', Yii::t('site','Add')),
));
?>

<h1><?=Yii::t('site','Add cargo'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>