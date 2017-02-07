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
            <li class="active"><a href="<?php echo site_url('pembimbing_sekolah')?>">Pembimbing Sekolah</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                     Pembimbing Sekolah 
                    </h3>
                    <a href="<?php echo site_url('pembimbing_sekolah/add')?>" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-user"></i> Tambah Pembimbing Sekolah</a>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <br><br>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Nama Pembimbing Sekolah</th>
                            <th>Nomor Hp</th>
                            <th>Nama Sekolah</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach($pembimbing_sekolah as $ps) {?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                           <td><?php echo $ps->nama?></td>
                            <td><?php echo $ps->no_hp?></td>
                            <td><?php echo $ps->nama_sekolah ?></td>
                           


                            <td>
                                <a href="<?php echo site_url('pembimbing_sekolah/edit/')?>/<?php echo $ps->id ?>" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                <a onclick="return confirm('Anda Yakin akan menghapus?')" class="label label-danger" href="<?php echo site_url('pembimbing_sekolah/delete/')?><?php echo $ps->id ?>
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