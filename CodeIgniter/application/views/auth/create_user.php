<div class="container content">
  <h1 class="page-header"><?php echo lang('create_user_heading');?></h1>
  <p><?php echo lang('create_user_subheading');?></p>
  <br/>

  <div id="infoMessage"><?php echo $message;?></div>

  <?php echo form_open("auth/create_user", Array('class' => 'form-horizontal'));?>

    <div class="control-group">
      <label class="control-label">First Name</label>
      <div class="controls">
        <?php echo form_input($first_name);?>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Last Name</label>
      <div class="controls">
        <?php echo form_input($last_name);?>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Email</label>
      <div class="controls">
        <?php echo form_input($email);?>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Phone</label>
      <div class="controls">
        <?php echo form_input($phone);?>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Password</label>
      <div class="controls">
        <?php echo form_input($password);?>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Confirm Password</label>
      <div class="controls">
        <?php echo form_input($password_confirm);?>
      </div>
    </div>

    <div class="form-actions">
      <?php echo form_submit(Array('value' => 'Register', 'class' => 'btn btn-primary'));?>
    </div>

  <?php echo form_close();?>
</div>
