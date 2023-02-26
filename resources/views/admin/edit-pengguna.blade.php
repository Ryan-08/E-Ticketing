@extends('layout.dashboard')
@section('title') Admin | Tambah Pengguna @endsection
@section('header-title') Daftar Pengguna @endsection
@section('konten')
<div class="container">
  <div class="form-container">
    <form action="{{ route('edit', $user->id) }}" method="POST" id="my-form" autocomplete="off">
      @csrf
      <div class="form-header">Edit Pengguna</div>
      <div class="form-body">
        <div class="form-list">
          <label for="instansi">Nama Instansi</label>
          <div class="form-input">
            <input type="text" name="instansi" id="instansi" placeholder="Masukkan nama instansi"
              value="{{ $user->name }}" />
          </div>
        </div>
        <div class="form-list">
          <label for="email">Email</label>
          <div class="form-input">
            <input type="email" name="email" id="email" placeholder="Masukkan email" value="{{ $user->email }}" />
          </div>
        </div>
        <div class="form-list">
          <label for="no_telepon">Nomor Telepon</label>
          <div class="form-input">
            @if($user->user_profiles)
            <input type="text" name="no_telepon" id="no_telepon" placeholder="Masukkan nomor telepon"
              value="{{ $user->user_profiles->contact }}" />
            @else
            <input type="text" name="no_telepon" id="no_telepon" placeholder="Masukkan nomor telepon" />
            @endif
          </div>
        </div>
      </div>
      <div class="form-footer">
        <button class="form-btn btn-danger">Batal</button>
        <button type="button" class="form-btn btn-success" data-bs-toggle="modal"
          data-bs-target="#exampleModal">Simpan</button>
      </div>
    </form>
  </div>
</div>
<!-- Modal -->
<!-- modal edit -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin mengubah data pengguna ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <button type="submit" id="submit-btn" class="btn btn-success">Saya yakin</a>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
@push('custom-scripts')
<script>
  $(function () {
    $('#submit-btn').on('click', function (e) {
      $('#my-form').submit();
    });
  });
</script>
@endpush
@endsection