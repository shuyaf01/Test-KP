<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
    <link href="<?php echo base_url('assets/css/ /bootstrap.css')?>" rel="stylesheet">
</head>
<body>

    <br>
<!-- Keterangan User Login -->
<div class="container-fluid">
    <div class="jumbotron text-center">
        Selamat datang di Neo City Shop, <?php echo $this->session->userdata('username'); ?>. Happy Shopping :D
    <br><br><br> 
    <img src="<?php echo base_url('assets/image/jeff.jpg');?>">
    </div>
</div>
<!-- END User Login -->
</body>
</html>