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
            <li class="active"><a href="#">Data Siswa</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Data Siswa
                    </h3>

                    <a href="<?php echo site_url('data_siswa/kegiatan_siswa_add')?>" class="btn btn-default btn-sm pull-right"><i class="glyphicon glyphicon-user"></i> Tambah Siswa</a>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a  href="#1" data-toggle="tab">Sedang Berjalan</a></li>
                        <li><a href="#2" data-toggle="tab">Sudah Selesai</a></li>
                        
                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                            <br><br>
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NIS - Nama</th>
                                    <th>Sekolah</th>
                                    <th>Pembimbing</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            foreach($siswa_sedang_berlangsung as $ps)
                            {
                            ?>
                                <tr>
                                <td><a href="<?php echo site_url('data_siswa/kegiatan_siswa_view')?>/<?php echo $ps->id ?>">  <?php echo $ps->nomor_induk?> <?php echo $ps->nama?></a></td>
                                <td><?php echo $ps->sekolah?></td>
                                <td><?php echo $ps->pembimbing?></td>
                                <td>
                                    <a href="<?php echo site_url('data_siswa/kegiatan_siswa_edit')?>/<?php echo $ps->id ?>" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                    <a onclick="return confirm('Anda Yakin akan menghapus?')" class="label label-danger" href="<?php echo site_url('data_siswa/kegiatan_siswa_delete')?>/<?php echo $ps->id ?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                </td>
                            </tr>
                             <?php } ?>
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane" id="2">
                            <br><br>
                            <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NIS - Nama</th>
                                    <th>Sekolah</th>
                                    <th>Pembimbing</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                            foreach($siswa_selesai as $ps)
                            {
                            ?>
                                <tr>
                                <td><a href="<?php echo site_url('data_siswa/kegiatan_siswa_view')?>/<?php echo $ps->id ?>"> <?php echo $ps->nomor_induk?> <?php echo $ps->nama?></a></td>
                                <td><?php echo $ps->sekolah?></td>
                                <td><?php echo $ps->pembimbing?></td>
                                <td>
                                    <a href="<?php echo site_url('data_siswa/kegiatan_siswa_edit')?>/<?php echo $ps->id ?>" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                    <a onclick="return confirm('Anda Yakin akan menghapus?')" class="label label-danger" href="<?php echo site_url('data_siswa/kegiatan_siswa_delete')?>/<?php echo $ps->id ?>"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
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
    $('#example').DataTable();
    $('#example1').DataTable();
} );
</script>