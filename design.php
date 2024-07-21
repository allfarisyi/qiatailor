<?php
include "proses/connect.php"; // Pastikan jalur ini benar

// Query untuk mendapatkan data desain
$query = mysqli_query($conn, "SELECT * FROM design");

// Query untuk mendapatkan kategori desain jika kategori ada dalam tabel desain
$select_kat_design = mysqli_query($conn, "SELECT DISTINCT nama AS id, nama AS kategori_design FROM design");

$result = [];
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Design 
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ModalTambahDesign">Tambah Design</button>
                </div>
            </div>
            <!-- Modal tambah design -->
            <div class="modal fade" id="ModalTambahDesign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Design</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_design.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadfoto" placeholder="Foto Design" name="foto" required>
                                            <label class="input-group-text" for="uploadfoto">Upload foto design</label>
                                            <div class="invalid-feedback">
                                                Masukkan file foto.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Design" name="nama" required>
                                            <label for="floatingInput">Nama Design</label>
                                            <div class="invalid-feedback">
                                                Masukkan nama design.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Deskripsi" name="deskripsi">
                                            <label for="floatingInput">Deskripsi</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required>
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukkan harga design.
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-dark" name="input_design_validate" value="12345">Simpan perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir Modal tambah design -->

            <?php
            foreach ($result as $row) {
            ?>
                <!-- Modal view -->
                <div class="modal fade" id="ModalView<?php echo $row['id_desain'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Design</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Nama Design" value="<?php echo htmlspecialchars($row['nama']) ?>">
                                                <label for="floatingInput">Nama Design</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Deskripsi Design" value="<?php echo htmlspecialchars($row['deskripsi']) ?>">
                                                <label for="floatingInput">Deskripsi Design</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input disabled type="number" class="form-control" id="floatingInput" placeholder="Harga" value="<?php echo htmlspecialchars($row['harga']) ?>">
                                                <label for="floatingInput">Harga</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating">
                                        <textarea disabled class="form-control" id="" style="height:100px"><?php echo htmlspecialchars($row['deskripsi']) ?></textarea>
                                        <label for="floatingInput">Deskripsi</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir Modal view -->

                <!-- Modal Edit -->
                <div class="modal fade" id="ModalEdit<?php echo $row['id_desain'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Design</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate action="proses/proses_edit_design.php" method="POST">
                                    <input type="hidden" value="<?php echo $row['id_desain'] ?>" name="id">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Nama Design" value="<?php echo htmlspecialchars($row['nama']) ?>" name="nama" required>
                                                <label for="floatingInput">Nama Design</label>
                                                <div class="invalid-feedback">
                                                    Masukkan nama design.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput" placeholder="Deskripsi Design" value="<?php echo htmlspecialchars($row['deskripsi']) ?>" name="deskripsi">
                                                <label for="floatingInput">Deskripsi Design</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" id="floatingInput" placeholder="Harga" value="<?php echo htmlspecialchars($row['harga']) ?>" name="harga" required>
                                                <label for="floatingInput">Harga</label>
                                                <div class="invalid-feedback">
                                                    Masukkan harga design.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-dark">Simpan perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir Modal Edit -->

                <?php
                }
                        
                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Gambar_Design</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                            $no = 1;
                            foreach($result as $row) {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $no++?></th>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['deskripsi'] ?></td>
                                <td><?php echo $row['harga'] ?></td>
                        
                                <td>
                                    <div style="width : 120px">
                                        <img src="upload/<?php echo $row['gambar_desain']?>" class="img-thumbnail" alt="...">
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            
            </div>
    </div>
</div>
