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
                                <th>Pembimbing</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <td><a href="<?php echo site_url('data_siswa/view')?>/1">Nama Orangnya</a></td>
                                 <td>sekolah</td>
                                <td>a</td>
                                <td>
                                    <a href="<?php echo site_url('data_siswa/edit')?>/1" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                    <a href="" class="label label-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Nama Orangnyaa</a></td>
                                <td>a</td>
                                <td>a</td>
                                <td>
                                    <a href="<?php echo site_url('data_siswa/edit')?>/1" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                    <a href="" class="label label-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="#">Nama Orangnya</a></td>
                                <td>a</td>
                                <td>a</td>
                                <td>
                                     <a href="<?php echo site_url('data_siswa/edit')?>/1" class="label label-warning"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                    <a href="" class="label label-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                                </td>
                            </tr>
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
