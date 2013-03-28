<div class="container content">
	<h1>Create A New Hotel</h1>
	<?php echo form_open('/hotels/create', array('class'=>'form-horizontal')); ?>
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
	
	<table class="table">
		<tr>
			<th>Choose</th>
			<th>Feature Code</th>
			<th>Feature Name</th>
			<th>Feature Description</th>
		</tr></br>

		<?php
			for ($i = 0; $i < count($features); $i++) {
				$row = $features[$i];
				echo "<tr>";

				echo "<td>";
				$format = "<input type=\"checkbox\" name=\"features[]\" value=\"%d\"><br>";
				echo sprintf($format, $i);
				echo "</td>";

				echo "<td>".$row->id."</td>";
				echo "<td>".$row->name."</td>";
				echo "<td>".$row->description."</td>";
				
				echo "</tr>";
			}
		?>
	</table>

	<div class="control-group">
		<div class="controls">
			<?php echo form_submit($hotel_submit); ?>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>