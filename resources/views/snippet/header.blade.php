<div class="nav">
  <div class="nav-title">
    <h1>@yield('header-title')</h1>
  </div>
  <div class="nav-profil">
    <span id="bell">
      <i class="fas fa-bell"></i>
    </span>
    <div class="profil-desc">
      <div class="nama-dinas">
        @role('admin') Admin @else User @endrole
      </div>
      <div class="photo-dinas">
        <img src="{{asset ('images/logo-profile.svg')}}" alt="logo" />
      </div>
    </div>
  </div>
</div>

<style>
  #bell {
    cursor: pointer;
  }

  .notif {
    position: absolute;
    top: 45px;
    right: 155px;
    background-color: white;
    margin: 20px 20px;
    width: 380px;
    border-radius: 10px;
    overflow: hidden;
    display: block;
    box-shadow: 0px 33px 80px rgba(0, 0, 0, 0.07), 0px 4.13211px 10.0172px rgba(0, 0, 0, 0.035);
    font-family: 'Poppins';
    display: none;
    z-index: 1;
  }

  .notifikasi {
    max-height: 500px;
    overflow: auto;
  }

  .notifikasi .card-header {
    font-size: 19px;
    font-weight: 600;
  }

  .list-notif {
    padding: 10px 20px;
    border-bottom: 1px solid #EBEFF2;
    cursor: pointer;
  }

  .list-notif:hover {
    background-color: #EBEFF2;
  }

  .body-notif,
  .detail-notif,
  .extras-notif {
    display: flex;
  }

  .body-notif img {
    margin-right: 10px;
  }

  .detail-notif {
    flex-direction: column;
  }

  .judul-notif {
    font-size: 14px;
    font-weight: 500;
  }

  .desc-notif {
    font-size: 12px;
    font-weight: 300;
    text-align: justify;
    /* width: 280px;
      height: 80px; */
    overflow: hidden;
    /* white-space: normal; */
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    /* number of lines to show */
    -webkit-box-orient: vertical;
    margin-bottom: 20px;
  }

  .extras-notif {
    justify-content: space-between;
    align-items: center;
  }

  .extras-time {
    font-size: 12px;
    font-weight: 400;
    color: #0029FF;
  }

  .extras-from {
    font-size: 12px;
    font-weight: 500;
  }
</style>
<!-- notification -->
<div class="notif" id="notif">
  <div class="notifikasi">
    <h5 class="card-header">Notifikasi</h5>
    <!-- notif -->
    <div class="list-notif" data-url="{{ route('detail', 1) }}">
      <div class="body-notif">
        <img src="{{ asset('images/avatar-noname.svg')}}" alt="avatar">
        <div class="detail-notif">
          <div class="judul-notif">Contact email not linked</div>
          <div class="desc-notif">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente assumenda odit
            quibusdam iste pariatur, tempora dolores, enim maiores incidunt unde, hic similique atque est quisquam
            eos. Nesciunt aliquid eius expedita!</div>
          <div class="extras-notif">
            <div class="extras-time">1 menit lalu</div>
            <div class="extras-from">Dinas Kominfo</div>
          </div>
        </div>
      </div>
    </div>
    <!-- endof notif -->
    <!-- notif -->
    <div class="list-notif" data-url="{{ route('detail', 1) }}">
      <div class="body-notif">
        <img src="{{ asset('images/avatar-noname.svg')}}" alt="avatar">
        <div class="detail-notif">
          <div class="judul-notif">Contact email not linked</div>
          <div class="desc-notif">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente assumenda odit
            quibusdam iste pariatur, tempora dolores, enim maiores incidunt unde, hic similique atque est quisquam
            eos. Nesciunt aliquid eius expedita!</div>
          <div class="extras-notif">
            <div class="extras-time">1 menit lalu</div>
            <div class="extras-from">Dinas Kominfo</div>
          </div>
        </div>
      </div>
    </div>
    <!-- endof notif -->
    <!-- notif -->
    <div class="list-notif" data-url="{{ route('detail', 1) }}">
      <div class="body-notif">
        <img src="{{ asset('images/avatar-noname.svg')}}" alt="avatar">
        <div class="detail-notif">
          <div class="judul-notif">Contact email not linked</div>
          <div class="desc-notif">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente assumenda odit
            quibusdam iste pariatur, tempora dolores, enim maiores incidunt unde, hic similique atque est quisquam
            eos. Nesciunt aliquid eius expedita!</div>
          <div class="extras-notif">
            <div class="extras-time">1 menit lalu</div>
            <div class="extras-from">Dinas Kominfo</div>
          </div>
        </div>
      </div>
    </div>
    <!-- endof notif -->
  </div>
</div>