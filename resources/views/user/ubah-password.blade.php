@extends('layout.dashboard') @section('title') Ubah Password
@endsection @section('header-title') Ubah Password @endsection
@section('konten')
<div class="container">
  <div class="form-container">
    <form action="{{ route ('update') }}" method="POST" autocomplete="off">
      @csrf
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{ $error }}
      </div>
      @endforeach
      @if(session()->has('message'))
      <div class="alert alert-success">
        {{ session()->get('message') }}
      </div>
      @endif
      <div class="form-header">Ubah Password</div>
      <div class="form-body">
        <div class="form-list">
          <label>Password Lama</label>
          <div class="form-input">
            <input type="text" name="passwordLama" placeholder="Masukkan password lama" />
          </div>
        </div>
        <div class="form-list">
          <label>Password Baru</label>
          <div class="form-input">
            <input type="text" name="passwordBaru" placeholder="Masukkan password baru" />
          </div>
        </div>
        <div class="form-list">
          <label>Konfirmasi Password Baru</label>
          <div class="form-input">
            <input type="text" name="passwordConfirm" placeholder="Masukkan password baru" />
          </div>
        </div>
      </div>
      <div class="form-footer">
        <button type="reset" class="form-btn btn-danger">Batal</button>
        <button type="submit" class="form-btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>
@push('custom-scripts')
<script>
  window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
      $(this).remove();
    });
  }, 3000);
</script>
@endpush
@endsection