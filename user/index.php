<?php include "../connection.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Tabel Donatur Bencana</title>
</head>

<body>
    <?php
    $sql = ociparse($conn, "SELECT * FROM USER_DONASI ORDER BY ID_USER ASC");
    ociexecute($sql);
    $cols = oci_num_fields($sql);
    ?>
    <div class="container pt-5">
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Tambah</button>
        <a href="../" class="btn btn-danger mb-3">Kembali ke Beranda</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <?php for ($i = 1; $i <= $cols; $i++) : $col_name = oci_field_name($sql, $i); ?>
                            <th scope="col"><?php echo htmlentities($col_name, ENT_QUOTES) ?></th>
                        <?php endfor; ?>
                        <th scope="col" colspan="2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while (ocifetch($sql)) : ?>
                        <tr>
                            <th scope="row"><?= ociresult($sql, 'ID_USER'); ?></th>
                            <td><?= ociresult($sql, 'ID_LOKASI'); ?></td>
                            <td><?= ociresult($sql, 'NAMA'); ?></td>
                            <td><?= ociresult($sql, 'TELEPON'); ?></td>
                            <td><?= ociresult($sql, 'JUMLAH_DONASI'); ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editModal" data-user="<?= ociresult($sql, 'ID_USER'); ?>" data-id="<?= ociresult($sql, 'ID_LOKASI'); ?>" data-nama="<?= ociresult($sql, 'NAMA'); ?>" data-telepon="<?= ociresult($sql, 'TELEPON'); ?>" data-donasi="<?= ociresult($sql, 'JUMLAH_DONASI'); ?>">Edit</button>
                                <a href="delete.php?ID_USER=<?= ociresult($sql, 'ID_USER'); ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile;
                    oci_close($conn); ?>
                </tbody>
            </table>
        </div>

        <!-- Modal Insert -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah User Donasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="add.php" method="post">
                                <div class="mb-3">
                                    <label for="ID_LOKASI" class="form-label">Lokasi</label>
                                    <select class="form-select" aria-label="ID_LOKASI" name="ID_LOKASI">
                                        <?php
                                        $sql = ociparse(
                                            $conn,
                                            "SELECT ID_LOKASI, NAMA_BENCANA FROM LOKASI_BENCANA"
                                        );
                                        ociexecute($sql);
                                        while (ocifetch($sql)) :
                                        ?>
                                            <option value="<?= ociresult($sql, 'ID_LOKASI'); ?>"><?= ociresult($sql, 'NAMA_BENCANA'); ?></option>
                                        <?php
                                        endwhile;
                                        oci_close($conn);
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="NAMA" class="form-label">Nama Donatur</label>
                                    <input type="text" class="form-control" id="NAMA" name="NAMA" required>
                                </div>
                                <div class="mb-3">
                                    <label for="TELEPON" class="form-label">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="TELEPON" name="TELEPON" required>
                                </div>
                                <div class="mb-3">
                                    <label for="JUMLAH_DONASI" class="form-label">Jumlah Donasi</label>
                                    <input type="number" class="form-control" id="JUMLAH_DONASI" name="JUMLAH_DONASI" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Lokasi Bencana</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <div class="container">
                            <form action="edit.php" method="post">
                                <div class="mb-3">
                                    <label for="ID_USER" class="form-label">ID User</label>
                                    <input type="number" class="form-control" id="ID_USER" name="ID_USER" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="ID_LOKASI" class="form-label">Lokasi</label>
                                    <select class="form-select" aria-label="ID_LOKASI" name="ID_LOKASI">
                                        <?php
                                        $sql = ociparse(
                                            $conn,
                                            "SELECT ID_LOKASI, NAMA_BENCANA FROM LOKASI_BENCANA"
                                        );
                                        ociexecute($sql);
                                        while (ocifetch($sql)) :
                                        ?>
                                            <option value="<?= ociresult($sql, 'ID_LOKASI'); ?>"><?= ociresult($sql, 'NAMA_BENCANA'); ?></option>
                                        <?php
                                        endwhile;
                                        oci_close($conn);
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="NAMA" class="form-label">Nama Donatur</label>
                                    <input type="text" class="form-control" id="NAMA" name="NAMA" required>
                                </div>
                                <div class="mb-3">
                                    <label for="TELEPON" class="form-label">Jumlah Korban</label>
                                    <input type="number" class="form-control" id="TELEPON" name="TELEPON" required>
                                </div>
                                <div class="mb-3">
                                    <label for="JUMLAH_DONASI" class="form-label">Jumlah Donasi</label>
                                    <input type="number" class="form-control" id="JUMLAH_DONASI" name="JUMLAH_DONASI" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit', function() {
                let user = $(this).data("user");
                let id = $(this).data("id");
                let nama = $(this).data("nama");
                let telepon = $(this).data("telepon");
                let donasi = $(this).data("donasi")
                $("#modal-body").find('input[name="ID_USER"]').val(user);
                $("#modal-body").find('input[name="ID_LOKASI"]').val(id);
                $("#modal-body").find('input[name="NAMA"]').val(nama);
                $("#modal-body").find('input[name="TELEPON"]').val(telepon);
                $("#modal-body").find('input[name="JUMLAH_DONASI"]').val(donasi);
            });
        });
    </script>
</body>

</html>