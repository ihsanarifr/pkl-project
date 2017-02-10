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
            <li class="active"><a href="#">Tambah aspek penilaian</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Tambah aspek penilaian
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <form action="<?php echo site_url('aspek_penilaian/save')?>" method="post" class="form-horizontal"> 
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama aspek penilaian</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" placeholder="Nama aspek penilaian">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Nama Sekolah </label>
                            <div class="col-sm-4">
                              <select name="nama_sekolah_id" id="" class="form-control">
                                    <option value=""> - </option>
                                    
                                    <?php foreach($sekolah as $row){?>
                                        <option value="<?php echo $row->id; ?>"> <?php echo $row->nama ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label"> Kelompok Penilaian </label>
                            <div class="col-sm-4">
                              <select name="kelompok_penilaian_id" id="" class="form-control">
                                    <option value=""> - </option>
                                    <?php foreach($kategori_penilaian as $row){?>
                                        <option value="<?php echo $row->id; ?>"> <?php echo $row->nama ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <br><br>
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