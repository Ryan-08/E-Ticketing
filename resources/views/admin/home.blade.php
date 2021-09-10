@extends('layout.dashboard')
@section('title') Admin | Dashboard @endsection
@section('header-title') Dashboard @endsection
@section('konten')
<div class="container">
  <!-- card jumlah tiket -->
  <div class="row">
    @foreach ($jumlah as $key => $value)
    <div class="col">
      <div class="card"
        style="color: var(--{{$value->t_status}}-color); border-color: var(--{{$value->t_status}}-color);">
        <div class="card-body">
          <h5 class="card-title text-center">{{ucfirst(trans($value->t_status))}}</h5>
          @if ($value->jumlah_tiket != null)
          <h1 class="card-{{$value->t_status}} text-center">{{$value->jumlah_tiket}}</h1>
          @else
          <h1 class="card-{{$value->t_status}} text-center">0</h1>
          @endif
        </div>
      </div>
    </div>
    @endforeach
    <div class="col">
      <div class="card" style="color: var(--black-color); border-color: var(--black-color);">
        <div class="card-body">
          <h5 class="card-title text-center">Total</h5>
          <h1 class="card-total text-center">{{$tiket->count()}}</h1>
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
          @if ($activities->isNotEmpty())
          <div class="list-aktivitas">
            @foreach($activities as $key => $value)
              @foreach($tiket as $item)
                @if($value->title == $item->no_ticket)
                  @if($key <= 3) <!-- acticity -->
                    <div class="card recent-activities" data-url="{{ route('detail', $item->no_ticket) }}">
                      <div class="card-body">
                        <h5 class="card-title">
                          {{ $item->problem}}
                        </h5>
                        <div class="card-detail">
                          <div class="tanggal">Tanggal:</div>
                          <div class="date">{{ $item->created_at->toDateString()}}</div>
                        </div>
                        <div class="card-info">
                          <div class="card-avatar">
                            <img width="40px" height="40px" style="border-radius: 50%;"
                              src="{{ Storage::url('images/'.$item->user->user_profiles->image_path) }}" alt="logo" />
                          </div>
                          <span class="card-avatar-name">{{ $item->user->name }}</span>
                          @foreach($status_ticket as $status)
                          @if($status->id == $item->ticket_status_id)
                          <div class="card-status">
                            <div class="status-tiket">
                              <div class="status {{$status->t_status}}">{{strtoupper($status->t_status)}}</div>
                            </div>
                          </div>
                          @endif
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <!-- endactivity -->
                    @endif
                  @endif
                @endforeach
              @endforeach
              <div id="see-more">
                @foreach($activities as $key => $value)
                  @foreach($tiket as $item)
                    @if($value->title == $item->no_ticket)
                      @if($key > 3)
                <!-- acticity -->
                <div class="card recent-activities" data-url="{{ route('detail', $item->no_ticket) }}">
                  <div class="card-body">
                    <h5 class="card-title">
                      {{ $item->problem}}
                    </h5>
                    <div class="card-detail">
                      <div class="tanggal">Tanggal:</div>
                      <div class="date">{{ $item->created_at->toDateString()}}</div>
                    </div>
                    <div class="card-info">
                      <div class="card-avatar">
                        <img width="40px" height="40px" style="border-radius: 50%;"
                          src="{{ Storage::url('images/'.$item->user->user_profiles->image_path) }}" alt="logo" />
                      </div>
                      <span class="card-avatar-name">{{ $item->user->name }}</span>
                      @foreach($status_ticket as $status)
                      @if($status->id == $item->ticket_status_id)
                      <div class="card-status">
                        <div class="status-tiket">
                          <div class="status {{$status->t_status}}">{{strtoupper($status->t_status)}}</div>
                        </div>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>
                <!-- endactivity -->
                     @endif
                    @endif
                  @endforeach
                @endforeach
                @else
                <div class="list-aktivitas text-center">
                  Tidak ada aktivitas terkini                  
                </div>
                @endif
              </div>
              <button id="btn-see-more">
                Lihat Selengkapnya
              </button>
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
                    <span class="my-category">Hari</span>
                    <span><i class="fas fa-caret-down"></i></span>
                  </button>
                  <div class="dropdown-graph-category" style="                    
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
              <div id="chart" class="graph" style="height: 310px;"></div>
            </div>
          </div>
        </div>
        <div class="instansi">
          <div class="card" style="height: 345px">
            <div class="card-body">
              <div class="category">
                <h5 class="card-header">Laporan Instansi</h5>
                <a href="{{ route('laporan') }}" class="text-detail" style="
                  color: var(--blue-color);
                  font-weight: 600;
                  font-size: 14px;
                  cursor: pointer;
                ">
                  Lihat detail
                </a>
              </div>
              <div class="list-instansi">
                @foreach ($data as $item)
                <div class="card-instansi">
                  <p class="card-header">{{$item->name}}</p>
                  <span class="total-laporan-instansi">{{$item->total_laporan}}</span>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('custom-scripts')
  <!-- Charting library -->
  <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
  <!-- Chartisan -->
  <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
  <script>
    var urlGraph = 'hari';
    var userRoles = {!! json_encode($user->getRoleNames()) !!};    
    var userId = {!! json_encode($user->id) !!};
    $(function () {
      $(".button-category").click(function () {
        // remove classes from all
        $(".dropdown-graph-category").toggle("show");
        console.log(userRoles[0], urlGraph);
      });
      $(".show-category").click(function () {
        $(".show-category").removeClass("active");
        $(this).addClass('active');
        $(".my-category").text($(this).text());
        urlGraph = $('.my-category').text().toLowerCase();
        chart.update({
          url: "@chart('reports_chart')" + "?show=" + urlGraph + "&role=" + userRoles[0] + "&id=" + userId,
        });
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
    $(".recent-activities").click(function () {
      window.location = $(this).data("url");
    });    
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('reports_chart')" + "?show=" + urlGraph + "&role=" + userRoles[0] + "&id=" + userId,
      hooks: new ChartisanHooks()
        .datasets([{ type: 'line', fill: false }])
        .tooltip()
        .legend({ position: 'bottom' }),
    });
  </script>
  @endpush
  @endsection