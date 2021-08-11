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
    <div class="laporan" style="margin-right: 10px; padding-left: 0px">
    <div class="instansi" style="margin-bottom: 20px;">
        <div class="card">
          <div class="card-body">
            <div class="category">
              <h5 class="card-header">Cara Kerja E-Ticketing</E-Ticketing></h5>
            </div>
    
            <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides">
                <img src="{{asset('images/bgNomor.svg')}}" class="numbertext bg">
                <img src="{{asset('images/1.svg')}}" class="numbertext">
                <img src="{{asset('images/slide1.svg')}}" style="height: 290px; padding-left:70px; padding-top:20px;">
                <div class="cara">Masuk ke halaman lapor masalah, untuk pelaporan dan mendapatkan tiket</div>
            </div>

            <div class="mySlides">
                <img src="{{asset('images/bgNomor.svg')}}" class="numbertext bg">
                <img src="{{asset('images/2.svg')}}" class="numbertext">
                <img src="{{asset('images/slide-2.svg')}}" style="height: 290px; padding-left:70px; padding-top:20px;">
                <div class="cara">Isi form pengaduan beserta lampirkan foto sebagai dokumen pendukung</div>
            </div>

            <div class="mySlides">
                <img src="{{asset('images/bgNomor.svg')}}" class="numbertext bg">
                <img src="{{asset('images/3.svg')}}" class="numbertext">
                <img src="{{asset('images/slide-3.svg')}}" style="height: 290px; padding-left:70px; padding-top:20px;">
                <div class="cara">Chat admin menggunakan fitur live chat, untuk menyelesaikan masalah</div>
            </div>

            <div class="mySlides">
                <img src="{{asset('images/bgNomor.svg')}}" class="numbertext bg">
                <img src="{{asset('images/4.svg')}}" class="numbertext">
                <img src="{{asset('images/slide-4.svg')}}" style="height: 290px; padding-left:70px; padding-top:20px;">
                <div class="cara">Cek notifikasi untuk menhkonfirmasi masalah yang telah diselesikan</div>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">
                <img src="{{asset('images/left.svg')}}">
            </a>
            <a class="next" onclick="plusSlides(1)">
                <img src="{{asset('images/right.svg')}}">
            </a>
        </div>
        <br>
            <!-- The dots/circles -->
            <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            </div>
          </div>
        </div>
      </div>

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
                            <div class="dropdown-graph-category" style="
                                flex-direction: column;
                                overflow: hidden;
                                position: absolute;
                                background-color: whitesmoke;
                                right: 0;
                            ">
                                <span class="show-category">Hari</span>
                                <span class="show-category">Minggu</span>
                                <span class="show-category">Bulan</span>
                                <span class="show-category">Tahun</span>
                            </div>
                        </div>
                    </div>
                    <div id="chart" class="graph" style="height: 270px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="aktivitas-terkini">
      <div class="card">
        <div class="card-body">
          <h5 class="card-header">Aktivitas Terkini</h5>
          <div class="list-aktivitas">
            <!-- acticity -->
            <div class="card recent-activities" data-url="#">
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
                    <img src="{{asset ('images/logo-profile.svg')}}" alt="logo" />
                  </div>
                  <span class="card-avatar-name">Dinas Kominfo</span>
                  <div class="card-status">
                    <div class="status-tiket">
                      <div class="status open">
                        OPEN
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- endactivity -->
            <!-- acticity -->
            <div class="card recent-activities" data-url="#">
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
                    <img src="{{asset ('images/logo-profile.svg')}}" alt="logo" />
                  </div>
                  <span class="card-avatar-name">Dinas Kominfo</span>
                  <div class="card-status">
                    <div class="status-tiket">
                      <div class="status open">
                        OPEN
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- endactivity -->
            <!-- acticity -->
            <div class="card recent-activities" data-url="#">
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
                    <img src="{{asset ('images/logo-profile.svg')}}" alt="logo" />
                  </div>
                  <span class="card-avatar-name">Dinas Kominfo</span>
                  <div class="card-status">
                    <div class="status-tiket">
                      <div class="status open">
                        OPEN
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- endactivity -->
            <!-- acticity -->
            <div class="card recent-activities" data-url="#">
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
                    <img src="{{asset ('images/logo-profile.svg')}}" alt="logo" />
                  </div>
                  <span class="card-avatar-name">Dinas Kominfo</span>
                  <div class="card-status">
                    <div class="status-tiket">
                      <div class="status open">
                        OPEN
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- endactivity -->
            <div id="see-more">
              <!-- acticity -->
              <div class="card recent-activities" data-url="#">
                <div class=" card-body">
                  <h5 class="card-title">
                    Send benefit review by Sunday
                  </h5>
                  <div class="card-detail">
                    <div class="tanggal">Tanggal:</div>
                    <div class="date">23 Desember, 2018</div>
                  </div>
                  <div class="card-info">
                    <div class="card-avatar">
                      <img src="{{asset ('images/logo-profile.svg')}}" alt="logo" />
                    </div>
                    <span class="card-avatar-name">Dinas Kominfo</span>
                    <div class="card-status">
                      <div class="status-tiket">
                        <div class="status open">
                          OPEN
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- endactivity -->
              <!-- acticity -->
              <div class="card recent-activities" data-url="#">
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
                      <img src="{{asset ('images/logo-profile.svg')}}" alt="logo" />
                    </div>
                    <span class="card-avatar-name">Dinas Kominfo</span>
                    <div class="card-status">
                      <div class="status-tiket">
                        <div class="status open">
                          OPEN
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- endactivity -->
              <!-- acticity -->
              <div class="card recent-activities" data-url="#">
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
                      <img src="{{asset ('images/logo-profile.svg')}}" alt="logo" />
                    </div>
                    <span class="card-avatar-name">Dinas Kominfo</span>
                    <div class="card-status">
                      <div class="status-tiket">
                        <div class="status open">
                          OPEN
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- endactivity -->
              <!-- acticity -->
              <div class="card recent-activities" data-url="#">
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
                      <img src="{{asset ('images/logo-profile.svg')}}" alt="logo" />
                    </div>
                    <span class="card-avatar-name">Dinas Kominfo</span>
                    <div class="card-status">
                      <div class="status-tiket">
                        <div class="status open">
                          OPEN
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- endactivity -->
            </div>
          </div>
          <button id="btn-see-more">
            Lihat Selengkapnya
          </button>
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
  $('#btn-see-more').on('click', function () {
    if ($('#see-more').css('display') === 'none') {
      $('#see-more').show('slow');
      $(this).text('Perkecil')
    }
    else {
      $('#see-more').hide('slow');
      $(this).text('Lihat Selengkapnya')
    }
  });
</script>

@endsection
