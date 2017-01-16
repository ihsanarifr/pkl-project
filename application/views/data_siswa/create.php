
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Data Siswa</a></li>
            <li class="active">Tambah Siswa</li>
            </ol>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php $this->load->view('layouts/alert')?>
                    <form action="<?php echo site_url('data_siswa/save')?>" method="post" class="form-horizontal"> 
                     <div class="form-group">
                            <label class="col-sm-2 control-label">Usename</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" placeholder="username">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nomor Induk</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nomor_induk" placeholder="Nomor Induk Siswa">
                            </div>
                            <label class="col-sm-2 control-label">Golongan Darah</label>
                            <div class="col-sm-4">
                              <select name="gol_darah_id" id="" class="form-control">
                                    <option value=""> - </option>
                                    
                                    <?php foreach($gol_darah as $row){?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tempat Lahir</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir">
                            </div>
                            <label class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tanggal_lahir" placeholder="Tanggal lahir">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ayah" placeholder="Nama Ayah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ibu" placeholder="Nama Ibu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kabupaten/Kota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="kabkot" placeholder="Nama Kabupaten Kota">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea rows="" cols="" class="form-control" name="alamat" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Sekolah</label>
                            <div class="col-sm-4">
                                <select name="sekolah_id" id="" class="form-control">
                                    <option value="">-</option>
                                    <?php foreach($nama_sekolah as $row){?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Program keahlian</label> 
                            <div class="col-sm-4">
                                <select name="program_keahlian_id" id="" class="form-control">
                                    <option value="">-</option>
                                    <?php foreach($program_keahlian as $row){?>
                                        <option value="<?php echo $row->id; ?>"><?php echo $row->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
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