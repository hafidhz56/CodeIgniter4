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
<div class="container">
    <div class="row">
        <div class="col-mod-12">
            <table class="table table-hover">
                <tr>
                    <th>No.</th>
                    <th>Nama genre</th>
                    <th>Action</th>
                </tr>
                <?php $i = 1;?>
                <?php foreach ($semuagenre as $genre) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                        <td><?= $genre['nama_genre']?></td>
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

</html>
<?= $this->endSection() ?>