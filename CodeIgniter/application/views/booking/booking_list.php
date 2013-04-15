<div class="content container">
	<h1>Bookings</h1>

	<table class='table table-striped'>
		<tr>
			<th>Booking ID</th>
			<th>Arrival Date</th>
			<th>Departure Date</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	<?php foreach ($bookings as $booking):?>
		<tr>
			<td><?php echo $booking->id;?></td>
			<td><?php echo $booking->start_date;?></td>
			<td><?php echo $booking->end_date;?></td>
			<td><a href="/booking/update/<?php echo $booking->id; ?>"><i class="icon-pencil"></i></a></td>
			<td><a href="/booking/delete/<?php echo $booking->id; ?>"><i class="icon-trash"></i></a></td>
		</tr>
	<?php endforeach;?>
	</table>
</div>
