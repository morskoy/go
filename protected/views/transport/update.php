<?php 
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => CHtml::link(Yii::t('site','Home'), Yii::app()->createUrl('site/index')),
    'links'=>array(Yii::t('site','Transport')=>'index',$model->id,),
));
?>

<h1>Update Transport <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>