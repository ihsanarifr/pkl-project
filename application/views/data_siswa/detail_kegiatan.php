<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Data Siswa</a></li>
            <li><a href="#">Kegiatan Siswa</a></li>
            <li class="active">Detail</li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <?php $this->load->view('data_siswa/profil')?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a  href="#1" data-toggle="tab">Rencana Kegiatan</a></li>
                                <li><a href="#2" data-toggle="tab">Absensi</a></li>
                                <li><a href="#3" data-toggle="tab">Log Kegiatan</a></li>
                                <li><a href="#4" data-toggle="tab">Penilaian</a></li>
                            </ul>

                            <div class="tab-content ">
                                <div class="tab-pane active" id="1">
                                    <br>
                                    <table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Kegiatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="<?php echo site_url('data_siswa/view')?>/1">Nama Orangnya</a></td>
                                                <td>a</td>
                                                
                                            </tr>
                                            <tr>
                                                <td><a href="#">Nama Orangnya</a></td>
                                                <td>a</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="2">
                                    <br>
                                    <table id="table2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Hari</th>
                                                <th>Masuk</th>
                                                <th>Pulang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="<?php echo site_url('data_siswa/view')?>/1">Nama Orangnya</a></td>
                                                <td>a</td>
                                                <td>a</td>
                                                <td>a</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Nama Orangnya</a></td>
                                                <td>a</td>
                                                <td>a</td>
                                                <td>a</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="3">
                                    <br>
                                    <table id="table3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Hari</th>
                                                <th>Kegiatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="<?php echo site_url('data_siswa/view')?>/1">Nama Orangnya</a></td>
                                                <td>a</td>
                                                <td>a</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Nama Orangnya</a></td>
                                                <td>a</td>
                                                <td>a</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="4">
                                    <h3>Nilai Siswa</h3>
                                </div>
                            </div>
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
