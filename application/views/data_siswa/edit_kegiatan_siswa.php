
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
                    <form action="<?php echo site_url('data_siswa/kegiatan_siswa_update')?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $query->id; ?>"> 
                            <label class="col-sm-2 control-label">Nama Siswa</label>
                            <div class="col-sm-10">
                              <select name="siswa_id" id="" class="form-control">
                                    <option value=""> - </option>
                                    <?php foreach($siswa as $row){
                                        if($query->id_siswa == $row->id){ ?>
                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->nama ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama ?></option>
                                    <?php }
                                     } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Unit </label>
                            <div class="col-sm-4">
                              <select name="unit_id" id="" class="form-control">
                                    <option value=""> - </option>
                                    <?php foreach($unit as $row){
                                        if($query->id_unit == $row->id){ ?>
                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->nama ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama ?></option>
                                    <?php }
                                     } ?>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label"> Pembimbing Unit </label>
                            <div class="col-sm-4">
                              <select name="pembimbing_unit_id" id="" class="form-control">
                                    <option value=""> - </option>
                                    <?php foreach($pembimbing_unit as $row){
                                        if($query->pembimbing_unit_id == $row->id){ ?>
                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->nama ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama ?></option>
                                    <?php }
                                     } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Jabatan Pembimbing Unit </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name= "jabatan_pembimbing" placeholder="-"
                            value="<?php echo $query->jabatan_pembimbing; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Tanggal masuk </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="tanggal_mulai" placeholder="Tanggal" readonly="true" value="<?php echo $query->tanggal_mulai; ?>">
                                </div>
                            </div>
                            <label class="col-sm-2 control-label"> Tanggal keluar </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" name="tanggal_selesai" placeholder="Tanggal" readonly="true" value="<?php echo $query->tanggal_selesai; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Pembimbing Sekolah </label>
                            <div class="col-md-4">
                                <select name="pembimbing_sekolah_id" id="" class="form-control">
                                    <option value=""> - </option>
                                   <?php foreach($pembimbing_sekolah as $row){
                                        if($query->pembimbing_sekolah_id == $row->id){ ?>
                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->nama ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama ?></option>
                                    <?php }
                                     } ?>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label"> Jabatan Pembimbing Sekolah </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name= "jabatan_pembimbing_sekolah" placeholder="-"
                            value="<?php echo $query->jabatan_pembimbing_sekolah; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Kelas </label> 
                            <div class="col-sm-4">
                               <select name="kelas_id" id="" class="form-control">
                                    <option value=""> - </option>
                                     <?php foreach($kelas as $row){
                                        if($query->id_kelas == $row->id){ ?>
                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->nama ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $row->id; ?>"><?php echo $row->nama ?></option>
                                    <?php }
                                     } ?>
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