@extends('layout.dashboard') @section('title') Data Diri
@endsection @section('header-title') Data Diri @endsection
@section('konten')
<div class="container">
  @if(session()->has('message'))
  <div class="alert alert-success">
    {{ session()->get('message') }}
  </div>
  @endif
  <div class="form-container">
    <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-header">Data Diri</div>
      <div class="form-body">
        <div class="profil">
          <div class="photo">
            <img id="photo-profil"
              src="{{ $user->user_profiles->image_path ? Storage::url('images/'.$user->user_profiles->image_path) : asset('images/avatar-noname.svg') }}"
              alt="logo" style="border-radius:50%;" />
          </div>
          <input type="file" id="file" name="avatar" accept="image/*" onchange="loadFile(event)" style="display:none">
          <label class="btn-primary text-center" for="file" style="cursor:pointer">
            <span><i class="fas fa-camera"></i></span>
            Ganti Profil
          </label>
          </input>
        </div>


        <div class="form-list">
          <label for="instansi">Nama Instansi</label>
          <div class="form-input">
            <span>{{ $user->name }}</span>
          </div>
        </div>
        <div class="form-list">
          <label for="email">Email</label>
          <div class="form-input">
            <span>{{ $user->email }}</span>
          </div>
        </div>
        <div class="form-list">
          <label for="no_telepon">Nomor Telepon</label>
          <div class="form-input">
            <span>{{ $user->user_profiles->contact }}</span>
          </div>
        </div>
      </div>

      <div class="text">
        <span>Data diri hanya bisa diubah oleh admin, silahkan menghubungi
          admin untuk pengajuan perubahan data diri instansi anda
        </span>
      </div>
      <div class="form-footer">
        <button type="reset" class="form-btn btn-danger">Batal</button>
        <button type="submit" class="form-btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- The Modal -->
<div id="myModal" class="my-modal">

  <!-- The Close Button -->
  <span class="mybtn-close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="my-modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
@push('custom-scripts')
<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById("photo-profil");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function () {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("mybtn-close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  }
</script>
@endpush




@endsection