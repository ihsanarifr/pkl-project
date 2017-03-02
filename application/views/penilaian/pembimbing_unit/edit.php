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
            <li class="active"><a href="#">Edit Data Penilaian </a></li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">
                    Edit Data Penilaian
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">

                    <?php $this->load->view('layouts/alert')?>
                     <form action="<?php echo site_url('penilaian/pembimbing_unit_update')?>" method="post" class="form-horizontal">
                        <input type="hidden" name="id" value="<?php echo $penilaian->id ?>">
                       <div class="form-group">
                            <label class="col-sm-2 control-label">Aspek Penilaian</label>
                            <div class="col-sm-4">
                                <select name="aspek_penilaian_id" id="" class="form-control" disabled="">
                                    <option value="">-</option>
                                    <?php foreach($aspek_penilaian as $row){
                                    if($penilaian->aspek_penilaian_id == $row->id) { ?>
                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->nama ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama ?></option>
                                    <?php }
                                     } ?>
                                </select>
                            </div>
                         </div>


                         <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" placeholder="Nama siswa" value="<?php echo $penilaian->nama_siswa?>" readonly>
                            </div>
                         </div>

                     
						    <div class="form-group">
                            <label class="col-sm-2 control-label">Nilai Angka</label>
                            <div class="col-sm-10">
                               <input type="text" class="form-control" name="nilai_angka" placeholder="Nilai angka" value="<?php echo $penilaian->nilai_angka?>" onkeypress="return hanyaAngka(event)"/>
 
	<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
                         </div>
                         </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Nilai Huruf</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nilai_huruf" placeholder="Nilai Huruf" value="<?php echo $penilaian->nilai_huruf?>" onkeypress='return isNumberKey(event)'"/>
								<script>
  function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if ((charCode < 65) || (charCode == 32))
            return false;         
         return true;
      }
</script>
                         </div>
                         </div>
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea rows="10" cols="30" class="form-control" name="keterangan" placeholder="Keterangan" value=""><?php echo $penilaian->keterangan?></textarea>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    var table = $('#example').DataTable();
    var tt = new $.fn.dataTable.TableTools( table );
 
    $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
} );
</script>