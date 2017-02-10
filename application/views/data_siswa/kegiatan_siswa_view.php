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
                        <?php $this->load->view('data_siswa/kegiatan_siswa_profil')?>
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
                                            <?php foreach($rencana_kegiatan as $rk){ ?>
                                            <tr>
                                                <td><?php echo $rk->tanggal_mulai?> - <?php echo $rk->tanggal_selesai?></td>
                                                <td><?php echo $rk->uraian_kegiatan ?></td>
                                            </tr>
                                            <?php } ?>
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
                                                <th>Status Kehadiran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($absensi_kegiatan as $ak){ ?>
                                            <tr>
                                                <td><?php echo $ak->tanggal ?></td>
                                                <td><?php echo $ak->tanggal ?></td>
                                                <td><?php echo $ak->datang ?></td>
                                                <td><?php echo $ak->pulang ?></td>
                                                <td><?php echo $ak->status_kehadiran_id ?></td>
                                            </tr>
                                            <?php } ?>
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
                                                <th>Sarana</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($log_kegiatan as $lg){ ?>
                                            <tr>
                                                <td><?php echo $lg->tanggal?></td>
                                                <td><?php echo $lg->mulai?> sd <?php echo $lg->selesai?></td>
                                                <td><?php echo $lg->uraian_kegiatan?></td>
                                                <td><?php echo $lg->sarana ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="4">
                                    <br>
                                    <table id="table4" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Aspek Nilai</th>
                                                <th>Nilai Angka</th>
                                                <th>Nilai Huruf</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($penilaian as $p){ ?>
                                            <tr>
                                                <td><?php echo $p->nama_aspek_penilaian?></td>
                                                <td><?php echo $p->nilai_angka?></td>
                                                <td><?php echo $p->nilai_huruf?></td>
                                                <td><?php echo $p->keterangan ?></td>
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