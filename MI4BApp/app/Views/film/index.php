<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Film</title>

<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand bg-#DDA0DD" style="background-color: #DDA0DD;">
  <div class="container-fluid">
  <img src="/assets/img/boruto.png" width="40" height="40" style="margin-right: 10px;">
    <a class="navbar-brand" href="#">LK_86</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/film">Semua Film</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/genre/all">Katagori Genre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">Tentang Kami</a>
        </li>
      </ul>
    </div>
  </div>
    </nav>

<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-mod-12">
            <table class="table table-hover">
                <tr>
                    <th>No.</th>
                    <th>Cover</th>
                    <th>Nama Film</th>
                    <th>Genre</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
                <?php $i = 1;?>
                <?php foreach ($data_film as $data) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><img width="50" src="assets/cover/<?= $data['cover']?>" alt=""></td>
                        <td><?= $data['nama_film']?></td>
                        <td><?= $data['nama_genre']?></td>
                        <td><?= $data['duration']?></td>
                        <td>
                            <a href="" class="btn btn-success">Update</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
</div>
     <script>sr="/assets/js/bootstrap.min.js"></script>
</body>  

</html
<?= $this->endSection() ?>