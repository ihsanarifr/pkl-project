
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
                    <form action="<?php echo site_url('data_siswa/upload_photo')?>/<?php echo $siswa->id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data"> 
                        <div class="col-md-3">
                            <?php if(empty($siswa->foto)){ ?>
                                <img class="thumbnail" src="<?php echo base_url()?>assets/images/sample.svg" alt="...">
                            <?php }else{ ?>
                                <img class="thumbnail" src="<?php echo base_url()?>assets/images/users/<?php echo $siswa->foto ?>" width="250">
                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="hidden" name="user_id" value="<?php echo $siswa->id; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Upload Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" name="file_upload" id="exampleInputFile">
                                    <p class="help-block">Format: jpg,jpeg,png Maks. 500 KB</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-10">
                                    <?php echo form_submit('submit', lang('change_password_submit_btn'),"class='btn btn-primary'");?>
                                </div>
                            </div>
                        </div>
                    <?php echo form_close();?>
                    <!--</form>-->
                </div>
            </div>
        </div>
    </div>
</div>