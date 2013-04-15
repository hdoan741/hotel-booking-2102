<div class="container content">
  
  <div class="row">

    <div class="span4">
      <img src="<?php echo $hotel->image_url ?>" />
    </div>

    <div class="span8">
      <h1><?php echo $hotel->name ?></h1>
      <h3><?php echo $hotel->location ?></h3>
    </div>
    
  </div>
	
  <h2>Booking from <?php echo $_GET['start_date'] ?> to <?php echo $_GET['end_date'] ?> </h2>

  <div class='row'>
    <h2 class="span4">Hotel Features</h2>


    <table class='table table-striped span8'>
      <tr>
        <th>Feature Name</th>
        <th>Feature Description</th>
      </tr>
      <?php foreach ($features as $feature): ?>
      <tr>
        <td><?php echo $feature->name ?></td>
        <td><?php echo $feature->description ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <div class="row">
    <h2 class="span4">Room Types</h2>

<?php echo form_open('/payment/'.$hotel->hotel_code, array('class'=>'form-horizontal')) ?>
    <table class='table table-striped span8'>
      <tr>
        <th>Comfort Level</th>
        <th>Type</th>
        <th>Price</th>
	<th>Availble No.</th>
        <th>No. of Rooms</th>
      </tr>
      <?php foreach ($rooms as $room): ?>
      <tr>
        <td><?php echo ucfirst($room['comfort_level']) ?></td>
        <td><?php echo ucfirst($room['type']) ?></td>
        <td><?php echo ucfirst($room['price']) ?></td>
	<td><?php echo ucfirst($room['available_no']) ?></td>
        <td>
		<input type="text" name="amount[]" value="0">
		<input type="hidden" name="comfort[]" value="<?php echo ucfirst($room['comfort_level']) ?>">
		<input type="hidden" name="type[]" value="<?php echo ucfirst($room['type']) ?>">
		<input type="hidden" name="price[]" value="<?php echo ucfirst($room['price']) ?>">
	</td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

<?php echo form_submit('submit', 'Book Now'); ?>
<?php echo form_close(); ?>

</div>
