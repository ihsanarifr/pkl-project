<div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>SIM PKL</h1>
        <p>Sistem Informasi Penerimaan Siswa PKL</p>
        <p>Institut Pertanian Bogor</p>
        
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
                    <td><?php echo TanggalIndo($p->tanggal_mulai) ?></td>
                    <td><?php echo TanggalIndo($p->tanggal_selesai) ?></td>
                    <td><?php if($p->id == $this->session->userdata('prakerin_id')){ echo "<label class='label label-success'>Aktif</label>"; } else { echo "<label class='label label-warning'>Non-Aktif</label>"; } ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
    }
    ?>
</div> <!-- /container -->

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    var table = $('#example').DataTable();
    var tt = new $.fn.dataTable.TableTools( table );
 
    $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
} );
</script>