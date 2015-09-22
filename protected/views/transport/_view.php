<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_start_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_start_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_start_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_start_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postal_code_start')); ?>:</b>
	<?php echo CHtml::encode($data->postal_code_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_start')); ?>:</b>
	<?php echo CHtml::encode($data->date_start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correction_start')); ?>:</b>
	<?php echo CHtml::encode($data->correction_start); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('country_finish_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_finish_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_finish_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_finish_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postal_code_finish')); ?>:</b>
	<?php echo CHtml::encode($data->postal_code_finish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_finish')); ?>:</b>
	<?php echo CHtml::encode($data->date_finish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correction_finish')); ?>:</b>
	<?php echo CHtml::encode($data->correction_finish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dop_info')); ?>:</b>
	<?php echo CHtml::encode($data->dop_info); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_add')); ?>:</b>
	<?php echo CHtml::encode($data->date_add); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visible')); ?>:</b>
	<?php echo CHtml::encode($data->visible); ?>
	<br />

	*/ ?>

</div>