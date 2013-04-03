<div class="container content">
	<h1>Search Result</h1>

  <div>
    <form class="form-horizontal" action="/search">
      <div class="control-group">
        <label class="control-label">Location</label>
        <div class="controls">
          <input type="text" name="location" value="<?php echo $location ?>"/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label">Number of Rooms</label>
        <div class="controls">
          <input type="text" name="room" value="<?php echo $num_of_rooms ?>"/>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="reservation">Reservation dates:</label>
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-calendar"></i></span>
            <input type="text" id="reservation" value="<?php echo $start_date . ' - ' . $end_date ?>">
            <input type="hidden" name="start_date" id="booking_start" value="<?php echo $start_date ?>">
            <input type="hidden" name="end_date" id="booking_end" value="<?php echo $end_date ?>">
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button class="btn btn-primary">Search!</button>
        </div>
      </div>
    </form>
  <div>

	<table class='table table-striped'>
		<tr>
      <th width="15%"></th>
			<th>Name</th>
			<th>Location</th>
      <th width="10%"></th>
		</tr>
	<?php foreach ($hotels as $hotel):?>
		<tr>
      <td><img class="hotel_img_small" src="<?php echo $hotel->image_url ?>"/></td>
			<td><?php echo $hotel->name ?></td>
			<td><?php echo $hotel->location ?></td>
      <td><a href="<?php echo '/select/', $hotel->hotel_code, '?start_date=', urlencode($start_date), '&end_date=', urlencode($end_date) ?>"
            class="btn btn-primary">Pick This Hotel</a></td>
		</tr>
	<?php endforeach;?>
	</table>
</div>
