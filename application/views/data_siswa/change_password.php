
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Data Siswa</a></li>
            <li class="active">Ganti Password User</li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <form action="<?php echo site_url('data_siswa/change_password')?>/<?php echo $user; ?>" method="post" class="form-horizontal"> 
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php echo lang('change_password_old_password_label', 'old_password');?></label>
                            <div class="col-sm-10">
                                <?php echo form_input($old_password);?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
                            <div class="col-sm-10">
                                <?php echo form_input($new_password);?>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?></label>
                            <div class="col-sm-10">
                                <?php echo form_input($new_password_confirm);?>
                            </div>
                        </div>
                        <?php echo form_input($user_id);?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-10">
                                <?php echo form_submit('submit', lang('change_password_submit_btn'),"class='btn btn-primary'");?>
                            </div>
                        </div>
                    <?php echo form_close();?>
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div>