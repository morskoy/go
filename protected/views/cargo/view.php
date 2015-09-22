<?php
$this->breadcrumbs=array(
    'Cargos'=>array('index'),
    $model->id,
);
?>

<h1>View Cargo #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        'date_add',
        'route' => array(
            'type'=>'raw',
            'name'=>Yii::t('site','Route'),
            'value'=>function($model) {
                if ($model->postal_code_start != '') $model->postal_code_start = "&nbsp;(".$model->postal_code_start.")&nbsp;";
                if ($model->postal_code_finish != '') $model->postal_code_finish = "&nbsp;(".$model->postal_code_finish.")&nbsp;";
                if($model->country_start_id == $model->country_finish_id) return $model->city_start.$model->postal_code_start."&rarr;&nbsp;".$model->city_finish.$model->postal_code_finish."&nbsp;(".$model->countryStart->country."&nbsp;".$model->countryStart->code.")";
                else return $model->countryStart->country."&nbsp;(".$model->countryStart->code.")&nbsp;&rarr;&nbsp;".$model->countryFinish->country."&nbsp;(".$model->countryFinish->code.")&nbsp;(".$model->city_start.$model->postal_code_start."&nbsp;&rarr;&nbsp;".$model->city_finish.$model->postal_code_finish.")";
            },

        ),
        'date_start'=> array(
            'type' => 'raw',
            'name' => Yii::t('site','Date start'),
            'value' => function($model) {
                if($model->correction_start != '') return $model->date_start."&nbsp;&plusmn;".$model->correction_start."&nbsp;".Yii::t('site','day(s)');
                else return $model->date_start;
            }
        ),
        'date_finish' => array(
            'type' => 'raw',
            'name' => Yii::t('site','Date end'),
            'value' => function($model) {
                if($model->correction_finish != '') return $model->date_finish."&nbsp;&plusmn;".$model->correction_finish."&nbsp;".Yii::t('site','day(s)');
                else return $model->date_finish;
            }
        ),
        'dop_info',
        'contacts'
    ),
)); ?>
