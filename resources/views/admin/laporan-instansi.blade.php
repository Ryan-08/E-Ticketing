@extends('layout.dashboard')
@section('title') Admin | Leaderboard Laporan @endsection
@section('header-title') Dashboard @endsection
@section('konten')
<div class="container">
  <div class="container-list" style="padding-top: 0px;">
    <div class="card">
      <div class="card-body">
        <div class="header">
          <h5 class="card-title">Laporan instansi</h5>
          <div class="list-fitur">
            <form action="" autocomplete="off">
              <div class="form-input">
                <input type="text" name="search" id="search" placeholder="Cari..." value="{{request('search')}}" />
                <label for="search">
                  <span>
                    <i class="fas fa-search"></i>
                  </span>
                </label>
              </div>
            </form>
          </div>
        </div>
        <div class="table-list">
          <div class="table-content">
            <div class="list-tiket">
              <table style="width: 100%;">
                <tbody>
                  <tr>
                    <th class="table-header" style="width: 40px; padding-right: 10px;">No</th>
                    <th class="table-header" style="padding-right: 100px;">Nama Instansi</th>
                    <th class="table-header" style="padding-right: 150px;">Email</th>
                    <th class="table-header">Nomor Telepon</th>
                    <th class="table-header" style="padding-right: 0px;">Jumlah Lapran</th>
                  </tr>
                  @foreach ($data as $item)
                  <!-- tiket -->
                  <tr class="list">
                    <td class="tiket">
                      <div class="no">
                        <div class="detail-text">
                          <span class="text-atas">{{$counter++}}</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img width="40px" height="40px" style="border-radius: 50%;"
                          src="{{ Storage::url('images/'.$item->image_path) }}" alt="" />
                        <div class="detail-text">
                          <span class="text-atas">{{$item->name}}</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="email">
                        <div class="detail-text">
                          <span class="text-atas">{{$item->email}}</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="no-telepon">
                        <div class="detail-text">
                          <span class="text-atas">{{$item->contact}}</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="no-telepon">
                        <div class="detail-text">
                          <span class="text-atas">{{ $item->total_laporan }} Laporan</span>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <!-- end tiket -->
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="table-footer">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection