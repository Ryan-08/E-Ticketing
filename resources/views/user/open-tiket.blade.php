@extends('layout.dashboard')
@section('title')Daftar Tiket @endsection
@section('header-title') Daftar Tiket @endsection
@section('konten')
<div class="container">
    <div class="container-list">
        <div class="card">
            <div class="form-container">
                <div class="form" style="width:100%;">
                    <div class="form-header" style="text-align: left;">Detail Tiket</div>
                    <div class="form-body">
                        <div class="form-list">
                            <label for="instansi">Nama Instansi</label>
                            <div class="form-box center">
                                <img width="40px" height="40px"
                                    src="{{ Storage::url('images/'.$data->user_profiles->image_path) }}" alt="avatar">
                                <div class="form-text">{{ $data->name }}</div>
                            </div>
                        </div>
                        <div class="inline-form">
                            <div class="form-list">
                                <label for="instansi">Nomor Tiket</label>
                                <div class="form-box center">
                                    <div class="form-text">
                                        <i class="fas fa-ticket-alt"></i>
                                        {{ $tiket->no_ticket }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-list">
                                <label for="instansi">Tanggal Pelaporan</label>
                                <div class="form-box center">
                                    <div class="form-text">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ $tiket->created_at->toDateString() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-list">
                            <label for="instansi">Judul Masalah</label>
                            <div class="form-box">
                                <div class="form-text">{{ $tiket->problem }}</div>
                            </div>
                        </div>
                        <div class="form-list">
                            <label for="instansi">Deskripsi Masalah</label>
                            <div class="form-box" style="height: 200px;">
                                <div class="form-text">{{ $tiket->description }}</div>
                            </div>
                        </div>
                        <div class="form-list">
                            <label for="instansi">Lampiran</label>
                            <div class="form-box" style="width: 200px;">
                                <!-- Trigger the Modal -->
                                <div id="myBtn" class="form-text">
                                    <i class="fas fa-paperclip" style="color: #9FA2B4;"></i>
                                    @if( $tiket->image_path )
                                    <img id="myImg" src="{{ Storage::url('lampiran/'.$tiket->image_path) }}"
                                        alt="image">
                                    <span class="text-less">{{ $tiket->image_path }}</span>
                                    @else
                                    <span class="text-less">no image</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sticky-chat')
<!-- The Modal -->
<div id="myModal" class="my-modal">

    <!-- The Close Button -->
    <span class="mybtn-close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img style="border-radius: 0%;" class="my-modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>
@push('custom-scripts')
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var btn = document.getElementById("myBtn");
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    btn.onclick = function () {
        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("mybtn-close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>
@endpush
@endsection