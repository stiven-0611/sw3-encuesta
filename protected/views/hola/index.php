<h1>Prueba twitter <?php echo $twitter;?></h1>
<?php foreach($model as $data):?>
	<h1><?php echo $data->username;?></h1>
	<?php endforeach;?>