<div class="container content">
	<h1>Update A Hotel</h1>
	<?php echo form_open('/hotels/update/'.$hotel_code['value'], array('class'=>'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label" for="hotel_code">Hotel Code</label>
		<div class="controls">
			<?php echo form_input($hotel_code); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="name">Name</label>
		<div class="controls">
			<?php echo form_input($name); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="location">Location</label>
		<div class="controls">
			<?php echo form_input($location); ?>
		</div>
	</div>

	<div>
		<table class="table table-bordered">
			<thread>
				<tr>
					<th>Choose</th>
					<th>Feature Code</th>
					<th>Feature Name</th>
					<th>Feature Description</th>
				</tr>
			</thread>

			<tbody>
				<?php
				for ($i = 0; $i < count($features); $i++) {
					$row = $features[$i];
					echo "<tr>";

					echo "<td>";
					// $format = "<input type=\"checkbox\" name=\"features[]\" value=\"%d\"><br>";
					// echo sprintf($format, $i);
					echo form_checkbox('features[]', $row->id, $checkbox[$i]);
					echo "</td>";

					echo "<td>".$row->id."</td>";
					echo "<td>".$row->name."</td>";
					echo "<td>".$row->description."</td>";

					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>

	<div class="control-group">
		<div class="controls">
			<?php echo form_submit($hotel_submit); ?>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>