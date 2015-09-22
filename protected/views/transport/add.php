<?php
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => CHtml::link(Yii::t('site','Home'), Yii::app()->createUrl('site/index')),
    'links'=>array(Yii::t('site','Transport')=>'index', Yii::t('site','Add')),
));


/*
$this->menu=array(
array('label'=>'List Transport','url'=>array('index')),
array('label'=>'Manage Transport','url'=>array('admin')),
);
*/
?>

<h1><?=Yii::t('site','Add transport'); ?></h1>
<?php
/*
Yii::import('ext.EGMap.*');

$gMap = new EGMap();
$gMap->setWidth(640);
$gMap->setHeight(480);
$gMap->zoom = 6;
$mapTypeControlOptions = array(
    'position' => EGMapControlPosition::RIGHT_TOP,
    'style' => EGMap::MAPTYPECONTROL_STYLE_HORIZONTAL_BAR
);

$gMap->mapTypeId = EGMap::TYPE_ROADMAP;
$gMap->mapTypeControlOptions = $mapTypeControlOptions;

// Center the map on geocoded address
$gMap->setCenter(50.449412199487625, 30.511248535156255);

// Setting up an icon for marker.
$icon = new EGMapMarkerImage("http://google-maps-icons.googlecode.com/files/car.png");

$icon->setSize(32, 37);
$icon->setAnchor(16, 16.5);
$icon->setOrigin(0, 0);

$dragevent = new EGMapEvent('dragend',
    "function(event){
        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value = event.latLng.lng();
    }",
    false,
    EGMapEvent::TYPE_EVENT_DEFAULT
);

$marker = new EGMapMarker(50.449412199487625, 30.511248535156255,
    array(
        'title' => Yii::t('site', 'Transport'),
        'draggable'=>true,
        'icon'=>$icon
    ),
    'marker',
    array(
        'dragevent'=>$dragevent
    )
);

$gMap->addMarker($marker);

$geocoded_address = new EGMapGeocodedAddress(null);
$address = $geocoded_address->reverseGeocode($gMap->getGMapClient());
print_r($address);


//$sample_address = 'Czech Republic, Prague, Olivova';

// Create geocoded address
//$geocoded_address = new EGMapGeocodedAddress($sample_address);
//$geocoded_address->geocode($gMap->getGMapClient());

// Center the map on geocoded address
//$gMap->setCenter($geocoded_address->getLat(), $geocoded_address->getLng());

// Add marker on geocoded address
//$gMap->addMarker(
//    new EGMapMarker($geocoded_address->getLat(), $geocoded_address->getLng())
//);



$gMap->renderMap(array(), Yii::app()->language);
*/
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>