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
            <li class="active"><a href="#">Tambah Data Log Kegiatan</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Tambah Log Kegiatan
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <form action="<?php echo site_url('log_kegiatan/save')?>" method="post" class="form-horizontal"> 
                        <div class="form-group">
                             <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="">
                                <input type="text" class="form-control" name="tanggal" placeholder="Tanggal" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jam Mulai</label>
                            <div class="col-sm-4">
                                <input type="hidden" name="id" value="">
                                <input type="text" class="form-control" name="mulai" placeholder="Jam mulai" value="">
                            </div>
                            <label class="col-sm-2 control-label">JAm Selesai</label>
                            <div class="col-sm-4">
                                <input type="hidden" name="id" value="">
                                <input type="text" class="form-control" name="selesai" placeholder="Jam selesai" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Uraian Kegiatan</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="">
                                <input type="text" class="form-control" name="uraian_kegiatan" placeholder="Uraian kegiatan" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sarana</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="">
                                <input type="text" class="form-control" name="sarana" placeholder="Sarana" value="">
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