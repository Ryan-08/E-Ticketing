var loadFile = function (event) {
    var image = document.getElementById('photo-profil');
    image.src = URL.createObjectURL(event.target.files[0]);
}

var uploadFile = function (event) {
    var image = document.getElementById('upload');
    var up1 = document.getElementById('upload-1');
    var up2 = document.getElementById('upload-2');
    var gambar = document.getElementById('myImg');
    gambar.src = URL.createObjectURL(event.target.files[0]);

    up1.style.display = 'none';
    up2.style.display = 'block';
    image.innerHTML = event.target.files[0].name;

}

$("#show-password").click(function (event) {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
    $(this).find($(".fas")).toggleClass("fa-eye").toggleClass("fa-eye-slash");
  } else {
    $(this).find($(".fas")).toggleClass("fa-eye").toggleClass("fa-eye-slash");
    x.type = "password";

  }
});

$("#generate").click(function (event) {
  var randomstring = Math.random().toString(36).slice(-8);
  $("#password").val(randomstring);
});
