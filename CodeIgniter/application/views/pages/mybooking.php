<div class="container content">
	<h1 class="page-header">My Booking</h1>
	
	<?php echo form_open('booking/mybooking'); ?>
	
	<p>Booking ID: </p>
	<input type="text" name="booking_id"><br>

	<?php echo form_submit('mysubmit', 'Submit'); ?>

	<?php echo form_close(); ?>
</div>