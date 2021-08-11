@extends('/layout/dashboard') @section('title') Data Diri
@endsection @section('header-title') Data Diri @endsection
@section('konten')
<div class="container">
  <div class="form-container">
    <form action="">
        <div class="form-header">Data Diri</div>
        <div class="form-body">
          <div class="profil">
              <div class="photo">
                <img id="photo-profil" src="{{asset('images/logo-profile.svg')}}"  alt="logo" style="border-radius:50%;"/>
              </div>
                <input type="file" id="file" accept="image/*" onchange="loadFile(event)" style="display:none">
                  <label class="btn-primary text-center" for="file" style="cursor:pointer">  
                    <span><i class="fas fa-camera"></i></span>
                      Ganti Profil
                  </label>
                </input>
        </div>


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

        <div class="text">
            <a>Data diri hanya bisa diubah oleh admin, silahkan menghubungi
            admin untuk pengajuan perubahan data diri instansi anda
            </a>
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
var span = document.getElementsByClassName("btn-close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}
</script>




@endsection
