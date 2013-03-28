
<div class="container content">
  <h1 class="page-header"><?php echo lang('login_heading');?></h1>
  <p><?php echo lang('login_subheading');?></p>
  <br/>

  <div id="infoMessage"><?php echo $message;?></div>

  <?php echo form_open("auth/login", Array('class' => 'form-horizontal'));?>

    <div class="control-group">
      <label class="control-label">Email</label>
      <div class="controls">
        <?php echo form_input($identity);?>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Password</label>
      <div class="controls">
        <?php echo form_input($password);?>
      </div>
    </div>

    <div class="control-group">
      <div class="controls">
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
        Remember me
      </div>
    </div>

    <div class="form-actions">
      <?php echo form_submit(Array('value' => lang('login_submit_btn'), 'class' => 'btn btn-primary'));?>
    </div>

  <?php echo form_close();?>

  <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>
