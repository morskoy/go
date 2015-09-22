<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/header.css" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />    -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />   -->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
    <div>
        <h5><span><?=Yii::t('site','GO');?></span> - <?=Yii::t('site','BRING');?> <small><?=Yii::t('site','Mutual aid and decency make us useful for each other');?></small></h5>
    </div>
	


	<div id="mainmenu">
		<?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type'=>'null', // null or 'inverse'
            'brand'=>'',
            //'brandUrl'=>'#',
            //'fluid'=>false,
            'fixed' => false,
            //'collapse'=>true, // requires bootstrap-responsive.css
            'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.TbMenu',
                    'items'=>array(
                        array('label'=>Yii::t('site', 'Home'), 'url'=>Yii::app()->createUrl('/')),
                        array('label'=>Yii::t('site', 'Proposition'), 'url'=>'#', 'items' => array(
                            array('label'=>Yii::t('site','All transport'),'url'=>Yii::app()->createUrl('transport/index')),
                            array('label'=>Yii::t('site','Add transport'),'url'=>Yii::app()->createUrl('transport/add')),
                            array('label'=>Yii::t('site','All cargo'),'url'=>Yii::app()->createUrl('cargo/index')),
                            array('label'=>Yii::t('site','Add cargo'),'url'=>Yii::app()->createUrl('cargo/add')),   
                            )
                        ),
                        array('label'=>Yii::t('site', 'Searching'), 'url'=>'#', 'items' => array(
                            array('label'=>Yii::t('site','Searching transport'),'url'=>Yii::app()->createUrl('transport/find')),
                            array('label'=>Yii::t('site','Searching cargo'),'url'=>Yii::app()->createUrl('cargo/find')),   
                            )
                        ),
                        array('label'=>Yii::t('site', 'Information'), 'url'=> '#', 'items' => array(
                             array('label'=>Yii::t('site', 'About project'), 'url'=>Yii::app()->createUrl('site/about')),
                            array('label'=>Yii::t('site', 'Rules'), 'url'=>Yii::app()->createUrl('site/rules')),
                            )
                        ),
                        array('label'=>Yii::t('site', 'Reviews'), 'url'=>Yii::app()->createUrl('site/reviews')),
                        array('label'=>Yii::t('site', 'Forum'), 'url'=>Yii::app()->createUrl('site/forum')),
                        array('label'=>Yii::t('site', 'Contact'), 'url'=>Yii::app()->createUrl('site/contact')),
                    ),
                ),

                //array(
                //    'class' => 'LanguageSwitcherWidget',
                //),

        )));
        ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">

	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
