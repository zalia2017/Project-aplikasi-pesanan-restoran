<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MacDee Restaurant | <?= $judul; ?></title>
  <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo');?>logo-pb.png">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>user/css/bootstrap.css">
  <link href="<?= base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('assets/');?>datatable/datatables.css" rel="stylesheet" type="text/css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">


      <a class="navbar-brand" href="<?= base_url();?>">MacDee Restaurant</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="<?= base_url();?>">Beranda <span
              class="sr-only">(current)</span></a>
          <?php foreach($kategori as $kategori): ?>
            <a class="nav-item nav-link" href="<?= base_url('home/kategori/'.$kategori->id);?>"><?=$kategori->nama_kategori;?></a>
          <?php endforeach;?>
         <?php if($this->ModelPesanan->getTempWhere( ['id_session' => $this->session->userdata('my_session_id')])->num_rows()>0){ ?>
          <a class="nav-item nav-link" href="<?= base_url('home/pesanan');?>">Pesanan
            <b><?= $this->ModelPesanan->getTempWhere( ['id_session' => $this->session->userdata('my_session_id')])->num_rows();?></b>
            Item</a>
          <?php } ?>

        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">