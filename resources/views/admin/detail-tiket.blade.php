@extends('layout.dashboard')

@section('title') Admin | Daftar Tiket @endsection

@section('header-title') Daftar Tiket @endsection

@section('konten')
<div class="container">
    <!-- id mean status ticket -->
    @if( $id == 3)
    <div class="button-sticky">
        <a href="{{ route('cetak', $tiket->no_ticket) }}" class="btn-primary">
            <span><i class="fas fa-print"></i></span>
            Cetak Laporan
        </a>
    </div>
    <div class="form-container" style="padding-top: 60px;">
        @else
        <div class="form-container">
            @endif
            <div class="form" style="width:100%; margin-left:20px;">
                <div class="form-header" style="text-align: left;">Detail Tiket</div>
                <div class="form-body">
                    <div class="form-list">
                        <label for="instansi">Nama Instansi</label>
                        <div class="form-box center">
                            <img width="40px" height="40px" style="border-radius: 50%;"
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
                                <img id="myImg" src="{{ Storage::url('lampiran/'.$tiket->image_path) }}" alt="image">
                                <span class="text-less">{{ $tiket->image_path }}</span>
                                @else
                                <span class="text-less">no image</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if($id != 3)
                <div class="form-footer" style="justify-content: flex-end; margin-bottom: 80px;">
                    @if($id == 4)
                    <button type="button" class="form-btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Close</button>
                    @else
                    <a href="{{ route('daftar-tiket') }}" class="form-btn btn-danger text-center">Kembali</a>
                    <button type="button" class="form-btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Open</button>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- modal hapus -->
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    @if($id == 4)
                    <h5 class="modal-title" id="exampleModalLabel">Close Tiket</h5>
                    @else
                    <h5 class="modal-title" id="exampleModalLabel">Open Tiket</h5>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if($id == 4)
                <div class="modal-body">
                    Apakah anda ingin melakukan Close tiket?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="{{ route('close-ticket', $tiket->no_ticket) }}" type="button"
                        class="btn btn-success">Lanjutkan</a>
                </div>
                @else
                <div class="modal-body">
                    Apakah anda ingin melakukan Open tiket?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="{{ route('response', $tiket->no_ticket) }}" type="button"
                        class="btn btn-success">Lanjutkan</a>
                </div>
                @endif

            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- The Modal -->
    <div id="myModal" class="my-modal">

        <!-- The Close Button -->
        <span class="mybtn-close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="my-modal-content" id="img01">

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