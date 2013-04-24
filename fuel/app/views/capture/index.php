<h2>Listing Captures</h2>
<br>
<?php if ($captures): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Email</th>
			<th>Mobile</th>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($captures as $capture): ?>		<tr>

			<td><?php echo $capture->email; ?></td>
			<td><?php echo $capture->mobile; ?></td>
			<td><?php echo $capture->name; ?></td>
			<td>
				<?php echo Html::anchor('capture/view/'.$capture->id, 'View'); ?> |
				<?php echo Html::anchor('capture/edit/'.$capture->id, 'Edit'); ?> |
				<?php echo Html::anchor('capture/delete/'.$capture->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Captures.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('capture/create', 'Add new Capture', array('class' => 'btn btn-success')); ?>

</p>
