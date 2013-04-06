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

    <table class='table table-striped span8'>
      <tr>
        <th>Comfort Level</th>
        <th>Type</th>
        <th>Price</th>
	<th>Availble No.</th>
        <th>Amount</th>
      </tr>
      <?php foreach ($rooms as $room): ?>
      <tr>
        <td><?php echo ucfirst($room['comfort_level']) ?></td>
        <td><?php echo ucfirst($room['type']) ?></td>
        <td><?php echo ucfirst($room['price']) ?></td>
	<td><?php echo ucfirst($room['available_no']) ?></td>
        <td><input type="text" name="amount[]" ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <a href=<?php echo "/payment/".$hotel->hotel_code ?>><button class="btn">Book Now</button></a>

</div>
