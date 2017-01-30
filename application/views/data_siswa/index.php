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
            <li class="active"><a href="<?php echo site_url('data_siswa')?>">Data Siswa</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Data Siswa
                    </h3>

                    <a href="<?php echo site_url('data_siswa/add')?>" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-user"></i> Tambah Siswa</a>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>NIS - Nama</th>
                                <th>Sekolah</th>
                                <th>Program Keahlian</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($siswa as $si)
                            {
                            ?>
                            <tr>
                                <td><a href="<?php echo site_url('data_siswa/view')?>/<?php echo $si->id ?>"><?php echo $si->nomor_induk ?> - <?php echo $si->nama ?></a></td>
                                <td><?php echo $si->nama_sekolah?></td>
                                <td><?php echo $si->nama_program_keahlian?></td>
                                <td>
                                    <a href="<?php echo site_url('data_siswa/edit')?>/<?php echo $si->id ?>" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                    <a onclick="return confirm('Anda Yakin akan menghapus?')" class="label label-danger" href="<?php echo site_url('data_siswa/delete')?>/<?php echo $si->id ?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                    <a href="<?php echo site_url('data_siswa/change_password')?>/<?php echo $si->id ?>" class="label label-info"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a>
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
    $('#example').DataTable();
    $('#example1').DataTable();
} );
</script>
