<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Xərclərin idarəsi</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>add_payment_type">Ödəniş növü </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>add_currency">Valyuta</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>add_payment">Ödəniş et</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>payment_table">Ödənişlər Cədvəli</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class = "container mt-5">
  