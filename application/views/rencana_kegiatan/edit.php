<style>
.panel-heading h3 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: normal;
    width: 75%;
    padding-top: 4px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Edit Data Rencana Kegiatan</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Edit Rencana Kegiatan
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <form action="<?php echo site_url('rencana_kegiatan/update')?>" method="post" class="form-horizontal"> 
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Uraian Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="uraian_kegiatan" placeholder="Uraian Kegiatan" value="<?php echo $rencana_kegiatan->uraian_kegiatan?>">
                                <input type="hidden" class="form-control" name="id"  value="<?php echo $rencana_kegiatan->id?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal Mulai</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="tanggal_mulai" placeholder="Tanggal" value="<?php echo $rencana_kegiatan->tanggal_mulai?>" id="mulai" readonly="true">
                                </div>
                            </div>
                            <label class="col-sm-2 control-label">Tanggal Selesai</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input type="text" class="form-control" name="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $rencana_kegiatan->tanggal_selesai?>" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?php echo $rencana_kegiatan->keterangan?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>