@extends('layout.dashboard')
@section('title') Admin | Daftar Tiket @endsection
@section('header-title') Daftar Tiket @endsection
@section('konten')
<div class="container" id="container">
  <div class="button-sticky">
    <a href="{{ route('cetak-semua') }}" class="btn-primary">
      <span><i class="fas fa-print"></i></span>
      Cetak Laporan
    </a>
  </div>
  <div class="container-list">
    <div class="card">
      <div class="card-body">
        <div class="header">
          <h5 class="card-title">Semua Tiket</h5>
          <div class="list-fitur">
            <form action="{{ route('cari-tiket') }}" autocomplete="off">
              @csrf
              <div class="form-input">
                <input type="search" name="search" id="search" placeholder="Cari..." value="{{request('search')}}" />
                <label for=" search">
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
                  @foreach($data as $pengguna)
                  @foreach($tiket as $ticket)
                  @if($ticket->user_id == $pengguna->id)
                  <!-- tiket -->
                  <tr class="list" data-url="{{ route('detail', $ticket->no_ticket) }}">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img width="40px" height="40px" style="border-radius: 50%;"
                          src="{{ Storage::url('images/'.$pengguna->user_profiles->image_path) }}" alt="" />
                        <div class="detail-text">
                          <span class="text-atas">{{ $ticket->problem}}</span>
                          <span class="text-bawah">Nomor Tiket: {{$ticket->no_ticket}}</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="nama-instansi">
                        <div class="detail-text">
                          <span class="text-atas">{{ $pengguna->name}}</span>
                          <span class="text-bawah">on {{$ticket->created_at->toDateString()}}</span>
                        </div>
                      </div>
                    </td>
                    @foreach($status_ticket as $status)
                    @if($status->id == $ticket->ticket_status_id)
                    <td class="tiket">
                      <div class="tanggal-selesai">
                        @if($status->id == 3)
                        <div class="detail-text">
                          <span class="text-atas">{{$ticket->updated_at->toDateString()}}</span>
                          <span class="text-bawah">{{$ticket->updated_at->format('h:i A')}}</span>
                        </div>
                        @else
                        <div class="detail-text">
                          <span class="text-atas">Sedang Diproses</span>
                          <span class="text-bawah">-</span>
                        </div>
                        @endif
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="status-tiket">
                        <div class="status {{$status->t_status}}">{{strtoupper($status->t_status)}}</div>
                      </div>
                    </td>
                    @endif
                    @endforeach
                  </tr>
                  <!-- end tiket -->
                  @endif
                  @endforeach
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="table-footer">

        </div>
        {{ $tiket->links() }}
      </div>
    </div>
  </div>
  @push('custom-scripts')
  <script>
    $(".list").click(function () {
      window.location = $(this).data("url");
    });
  </script>
  @endpush
  @endsection