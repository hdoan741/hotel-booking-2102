<div class="content container">
	<h1>Bookings</h1>

	<table class='table table-striped'>
		<tr>
			<th>Booking ID</th>
			<th>Customer ID</th>
			<th>Number of Adults</th>
			<th>Number of Children</th>
			<th>Arrival Date</th>
			<th>Departure Date</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	<?php foreach ($bookings as $booking):?>
		<tr>
			<td><?php echo $booking->id;?></td>
			<td><?php echo $booking->customer;?></td>
			<td><?php echo $booking->num_adult;?></td>
			<td><?php echo $booking->num_child;?></td>
			<td><?php echo $booking->start_date;?></td>
			<td><?php echo $booking->end_date;?></td>
			<td><i class="icon-pencil"></i></td>
			<td><a href="/hotels/delete/<?php echo $feature->id; ?>"><i class="icon-trash"></i></a></td>
		</tr>
	<?php endforeach;?>
	</table>

	<a href="create">
		<button class='btn'>Add Booking</button>
	</a>
</div>