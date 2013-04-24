<h2>Viewing #<?php echo $capture->id; ?></h2>

<p>
	<strong>Email:</strong>
	<?php echo $capture->email; ?></p>
<p>
	<strong>Mobile:</strong>
	<?php echo $capture->mobile; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $capture->name; ?></p>

<?php echo Html::anchor('capture/edit/'.$capture->id, 'Edit'); ?> |
<?php echo Html::anchor('capture', 'Back'); ?>