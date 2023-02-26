@extends('layout.dashboard')
@section('title') Admin | Tambah Pengguna @endsection
@section('header-title') Daftar Pengguna @endsection
@section('konten')
<div class="container">
  <div class="form-container">
    <form action="{{ Route('tambah') }}" method="POST" autocomplete="off">
      @csrf
      <div class="form-header">Tambah Pengguna</div>
      <div class="form-body">
        <div class="form-list">
          <label for="instansi">Nama Instansi</label>
          <div class="form-input">
            <input type="text" name="instansi" id="instansi" placeholder="Masukkan nama instansi" />
          </div>
        </div>
        <div class="form-list">
          <label for="email">Email</label>
          <div class="form-input">
            <input type="email" name="email" id="email" placeholder="Masukkan email" />
          </div>
        </div>
        <div class="form-list">
          <label for="no_telepon">Nomor Telepon</label>
          <div class="form-input">
            <input type="text" name="no_telepon" id="no_telepon" placeholder="Masukkan nomor telepon" />
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
            <input type="text" name="password" id="password" placeholder="Masukkan password" />
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
@push('custom-scripts')
<script>
  var x, i, j, l, ll, selElmnt, a, b, c;
  /*look for any elements with the class "custom-select":*/
  x = document.getElementsByClassName("custom-select");
  l = x.length;
  for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
      /*for each option in the original select element,
      create a new DIV that will act as an option item:*/
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function (e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
  }
  function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
      if (elmnt == y[i]) {
        arrNo.push(i)
      } else {
        y[i].classList.remove("select-arrow-active");
      }
    }
    for (i = 0; i < xl; i++) {
      if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
      }
    }
  }
  /*if the user clicks anywhere outside the select box,
  then close all select boxes:*/
  document.addEventListener("click", closeAllSelect);
</script>
@endpush
@endsection