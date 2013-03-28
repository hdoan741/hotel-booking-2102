<div class="container content">
	<h1>Create A New Feature</h1>
	<?php echo form_open('/features/create', array('class'=>'form-horizontal')); ?>
	  <div class="control-group">
	    <label class="control-label" for="name">Feature Name</label>
	    <div class="controls">
	      <?php echo form_input($name); ?>
	    </div>
	  </div>
	  <div class="control-group">
	    <label class="control-label" for="feature">Feature Description</label>
	    <div class="controls">
	      <?php echo form_textarea($description); ?>
	    </div>
	  </div>
	  <div class="control-group">
	    <div class="controls">
	      <?php echo form_submit($feature_submit); ?>
	    </div>
	  </div>
	<?php echo form_close(); ?>
</div>