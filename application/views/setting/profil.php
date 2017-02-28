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
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <a href="<?php echo site_url('setting/edit_profil')?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit Identitas</a>
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