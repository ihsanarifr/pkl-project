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
                    <?php
				    if($this->ion_auth->logged_in() && $this->ion_auth->get_users_groups()->row()->id == 2)
				    {
				    ?>
				    <div class="panel">
				        <table class="table table-responsive table-bordered" id="example">
				            <thead>
				                <th>No</th>
				                <th>Tanggal Mulai</th>
				                <th>Tanggal Selesai</th>
				                <th>Status</th>
				            </thead>
				            <tbody>
				                <?php 
				                $no = 1;
				                foreach($prakerin as $p){?>
				                <tr>
				                    <td><?php echo $no++;?></td>
				                    <td><?php echo $p->tanggal_mulai ?></td>
				                    <td><?php echo $p->tanggal_selesai ?></td>
				                    <td><?php if($p->id == $this->session->userdata('prakerin_id')){ echo "<label class='label label-success'>Aktif</label>"; } else { echo "<label class='label label-warning'>Non-Aktif</label>"; } ?></td>
				                </tr>
				                <?php } ?>
				            </tbody>
				        </table>
				    </div>
				    <?php
				    }
				    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
   $('#example').DataTable();
});
</script>