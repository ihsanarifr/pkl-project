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
            <li><a href="<?php echo site_url('index')?>">Home</a></li>
            <li class="active"><a href="#">Data Rencana Kegiatan</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Rencana Kegiatan
                    </h3>
                    <a href="<?php echo site_url('rencana_kegiatan/add')?>" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-user"></i> Tambah Rencana Kegiatan</a>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <br><br>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
<<<<<<< HEAD
                            <th width="10px">No</th>
                            <th>Nama Rencana</th>
=======
                            <th>Uraian Kegitan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Keterangan</th>
>>>>>>> ec15430ede11d446931f574eaad9cb5941a11087
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<<<<<<< HEAD
                        <?php $no = 1; ?>
                        <?php foreach($rencana_kegiatan as $row) {?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->name ?></td>
                            <td>
                                <a href="<?php echo site_url('rencana_kegiatan/edit')?>/<?php echo $row->id ?>" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                <a href="<?php echo site_url('rencana_kegiatan/delete')?>/<?php echo $row->id ?>" class="label label-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
=======
                       <?php foreach($rencana_kegiatan as $rk) {?>
                        <tr>
                            <td><?php echo $rk->uraian_kegiatan?></td>
                            <td><?php echo $rk->tanggal_mulai ?></td>
                            <td><?php echo $rk->tanggal_selesai ?></td>
                            <td><?php echo $rk->keterangan ?></td>



                            <td>
                                <a href="<?php echo site_url('rencana_kegiatan/edit/')?>/<?php echo $rk->id ?>" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                <a onclick="return confirm('Anda Yakin akan menghapus?')" class="label label-danger" href="<?php echo site_url('rencana_kegiatan/delete/')?><?php echo $rk->id ?>
                                "><i class="glyphicon glyphicon-trash"></i> Hapus</a>
>>>>>>> ec15430ede11d446931f574eaad9cb5941a11087
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
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