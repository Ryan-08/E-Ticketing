@extends('/layout/dashboard') @section('title') Admin | Tambah Pengguna
@endsection @section('header-title') Daftar Pengguna @endsection
@section('konten')
<div class="container">
  <div class="form-container">
    <form action="">
      <div class="form-header">Edit Pengguna</div>
      <div class="form-body">
        <div class="form-list">
          <label for="instansi">Nama Instansi</label>
          <div class="form-input">
            <input
              type="text"
              name="instansi"
              id="instansi"
              placeholder="Masukkan nama instansi"
            />
          </div>
        </div>
        <div class="form-list">
          <label for="email">Email</label>
          <div class="form-input">
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Masukkan email"
            />
          </div>
        </div>
        <div class="form-list">
          <label for="no_telepon">Nomor Telepon</label>
          <div class="form-input">
            <input
              type="text"
              name="no_telepon"
              id="no_telepon"
              placeholder="Masukkan nomor telepon"
            />
          </div>
        </div>
      </div>
      <div class="form-footer">
        <button class="form-btn btn-danger">Batal</button>
        <button class="form-btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection
