<div class="nav">
  <div class="nav-title">
    <h1>@yield('header-title')</h1>
  </div>
  <div class="nav-profil">
    @include('snippet.notifikasi')

    <div class="profil-desc">
      <div class="nama-dinas">
        {{$user->name}}
      </div>
      <div class="photo-dinas">
        <img style="border-radius: 50%;" src="{{ Storage::url('images/'.$user->user_profiles->image_path) }}"
          alt="logo" />
      </div>
    </div>
  </div>
</div>