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
            <li class="active"><a href="#">Data Log Kegiatan</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Kegiatan
                    </h3>
                    <a href="<?php echo site_url('log_kegiatan/add')?>" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-user"></i> Tambah Log Kegiatan</a>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <br><br>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                             <th>Jam Mulai</th>
                              <th>Jam Selesai</th>
                               <th>Uraian Kegiatan</th>
                                <th>Sarana</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                      <tbody>
                       <?php foreach($kegiatan as $kg) {?>
                        <tr>
                            <td><?php echo $kg->tanggal?></td>
                            <td><?php echo $kg->mulai ?></td>
                            <td><?php echo $kg->selesai?></td>
                            <td><?php echo $kg->uraian_kegiatan ?></td>
                            <td><?php echo $kg->sarana ?></td>


                            <td>
                                <a href="<?php echo site_url('log_kegiatan/edit/')?><?php echo $kg->id ?>" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                <a onclick="return confirm('Anda Yakin akan menghapus?')" class="label label-danger" href="<?php echo site_url('log_kegiatan/delete/')?><?php echo $kg->id ?>
                                "><i class="glyphicon glyphicon-trash"></i> Hapus</a>
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