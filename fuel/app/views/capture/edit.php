<h2>Editing Capture</h2>
<br>

<?php echo render('capture/_form'); ?>
<p>
	<?php echo Html::anchor('capture/view/'.$capture->id, 'View'); ?> |
	<?php echo Html::anchor('capture', 'Back'); ?></p>
