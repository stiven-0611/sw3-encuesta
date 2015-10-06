<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="media">

	<br />
	<div class="media-boby">
		<h4 class="media-heading">
		<?php echo CHtml::encode($data->getAttributeLabel('id')); ?>: <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
		<?php echo CHtml::encode($data->username); ?> <small><?php echo CHtml::encode($data->email); ?></small>
		</h4>
		<p><?php echo CHtml::encode($data->password); ?> </p>
	</div>
</div>