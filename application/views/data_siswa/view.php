<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Data Siswa</a></li>
            <li class="active">Detail</li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <div class="row">
                        <?php $this->load->view('data_siswa/profil')?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo site_url('data_siswa/add_kegiatan')?>" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-user"></i> Tambah Kegiatan Prakerin</a>
                            <div class="clearfix"></div><br>
                            <table id="table2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tanggal Pelaksanaan</th>
                                        <th>Unit</th>
                                        <th>Pembimbing Sekolah</th>
                                        <th>Pembimbing Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="<?php echo site_url('data_siswa/detail_kegiatan/')?>/1">Tanggal Pelaksanan</a></td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>
                                            <a href="<?php echo site_url('data_siswa/edit_kegiatan')?>/1" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                            <a href="<?php echo site_url('data_siswa/delete_kegiatan')?>/1" class="label label-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="<?php echo site_url('data_siswa/detail_kegiatan/')?>/1">Nama Orangnya</a></td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>
                                            <a href="<?php echo site_url('data_siswa/edit_kegiatan')?>/1" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                            <a href="<?php echo site_url('data_siswa/delete_kegiatan')?>/1" class="label label-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
   $('#table1').DataTable();
   $('#table2').DataTable();
   $('#table3').DataTable();
   $('#table4').DataTable();
});
</script>