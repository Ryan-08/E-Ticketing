@extends('/layout/dashboard') @section('title') Admin | Daftar Pengguna
@endsection @section('header-title') Daftar Pengguna @endsection
@section('konten')
<div class="container" id="container">
  <div class="container-list" style="padding-top: 0px;">
    <div class="card">
      <div class="card-body">
        <div class="header">
          <h5 class="card-title">Semua Tiket</h5>
          <div class="list-fitur">
            <form action="">
              <div class="form-input">
                <input
                  type="search"
                  name="Search-tiket"
                  id="search"
                  placeholder="Cari..."
                />
                <label for="search">
                  <span>
                    <i class="fas fa-search"></i>
                  </span>
                </label>
              </div>
            </form>
            <a href="/admin/daftar-pengguna/tambah" class="btn-primary">
              <span><i class="fas fa-user-plus"></i></span>
              Tambah Pengguna
            </a>
          </div>
        </div>
        <div class="table-list">
          <div class="table-content">
            <div class="list-tiket">
              <table style="width: 100%;">
                <tbody>
                  <tr>
                    <th class="table-header">Nama Instansi</th>
                    <th class="table-header">Email</th>
                    <th class="table-header">Nomor Telepon</th>
                    <th class="table-header">Aksi</th>
                  </tr>
                  <!-- tiket -->
                  <tr class="list">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="email">
                        <div class="detail-text">
                          <span class="text-atas">dinkes@gmail.com</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="no-telepon">
                        <div class="detail-text">
                          <span class="text-atas">0822 1234 5678</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="aksi">
                        <a
                          href="/admin/daftar-pengguna/edit"
                          class="edit btn btn-success"
                        >
                          <span><i class="fas fa-edit"></i></span>
                          Edit
                        </a>
                        <a href="" class="hapus btn btn-danger">
                          <span><i class="fas fa-trash"></i></span>
                          Hapus
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                  <!-- tiket -->
                  <tr class="list">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="email">
                        <div class="detail-text">
                          <span class="text-atas">dinkes@gmail.com</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="no-telepon">
                        <div class="detail-text">
                          <span class="text-atas">0822 1234 5678</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="aksi">
                        <a href="" class="edit btn btn-success">
                          <span><i class="fas fa-edit"></i></span>
                          Edit
                        </a>
                        <a href="" class="hapus btn btn-danger">
                          <span><i class="fas fa-trash"></i></span>
                          Hapus
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                  <!-- tiket -->
                  <tr class="list">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="email">
                        <div class="detail-text">
                          <span class="text-atas">dinkes@gmail.com</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="no-telepon">
                        <div class="detail-text">
                          <span class="text-atas">0822 1234 5678</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="aksi">
                        <a href="" class="edit btn btn-success">
                          <span><i class="fas fa-edit"></i></span>
                          Edit
                        </a>
                        <a href="" class="hapus btn btn-danger">
                          <span><i class="fas fa-trash"></i></span>
                          Hapus
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                  <!-- tiket -->
                  <tr class="list">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="email">
                        <div class="detail-text">
                          <span class="text-atas">dinkes@gmail.com</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="no-telepon">
                        <div class="detail-text">
                          <span class="text-atas">0822 1234 5678</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="aksi">
                        <a href="" class="edit btn btn-success">
                          <span><i class="fas fa-edit"></i></span>
                          Edit
                        </a>
                        <a href="" class="hapus btn btn-danger">
                          <span><i class="fas fa-trash"></i></span>
                          Hapus
                        </a>
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
