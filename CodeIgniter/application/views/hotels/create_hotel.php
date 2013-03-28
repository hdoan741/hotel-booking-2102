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
	  <div class="control-group">
	    <div class="controls">
	      <?php echo form_submit($hotel_submit); ?>
	    </div>
	  </div>
	<?php echo form_close(); ?>
</div>