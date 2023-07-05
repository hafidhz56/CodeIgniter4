<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Film</title>

<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
    <div class="row">
        <div class="card">
            <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Semua Film</h1>
                </div>
                <div class="col-md-6 text-end">
                    <a href="/film/add" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            </div>
        </div>
    </div>

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
                        <a href="/film/update/<?= $data["id"]; ?>" class="btn btn-success">Update</a>
                        <a class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
</div>
     <script>sr="/assets/js/bootstrap.min.js"></script>
</body>  
<script>
    function confirmDelete() {
        swal({
                title: "Apakah Anda yakin?",
                text: "setelah dihapus! data anda akan benar-benar hilang!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    window.location.href = "/film/destroy/<?= $data['id'] ?>";

                } else {
                    swal("Data tidak jadi dihapus!");
                }
            });
    }
</script>
  <!-- sampai sini -->

</html
<?= $this->endSection() ?>