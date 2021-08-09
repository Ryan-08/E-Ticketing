@extends('layout.dashboard') 
@section('title') Admin | Tambah Pengguna @endsection 
@section('header-title') Daftar Pengguna @endsection
@section('konten')
<div class="container">
  <div class="form-container">
    <form action="{{ Route('tambah') }}" method="POST" >
      @csrf
      <div class="form-header">Tambah Pengguna</div>
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
        <div class="form-list">
          <label for="list-role">Jenis Akun</label>
          <div class="custom-select">
            <select name="role">
              <option value="0">--- Pilih ---</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>              
            </select>
          </div>
        </div>
        <div class="form-list">
          <label for="no_telepon">Password</label>
          <div class="form-input">
            <input
              type="text"
              name="password"
              id="password"
              placeholder="Masukkan password"
            />
          </div>
          <button type="button" class="generate" id="generate">
            Click to random password
          </button>
        </div>
      </div>
      <div class="form-footer">
        <button class="form-btn btn-danger">Batal</button>
        <button type="submit" class="form-btn btn-success">Tambah</button>
      </div>
    </form>
  </div>
</div>
@endsection
