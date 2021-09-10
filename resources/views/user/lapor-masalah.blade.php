@extends('layout.dashboard')
@section('title') E-Ticketing | Lapor Masalah @endsection
@section('header-title') Lapor Masalah @endsection
@section('konten')
<div class="container">
  <div class="form-container">
    <form class="tabel" autocomplete="off" method="POST" action="{{ route('post-laporan') }}"
      enctype="multipart/form-data">
      @csrf
      <div class="header-tabel">Lapor Masalah</div>
      <div class="form-body">
        <div class="form-list">
          <label for="judul">Judul Masalah</label>
          <input class="input-1" type="text" name="judul" id="judul" placeholder="Masukkan judul masalah" />
        </div>
        <div class="form-list">
          <label for="deskripsi">Deskripsi Masalah</label>
          <textarea name="deskripsi" id="deskripsi" cols="70" placeholder="Masukkan deskripsi masalah"></textarea>
        </div>
        <div id="upload-1" class="form-list">
          <label for="lampiran">Lampiran</label>
          <div class="input-3">
            <div class="upload-btn-wrapper">
              <button class="btn mybtn">Upload a file
                <a>or drag and drop <br>PNG, JPG up to 10MB</a>
              </button>
              <input type="file" name="lampiran" id="file" accept="image/*" onchange="uploadFile(event)">
            </div>
          </div>
        </div>

        <div id="upload-2" class="form-list">
          <label for="lampiran">Lampiran</label>
          <div class="lampiran input-1">
            <i class="fas fa-paperclip"></i>
            <span id="upload" style="border:none; width:100%; display: flex; align-items: center;"></span>
            <img id="myImg" src="" alt="logo" style="display:none" />
            <button id="buttonClear" type="button" class="btn" onclick="clear()">Hapus</button>
          </div>
        </div>

      </div>

      <div class="form-footer-tabel">
        <button class="form-btn btn-danger">Batal</button>
        <button type="submit" class="form-btn btn-success" name="simpan">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="btn-close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
@push('custom-scripts')
<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var btn = document.getElementById("upload");
  var img = document.getElementById("myImg");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  btn.onclick = function () {
    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("btn-close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  }
  // hapus gambar yang sudah diupload
  $("#buttonClear").on('click', function () {
    var image = document.getElementById('upload');
    var up1 = document.getElementById('upload-1');
    var up2 = document.getElementById('upload-2');
    var gambar = document.getElementById('myImg');
    document.getElementById('file').value = "";
    gambar.src = "";
    up1.style.display = 'block';
    up2.style.display = 'none';
    image.innerHTML = "";
  });
</script>
@endpush
@endsection