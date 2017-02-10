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
            <li class="active"><a href="<?php echo site_url('penilaian')?>">Penilaian</a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Penilaian
                    </h3>
                    <?php { ?>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                               <th width="10px">No</th>
                                <th>Siswa</th>
                                <th>Sekolah</th>
                                <th>Pembimbing</th>
                                <th>Tanggal Pelaksanaan</th>
                            <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no=1;
                            foreach($penilaian as $pe)
                            {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><b><a href="<?php echo site_url('penilaian/pembimbing_sekolah_siswa')?>/<?php echo $pe->id?>" ><?php echo $pe->nama ?> (<?php echo $pe->nomor_induk ?>)</a></b></td>
                                <td><?php echo $pe->sekolah ?></td>
                                <td><?php echo $pe->pembimbing ?></td>
                                <td><?php echo $pe->tanggal_mulai ?> - <?php echo $pe->tanggal_selesai ?></td>
                            <?php
                             }?>
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
