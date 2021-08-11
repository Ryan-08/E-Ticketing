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
            <form action="{{ route('cari') }}">
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
                  <!-- tiket -->
                  <tr class="list">
                    <td class="tiket">
                      <div class="no">
                        <div class="detail-text">
                          <span class="text-atas">1</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img src="/images/avatar-noname.svg" alt="" />
                        <div class="detail-text">
                          <span class="text-atas">nama Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum
                            tempore reprehenderit cumque, inventore dolorum consequatur delectus praesentium ab ducimus
                            molestias voluptates, officia, quam unde amet nulla aut numquam aperiam. Eaque.</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="email">
                        <div class="detail-text">
                          <span class="text-atas">email Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus
                            earum, obcaecati laudantium dignissimos mollitia hic quasi corrupti autem aut voluptatem
                            ipsum, nesciunt provident repellendus? Vel eos dolorum ut itaque vero!</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="no-telepon">
                        <div class="detail-text">
                          <span class="text-atas">kontak Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi
                            voluptatibus officia est. Voluptatem, assumenda at iure nulla, temporibus aliquid, provident
                            labore excepturi itaque cumque voluptatum nam cupiditate recusandae sequi quod.</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="no-telepon">
                        <div class="detail-text">
                          <span class="text-atas">10000000 Laporan</span>
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
        <div class="table-footer">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection