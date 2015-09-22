<?php
$this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs', // 'tabs' or 'pills'
    'tabs'=>array(
        array('label'=>Yii::t('site','Transport'), 'content'=>$this->render('transport', array('transport'=>$transport), true), 'active'=>true),
        array('label'=>Yii::t('site','Cargo'), 'content'=>$this->render('cargo', array('cargo'=>$cargo), true)),
    ),
));