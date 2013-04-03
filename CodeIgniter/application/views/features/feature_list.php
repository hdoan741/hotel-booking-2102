<div class="content container">
	<h1>Features</h1>

	<table class='table table-striped'>
		<tr>
			<th>Feature Name</th>
			<th>Feature Description</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	<?php foreach ($features as $feature): ?>
		<tr>
			<td><?php echo $feature->name;?></td>
			<td><?php echo $feature->description;?></td>
			<td><a href="/features/update/<?php echo $feature->id; ?>"><i class="icon-pencil"></i></a></td>
			<td><a href="/features/delete/<?php echo $feature->id; ?>"><i class="icon-trash"></i></a></td>
		</tr>
	<?php endforeach;?>
	</table>

	<a href="create">
		<button class='btn'>Add Feature</button>
	</a>
</div>