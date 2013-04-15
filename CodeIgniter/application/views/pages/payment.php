<div class="container content">
  <h1 class="page-header">Complete Payment</h1>
	
  <div>
	<h2>Total Amount: $<?php echo $total ?></h2>
  </div>

  <div class="well">
    <h4>Booking from <?php echo $start_date ?> to <?php echo $end_date ?></h4>
    <table class='table table-striped'>
      <tr>
        <th>Comfort Level</th>
        <th>Type</th>
        <th>Price</th>
        <th>No. of Rooms</th>
      </tr>
      <?php foreach ($rooms as $room): ?>
      <tr>
        <td><?php echo ucfirst($room['comfort_level']) ?></td>
        <td><?php echo ucfirst($room['type']) ?></td>
        <td><?php echo ucfirst($room['price']) ?></td>
        <td><?php echo ucfirst($room['amount']) ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
 
  <div class="form-horizontal">
    <div class="control-group">
      <label class="control-label">Card Number</label>
      <div class="controls">
        <input type='text' />
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Name on Card</label>
      <div class="controls">
        <input type='text' />
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Security Number</label>
      <div class="controls">
        <input type='text' />
      </div>
    </div>

    <div class="form-actions">
      <a href="/complete"><button class="btn">Complete Booking</button></a>
    </div>
  </div>
</div>
