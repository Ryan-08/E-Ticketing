@extends('/layout/dashboard') @section('title') Admin | Dashboard @endsection
@section('header-title') Dashboard @endsection @section('konten')
<div class="container">
  <!-- card jumlah tiket -->
  <div class="row">
    <div class="col">
      <div
        class="card"
        style="color: var(--open-color); border-color: var(--open-color);"
      >
        <div class="card-body">
          <h5 class="card-title text-center">Open</h5>
          <h1 class="card-open text-center">20</h1>
        </div>
      </div>
    </div>
    <div class="col">
      <div
        class="card"
        style="color: var(--pending-color); border-color: var(--pending-color);"
      >
        <div class="card-body">
          <h5 class="card-title text-center">Pending</h5>
          <h1 class="card-pending text-center">5</h1>
        </div>
      </div>
    </div>
    <div class="col">
      <div
        class="card"
        style="color: var(--close-color); border-color: var(--close-color);"
      >
        <div class="card-body">
          <h5 class="card-title text-center">Close</h5>
          <h1 class="card-close text-center">10</h1>
        </div>
      </div>
    </div>
    <div class="col">
      <div
        class="card"
        style="color: var(--black-color); border-color: var(--black-color);"
      >
        <div class="card-body">
          <h5 class="card-title text-center">Total</h5>
          <h1 class="card-total text-center">35</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- end of card jumlah ticket -->
  <div class="container-dashboard">
    <div class="aktivitas-terkini">
      <div class="card">
        <div class="card-body">
          <h5 class="card-header">Aktivitas Terkini</h5>
          <div class="list-aktivitas">
            <!-- acticity -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Send benefit review by Sunday
                </h5>
                <div class="card-detail">
                  <div class="tanggal">Tanggal:</div>
                  <div class="date">23 Desember, 2018</div>
                </div>
                <div class="card-info">
                  <div class="card-avatar">
                    <img
                      src="{{asset ('images/logo-profile.svg')}}"
                      alt="logo"
                    />
                  </div>
                  <span class="card-avatar-name">Dinas Kominfo</span>
                  <div class="card-status">
                    CLOSE
                  </div>
                </div>
              </div>
            </div>
            <!-- endactivity -->
            <!-- acticity -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Send benefit review by Sunday
                </h5>
                <div class="card-detail">
                  <div class="tanggal">Tanggal:</div>
                  <div class="date">23 Desember, 2018</div>
                </div>
                <div class="card-info">
                  <div class="card-avatar">
                    <img
                      src="{{asset ('images/logo-profile.svg')}}"
                      alt="logo"
                    />
                  </div>
                  <span class="card-avatar-name">Dinas Kominfo</span>
                  <div class="card-status">
                    CLOSE
                  </div>
                </div>
              </div>
            </div>
            <!-- endactivity -->
            <!-- acticity -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Send benefit review by Sunday
                </h5>
                <div class="card-detail">
                  <div class="tanggal">Tanggal:</div>
                  <div class="date">23 Desember, 2018</div>
                </div>
                <div class="card-info">
                  <div class="card-avatar">
                    <img
                      src="{{asset ('images/logo-profile.svg')}}"
                      alt="logo"
                    />
                  </div>
                  <span class="card-avatar-name">Dinas Kominfo</span>
                  <div class="card-status">
                    CLOSE
                  </div>
                </div>
              </div>
            </div>
            <!-- endactivity -->
            <!-- acticity -->
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  Send benefit review by Sunday
                </h5>
                <div class="card-detail">
                  <div class="tanggal">Tanggal:</div>
                  <div class="date">23 Desember, 2018</div>
                </div>
                <div class="card-info">
                  <div class="card-avatar">
                    <img
                      src="{{asset ('images/logo-profile.svg')}}"
                      alt="logo"
                    />
                  </div>
                  <span class="card-avatar-name">Dinas Kominfo</span>
                  <div class="card-status">
                    CLOSE
                  </div>
                </div>
              </div>
            </div>
            <!-- endactivity -->
          </div>
          <button
            style="
              border: none;
              outline: none;
              padding: 0px;
              padding-bottom: 20px;
              text-align: center;
              width: 100%;
              background-color: white;
              color: var(--blue-color);
              font-family: 'Poppins';
              font-size: 13px;
              font-weight: 600;
            "
          >
            Lihat Selengkapnya
          </button>
        </div>
      </div>
    </div>
    <div class="laporan">
      <div class="total-laporan" style="margin-bottom: 30px;">
        <div class="card">
          <div class="card-body">
            <div class="category">
              <h5 class="card-header">Total Laporan</h5>
              <div class="button-category">
                <button>
                  Show:
                  <span class="show-category active">Hari</span>
                  <span><i class="fas fa-caret-down"></i></span>
                </button>
                <div
                  class="dropdown-graph-category"
                  style="
                    flex-direction: column;
                    overflow: hidden;
                    position: absolute;
                    background-color: whitesmoke;
                    right: 0;
                  "
                >
                  <span class="show-category">Hari</span>
                  <span class="show-category">Minggu</span>
                  <span class="show-category">Bulan</span>
                  <span class="show-category">Tahun</span>
                </div>
              </div>
            </div>
            <div class="graph" style="height: 310px;">Grafik laporan</div>
          </div>
        </div>
      </div>
      <div class="instansi">
        <div class="card">
          <div class="card-body">
            <div class="category">
              <h5 class="card-header">Laporan Instansi</h5>
              <button
                class="text-detail"
                style="
                  color: var(--blue-color);
                  font-weight: 600;
                  font-size: 14px;
                  cursor: pointer;
                "
              >
                Lihat detail
              </button>
            </div>
            <div class="list-instansi">
              <div class="card-instansi">
                <p class="card-header">Laporan Instansi</p>
                <span class="total-laporan-instansi">4328</span>
              </div>
              <div class="card-instansi">
                <p class="card-header">Laporan Instansi</p>
                <span class="total-laporan-instansi">328</span>
              </div>
              <div class="card-instansi">
                <p class="card-header">Laporan Instansi</p>
                <span class="total-laporan-instansi">28</span>
              </div>
              <div class="card-instansi">
                <p class="card-header">Laporan Instansi</p>
                <span class="total-laporan-instansi">8</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    $(".button-category").click(function () {
      // remove classes from all
      $(".dropdown-graph-category").toggle("show");
    });
  });
</script>
@endsection
