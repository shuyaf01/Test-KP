<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>CREATE</B> 
            <small>PRODUCT BUNGA</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-header">

                    </div>
                    <?php echo form_open_multipart(base_url('index.php/admin/products/create')) ?>

                    <div class="box-body">
                        <?php $this->load->view('admin/products/form'); ?>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <?php echo form_close() ?>

                </div>

            </div>
        </div>
    </section>
</div>