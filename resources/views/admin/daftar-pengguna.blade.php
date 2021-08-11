@extends('layout.dashboard')
@section('title') Admin | Daftar Pengguna @endsection
@section('header-title') Daftar Pengguna @endsection
@section('konten')

<div class="container" id="container">
  <div class="container-list" style="padding-top: 0px;">
    @if(session()->has('message'))
    <div class="alert alert-success">
      {{ session()->get('message') }}
    </div>
    @endif
    <div class="card">
      <div class="card-body">
        <div class="header">
          <h5 class="card-title">Semua Pengguna</h5>
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
            <a href="{{ route('tambah-pengguna') }}" class="btn-primary">
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
                  @foreach($user as $data)
                  <!-- tiket -->
                  <tr class="list">
                    <td class="tiket">
                      <div class="detail-tiket">
                        <img src="{{ $data->user_profiles->image_path }}" alt="" />
                        <div class="detail-text">
                          <span class="text-atas">{{ $data->name }}</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="email">
                        <div class="detail-text">
                          <span class="text-atas">{{ $data->email }}</span>
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="no-telepon">
                        <div class="detail-text">
                          @if($data->user_profiles)
                          <span class="text-atas">{{ $data->user_profiles->contact }}</span>
                          @endif
                        </div>
                      </div>
                    </td>
                    <td class="tiket">
                      <div class="aksi">
                        <a href="daftar-pengguna/edit/{{$data->id}}" class="edit btn btn-success">
                          <span><i class="fas fa-edit"></i></span>
                          Edit
                        </a>
                        <button type="button" class="hapus btn btn-danger" data-bs-toggle="modal"
                          data-bs-target="#exampleModal">
                          <span><i class="fas fa-trash"></i></span>
                          Hapus
                        </button>
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
        {{ $user->links() }}
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- modal hapus -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin menghapus data pengguna ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
        <a href="daftar-pengguna/hapus/{{$data->id}}" type="button" class="btn btn-success">Saya yakin</a>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
<script>
  window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
      $(this).remove();
    });
  }, 3000);
</script>
@endsection