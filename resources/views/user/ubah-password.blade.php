@extends('/layout/dashboard') @section('title') Ubah Password
@endsection @section('header-title') Ubah Password @endsection
@section('konten')
<div class="container">
  <div class="form-container">
    <form action="">
      <div class="form-header">Ubah Password</div>
      <div class="form-body">
        <div class="form-list">
          <label for="password">Password Lama</label>
          <div class="form-input">
            <input
              type="text"
              name="password"
              id="password"
              placeholder="Masukkan password lama"
            />
          </div>
        </div>
        <div class="form-list">
          <label for="password">Password Baru</label>
          <div class="form-input">
            <input
              type="text"
              name="password"
              id="password"
              placeholder="Masukkan password baru"
            />
          </div>
        </div>
        <div class="form-list">
          <label for="password">Konfirmasi Password Baru</label>
          <div class="form-input">
            <input
              type="text"
              name="password"
              id="password"
              placeholder="Masukkan password baru"
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
