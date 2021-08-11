@extends('/layout/dashboard') @section('title') Daftar Masalah @endsection
@section('header-title') Daftar Masalah @endsection @section('konten')
<div class="container" id="container">
  <div class="container-list">
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
            <button class="fitur">
              <span><i class="fas fa-sort-amount-up"></i></span>
              Sort
            </button>
            <button class="fitur">
              <span><i class="fas fa-filter"></i></span>
              Filter
            </button>
          </div>
        </div>
        <div class="table-list">
          <div class="table-content">
            <div class="list-tiket">
              <table style="width: 100%;">
                <tbody>
                  <tr>
                    <th class="table-header">Detail Tiket</th>
                    <th class="table-header">Nama Instansi</th>
                    <th class="table-header">Tanggal Selesai</th>
                    <th class="table-header">Status</th>
                  </tr>
                  <!-- tiket -->
                  <tr class="list" data-url="/user/close">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas"
                            >Contact Email not Linked</span
                          >
                          <span class="text-bawah">Nomor Tiket: 001-ABC</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="nama-instansi">
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                          <span class="text-bawah">on 24.05.2019</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="tanggal-selesai">
                        <div class="detail-text">
                          <span class="text-atas">26 Mei, 2019</span>
                          <span class="text-bawah">6:30 PM</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="status-tiket">
                        <div class="status close">CLOSE</div>    
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                  <!-- tiket -->
                  <tr class="list" data-url="/user/open-tiket">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas"
                            >Contact Email not Linked</span
                          >
                          <span class="text-bawah">Nomor Tiket: 001-ABC</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="nama-instansi">
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                          <span class="text-bawah">on 24.05.2019</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="tanggal-selesai">
                        <div class="detail-text">
                          <span class="text-atas">26 Mei, 2019</span>
                          <span class="text-bawah">6:30 PM</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="status-tiket">
                        <div class="status open">OPEN</div>
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                  
                  <!-- tiket -->
                  <tr class="list" data-url="/user/pending">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas"
                            >Contact Email not Linked</span
                          >
                          <span class="text-bawah">Nomor Tiket: 001-ABC</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="nama-instansi">
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                          <span class="text-bawah">on 24.05.2019</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="tanggal-selesai">
                        <div class="detail-text">
                          <span class="text-atas">26 Mei, 2019</span>
                          <span class="text-bawah">6:30 PM</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="status-tiket">
                        <div class="status pending">PENDING</div>
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                  <!-- tiket -->
                  <tr class="list" data-url="/home">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas"
                            >Contact Email not Linked</span
                          >
                          <span class="text-bawah">Nomor Tiket: 001-ABC</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="nama-instansi">
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                          <span class="text-bawah">on 24.05.2019</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="tanggal-selesai">
                        <div class="detail-text">
                          <span class="text-atas">26 Mei, 2019</span>
                          <span class="text-bawah">6:30 PM</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="status-tiket">
                        <div class="status pending">
                          PENDING
                        </div>
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                  <!-- tiket -->
                  <tr class="list" data-url="/home">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas">Contact Mail not Linked</span>
                          <span class="text-bawah">Nomor Tiket: 001-ABC</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="nama-instansi">
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                          <span class="text-bawah">on 24.05.2019</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="tanggal-selesai">
                        <div class="detail-text">
                          <span class="text-atas">26 Mei, 2019</span>
                          <span class="text-bawah">6:30 PM</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="status-tiket">
                        <div class="status close">
                          CLOSE
                        </div>
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                  <!-- tiket -->
                  <tr class="list" data-url="/home">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img
                          src="{{asset ('images/avatar-noname.svg')}}"
                          alt=""
                        />
                        <div class="detail-text">
                          <span class="text-atas"
                            >Contact Email not Linked</span
                          >
                          <span class="text-bawah">Nomor Tiket: 001-ABC</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="nama-instansi">
                        <div class="detail-text">
                          <span class="text-atas">Dinas Kesehatan</span>
                          <span class="text-bawah">on 24.05.2019</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="tanggal-selesai">
                        <div class="detail-text">
                          <span class="text-atas">26 Mei, 2019</span>
                          <span class="text-bawah">6:30 PM</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="status-tiket">
                        <div class="status open">
                          OPEN
                        </div>
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
<script>
  $(".list").click(function () {
    window.location = $(this).data("url");
  });
</script>
@endsection
