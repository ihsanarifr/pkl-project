<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">Masuk</div>
        <div class="panel-body">
          <!--<p><?php echo lang('login_subheading');?></p>-->
          <div style="color:red;"><?php echo $message;?></div>
          <?php echo form_open("auth/login");?>
          <div class="form-group">
            <label for="identity"><?php echo lang('login_identity_label', 'identity');?></label>
            <?php echo form_input($identity);?>
          </div>
          <div class="form-group">
            <label for="identity"><?php echo lang('login_password_label', 'password');?></label>
            <?php echo form_input($password);?>
          </div>
          <div class="checkbox">
            <label>
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> <?php echo lang('login_remember_label', 'remember');?>
            </label>
            <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Masuk</button>
          </div>
        <?php echo form_close();?>
        <!--<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>-->
        </div>
      </div>
    </div>
  </div>  
</div>