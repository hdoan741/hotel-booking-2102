<div class="container content">
  
  <div class="row">

    <div class="span4">
      <img src="http://blog.amsvans.com/wp-content/uploads/2010/11/hilton_hotel.jpg" />
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
        <th>Number of Beds</th>
        <th>Max Capacity</th>
        <th>Price</th>
        <th>Amount</th>
      </tr>
      <?php foreach ($rooms as $room): ?>
      <tr>
        <td><?php echo $room->name ?></td>
        <td><?php echo $room->description ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <button class="btn">Book Now</button>

</div>