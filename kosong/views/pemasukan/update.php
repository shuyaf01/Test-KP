

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Update Pemasukan</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pemasukan</li>
            <li class="active">Update</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                        <div class="box-body">
                        
                        <?php $this->load->view('templates/flash'); ?>   
                        <!-- form start -->
                <br>
                <?php echo form_open_multipart(site_url('PemasukanController/Update/'.$record->id_pemasukan)) ?>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row <?php echo (form_error('id_pemasukan')) ? ' has-error' : ''; ?>">
                            <label for="inputIDPemasukan" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_pemasukan' placeholder="ID" readonly value="<?php echo $record->id_pemasukan; ?>">
                             <?php echo form_error('id_pemasukan', '<span class="help-block">', '</span>') ?>
                            </div>
                            
                        </div>
                        
                        <div class="form-group row <?php echo (form_error('nama_barang')) ? ' has-error' : ''; ?>">
                            <label for="inputNamaBarang" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_barang' placeholder="Nama" value="<?php echo $record->nama_barang; ?>">
                            <?php echo form_error('nama_barang', '<span class="help-block">', '</span>') ?>
                            </div>
                            
                        </div>
                        <div class="form-group row <?php echo (form_error('tujuan')) ? ' has-error' : ''; ?>">
                            <label for="inputTujuan" class="col-sm-2 col-form-label">Tujuan</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name='tujuan' placeholder="PT. Indonesia Jaya" value="<?php echo $record->tujuan; ?>">
                            <?php echo form_error('tujuan', '<span class="help-block">', '</span>') ?>
                            </div>
                            
                        </div>
                        <div class="form-group row <?php echo (form_error('berat_barang_pm')) ? ' has-error' : ''; ?>">
                            <label for="inputBeratBarang" class="col-sm-2 col-form-label">Berat Barang</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name='berat_barang_pm' placeholder="50.2" value="<?php echo $record->berat_barang_pm; ?>">
                            <?php echo form_error('berat_barang_pm', '<span class="help-block">', '</span>') ?>
                            </div> 
                            <label >Kilogram (Kg)</label>
                            
                        </div>
                        <div class="form-group row <?php echo (form_error('nominal_pemasukan')) ? ' has-error' : ''; ?>">
                            <label for="inputNominalPM" class="col-sm-2 col-form-label">Nominal</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name='nominal_pemasukan' placeholder="10000" value="<?php echo $record->nominal_pemasukan; ?>">
                            <?php echo form_error('nominal_pemasukan', '<span class="help-block">', '</span>') ?>
                            </div>
                            <label >Rupiah (Rp. )</label>
                            
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <a href="<?php echo site_url('PemasukanController') ?>" class="btn btn-default float-right">Batal</a>
                    
                    </div>
                    <!-- /.card-footer -->
                    <?php echo form_close() ?>
                </form>
            
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
</body>

