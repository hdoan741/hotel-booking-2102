<div class="container content">

	<h1>Booking Information </h1>


	<?php if ($booking === NULL) { ?>

		<div class="alert alert-danger">
			No booking with the id <?php echo $booking_id ?> found
		</div>

	<?php } else { ?>


	<h3>Start Date: <?php echo $booking->start_date; ?></h3>
	<h3>End Date: <?php echo $booking->end_date; ?></h3>

	<div class="row">

		<div class="span2">
			<img src="<?php echo $hotel->image_url ?>" />
		</div>

		<div class="span8">
			<h1><?php echo $hotel->name ?></h1>
			<h3><?php echo $hotel->location ?></h3>
		</div>

		<div class="clearfix"></div>
		<br/>
		<table class='table table-striped span8'>
			<tr>
				<th>Room Code</th>
				<th>Comfort Level</th>
				<th>Type</th>
				<th>Price</th>
			</tr>



			<?php foreach ($rooms as $room): ?>
			<tr>
				<td><?php echo $room->room_code; ?>
					<td><?php echo $room->comfort_level; ?></td>
					<td><?php echo $room->type; ?></td>
					<td><?php echo $room->price; ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>


	<a href="/mybooking/delete/<?php echo $booking->id; ?>" class="btn btn-danger">Cancel This Booking</a>


	<?php } ?>

</div>