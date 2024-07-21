<div class="col-lg-9 mt-2">
  <div class="card">
    <div class="card-header">Order</div>
    <div class="card-body">
      <h5 class="card-title">Tentang Kami</h5>

      <div class="container mt-5">
        <h2>Form Pesanan</h2>
        <form action="proses_pesanan.php" method="post">
          <div class="form-group">
            <label for="pelanggan_id">ID Pelanggan</label>
            <input type="number" class="form-control" id="pelanggan_id" name="pelanggan_id" required>
          </div>
          <div class="form-group">
            <label for="tanggal_pesanan">Tanggal Pesanan</label>
            <input type="date" class="form-control" id="tanggal_pesanan" name="tanggal_pesanan" required>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
              <option value="pending">Pending</option>
              <option value="proses">Proses</option>
              <option value="selesai">Selesai</option>
            </select>
          </div>
          <div class="form-group">
            <label for="total_harga">Total Harga</label>
            <input type="number" step="0.01" class="form-control" id="total_harga" name="total_harga" required>
          </div>
          <button type="submit" class="btn btn-primary">
            Submit
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
  .award-list {
    list-style-type: none;
    padding: 0;
  }

  .award-list li {
    margin-bottom: 15px;
  }

  .award-img {
    display: block;
    width: 100px;
    /* Atur lebar gambar */
    height: 100px;
    /* Atur tinggi gambar */
    object-fit: cover;
    /* Memastikan gambar sesuai dalam kotak */
    margin-top: 5px;
  }
</style>