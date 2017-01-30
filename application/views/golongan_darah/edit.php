<<<<<<< HEAD
<style>
=======
5<style>
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
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
<<<<<<< HEAD
            <li class="active"><a href="#">Edit Golongan Darah</a></li>
=======
            <<li class="active"><a href="#">Edit Data</a></li>
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
<<<<<<< HEAD
                    Edit Golongan Darah
=======
                    Edit 
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
<<<<<<< HEAD
                    <form action="<?php echo site_url('unit/update')?>" method="post" class="form-horizontal"> 
                         <div class="form-group">
                            <label class="col-sm-2 control-label">unit</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?php echo $golongan_darah->id ?>">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Group" value="<?php echo $golongan_darah->name ?>">
                            </div>
                        </div>
=======
                    <form action="<?php echo site_url('golongan_darah/update')?>" method="post"> 
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jenis Golongan Darah</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?php echo $gol_darah->id ?>">
                                <input type="text" class="form-control" name="nama" placeholder="Nama golongan darah" value="<?php echo $gol_darah->nama ?>">
                            </div>
                        </div>
                        <br><br>
>>>>>>> 62caf12253c476ba815acfe16fa562b77fca6179
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