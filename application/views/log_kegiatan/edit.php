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
            <li class="active"><a href="#">Edit Log Kegiatan</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Edit Log Kegiatan
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <form action="<?php echo site_url('log_kegiatan/update')?>" method="post" class="form-horizontal"> 
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggal" placeholder="Uraian Kegiatan" value="<?php echo $kegiatan->tanggal?>">
                                <input type="hidden" class="form-control" name="id"  value="<?php echo $kegiatan->id?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jam Mulai</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="mulai" placeholder="Jam Mulai" value="<?php echo $kegiatan->mulai?>">
                            </div>
                            <label class="col-sm-2 control-label">Jam Selesai</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="selesai" placeholder="Jam Selesai" value="<?php echo $kegiatan->selesai?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Uraian Kegiatan</label>
                            <div class="col-sm-10">
                                <textarea rows="10" cols="30" class="form-control" name="uraian_kegiatan" placeholder="Uraian Kegiatan" value=""><?php echo $kegiatan->uraian_kegiatan?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sarana</label>
                            <div class="col-sm-10">
                                <textarea rows="10" cols="30" class="form-control" name="sarana" placeholder="Sarana" value=""><?php echo $kegiatan->sarana?></textarea>
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
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    var table = $('#example').DataTable();
    var tt = new $.fn.dataTable.TableTools( table );
 
    $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
} );
</script>