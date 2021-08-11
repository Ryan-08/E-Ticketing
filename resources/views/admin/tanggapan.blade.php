@extends('layout.dashboard')

@section('title') Admin | Daftar Tiket @endsection

@section('header-title') Tanggapan @endsection

@section('konten')
<div class="container" style="display: flex; justify-content: space-between;">
    <div class="form-container"
        style="display: flex; flex-direction: column; margin-left:20px; justify-content: space-between;">
        <div class="form" style="width:100%; height: 580px;">
            <div class="form-header" style="text-align: left;">Form Pertanyaan</div>
            <div class="form-tambah">
                <input type="text" name="tambah" placeholder="Tambah Pertanyaan" id="tambah">
                <button id="addQ">
                    <span>
                        <i class="fas fa-plus"></i>
                    </span>
                </button>
            </div>
            <div class="form-body" id="formQ" style="padding: 0px;height: 430px; overflow-y: auto;">

                <div class="form-checklist">
                    <label class="container">Pertanyaan 1
                        <input type="checkbox" name="status_masalah">
                        <span class="checkmark check"></span>
                    </label>
                    <button class="delete_list">Hapus</button>
                </div>
                <div class="form-checklist">
                    <label class="container">Pertanyaan 2
                        <input type="checkbox" name="status_masalah">
                        <span class="checkmark check"></span>
                    </label>
                    <button class="delete_list">Hapus</button>
                </div>
            </div>
        </div>
        <form class="form" id="formTanggapan" style="width:100%;">
            <div class="form-header" style="text-align: left;">Tanggapan</div>
            <div class="form-body" style="padding: 0px;">
                <div class="form-checklist">
                    <label class="container">Selesai
                        <input type="radio" name="status_masalah" value="selesai">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="form-checklist">
                    <label class="container">Belum Selesai
                        <input type="radio" name="status_masalah" checked="checked" value="belum">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <div class="form-footer" style="justify-content: center;;">
                <button type="button" class="form-btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Tanggapi</button>
            </div>
        </form>
    </div>
    <div class="form-container">
        <div class="form" style="width:100%; margin-left:20px;">
            <div class="form-header" style="text-align: left;">Detail Tiket</div>
            <div class="form-body">
                <div class="form-list">
                    <label for="instansi">Nama Instansi</label>
                    <div class="form-box center">
                        <img src="{{ asset('images/avatar-noname.svg')}}" alt="avatar">
                        <div class="form-text">Dinas Kesehatan</div>
                    </div>
                </div>
                <div class="form-list">
                    <label for="instansi">Nomor Tiket</label>
                    <div class="form-box center">
                        <div class="form-text">
                            <i class="fas fa-ticket-alt"></i>
                            001-ABC
                        </div>
                    </div>
                </div>
                <div class="form-list">
                    <label for="instansi">Tanggal Pelaporan</label>
                    <div class="form-box center">
                        <div class="form-text">
                            <i class="far fa-calendar-alt"></i>
                            24 Mei 2020
                        </div>
                    </div>
                </div>
                <div class="form-list">
                    <label for="instansi">Judul Masalah</label>
                    <div class="form-box">
                        <div class="form-text">Contact email not linked</div>
                    </div>
                </div>
                <div class="form-list">
                    <label for="instansi">Deskripsi Masalah</label>
                    <div class="form-box" style="height: 200px;">
                        <div class="form-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate ut,
                            excepturi saepe tempore magni corrupti consequuntur accusantium corporis provident illum.
                            Consectetur, non. A repellendus nemo, consectetur nesciunt quos minus exercitationem.</div>
                    </div>
                </div>
                <div class="form-list">
                    <label for="instansi">Lampiran</label>
                    <div class="form-box" style="width: 200px;">
                        <!-- Trigger the Modal -->
                        <div id="myBtn" class="form-text">
                            <i class="fas fa-paperclip" style="color: #9FA2B4;"></i>
                            <img id="myImg" src="{{ asset('images/avatar-noname.svg')}}" alt="image">
                            <span class="text-less">avatar-noname.svg</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- chat -->
<style>
    .mychat-container {
        position: sticky;
        bottom: 0;
    }

    .mychat-container .chat {
        position: absolute;
        bottom: 65px;
        right: 10px;
        background-color: white;
        margin: 20px 20px;
        width: 380px;
        border-radius: 10px;
        overflow: hidden;
        display: block;
        box-shadow: 0px 33px 80px rgba(0, 0, 0, 0.07), 0px 4.13211px 10.0172px rgba(0, 0, 0, 0.035);
    }

    .mychat-container .chat .chat-header,
    .mychat-container .chat .chat-body {
        padding: 20px;
    }

    .mychat-container .chat .chat-header {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 150px;
        background: var(--dark-blue-color);
        color: white;
    }

    .mychat-container .chat .chat-header .chat-avatar {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    img {
        border-radius: 50%;
    }

    .mychat-container .chat .chat-body {
        height: 300px;
        overflow-y: auto;
    }

    .mychat-container .chat .chat-body .time {
        align-self: flex-end;
        font-size: 10px;
        display: block;
    }

    .mychat-container .chat .chat-body .chat-send,
    .mychat-container .chat .chat-body .chat-receive,
    .typing {
        display: flex;
        align-items: flex-start;
        margin: 10px 0px;
    }

    .mychat-container .chat .chat-body .chat-message {
        display: block;
        width: 220px;
        min-height: 45px;
        font-size: 12px;
        /* height: 100px; */
        margin: 0px 10px;
        padding: 10px;
        border-radius: 10px;
        overflow: hidden;
        /* white-space: nowrap; */
        text-overflow: ellipsis;
        /* background-color: blue; */
        /* color: white; */
    }

    /* .mychat-container .chat .chat-body .chat-message:hover+.time {
        display: block;
    } */

    .chat-send {
        justify-content: flex-start;
    }

    .chat-receive {
        justify-content: flex-end;
    }

    .chat-send .chat-message {
        background-color: var(--blue-color);
        color: white;
    }

    .chat-receive .chat-message {
        background-color: var(--dark-gray-color);
        color: black;
    }

    .typing {
        height: 40px;
        align-items: center;
    }

    .typing .typing-text {
        display: flex;
        width: 100%;
        font-size: 4rem;
        margin-bottom: 26px;
    }

    .typing .typing-text span:nth-child(1) {
        animation: animate 2000ms ease-in-out infinite;
    }

    .typing .typing-text span:nth-child(2) {
        animation: animate 2050ms ease-in-out infinite;
    }

    .typing .typing-text span:nth-child(3) {
        animation: animate 2060ms ease-in-out infinite;
    }

    .typing .typing-text span:nth-child(4) {
        animation: animate 2080ms ease-in-out infinite;
    }


    @keyframes animate {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-5px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .mychat-container .chat .chat-footer .chat-form {
        display: flex;
        background: white;
        color: white;
        padding: 10px;
        justify-content: center;
        align-items: center;
    }

    .mychat-container .chat .chat-footer input {
        width: 100%;
        padding: 10px;
    }

    .mychat-container .chat .chat-footer input:focus {
        outline: none;
    }

    .mychat-container .chat .chat-footer button {
        display: flex;
        cursor: pointer;
        width: 55px;
        height: 45px;
        border: none;
        background-color: var(--dark-blue-color);
        color: white;
        padding: 5px 5px 0px 0px;
        margin-left: 5px;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        margin-bottom: 10px;
    }

    .mychat-container .chat .chat-footer button i {
        font-size: 24px;
    }

    .chat-button {
        position: sticky;
        bottom: 0;
    }

    .chat-button .btn-chat {
        position: absolute;
        bottom: 0;
        right: 0;
        cursor: pointer;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        background-color: var(--dark-blue-color);
        margin: 20px 20px;
        padding: 10px;
    }

    .chat-button .btn-chat i {
        font-size: 30px;
        color: white;
    }
</style>

<div class="mychat-container">
    <div class="chat" id="chat">
        <div class="chat-header">
            <div class="chat-avatar">
                <img src="{{ asset('images/tes-profil.jpg')}}" alt="avatar" width=60 height=60>
            </div>
            <div class="chat-username">Dinas Kominfo</div>
        </div>
        <div class="chat-body">
            <div class="chat-send">
                <img src="{{ asset('images/tes-profil.jpg')}}" alt="avatar" width=45 height=45>
                <div class="chat-message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt animi tempora
                    aperiam alias dolores quos, esse necessitatibus mollitia magnam quod voluptates ipsum corrupti
                    doloribus, totam incidunt omnis? Molestias, enim minus?</div>
                <span class="time">6:48am</span>
            </div>
            <div class="chat-receive">
                <span class="time">6:48am</span>
                <div class="chat-message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt animi tempora
                    aperiam alias dolores quos, esse necessitatibus mollitia magnam quod voluptates ipsum corrupti
                    doloribus, totam incidunt omnis? Molestias, enim minus?</div>
                <img src="{{ asset('images/tes-profil.jpg')}}" alt="avatar" width=45 height=45>
            </div>
            <div class="typing">
                <img src="{{ asset('images/tes-profil.jpg')}}" alt="avatar" width=45 height=45>
                <div class="typing-text">
                    <span>.</span>
                    <span>.</span>
                    <span>.</span>
                    <span>.</span>
                </div>
            </div>
            <div class="typing" style="text-align: right;">
                <div class="typing-text" style="justify-content: flex-end;">
                    <span>.</span>
                    <span>.</span>
                    <span>.</span>
                    <span>.</span>
                </div>
                <img src="{{ asset('images/tes-profil.jpg')}}" alt="avatar" width=45 height=45>
            </div>
        </div>
        <div class="chat-footer">
            <form action="" class="chat-form" id="chat-form">
                <div class="form-input">
                    <input type="text" name="texting" class="texting" id="msg" placeholder="Ketik pesan...">
                </div>
                <button class="send" id="megirim">
                    <span>
                        <i class="fab fa-telegram-plane"></i>
                    </span>
                </button>
            </form>

        </div>
    </div>
</div>

<div class="chat-button">
    <button class="btn-chat" id="btn-chat">
        <span>
            <i class="far fa-comment"></i>
        </span>
    </button>
</div>

<script>
    $("#btn-chat").on("click", function () {
        $(".chat").fadeToggle('slow');
    });

</script>

<!-- endof chat -->

<!-- Modal -->
<!-- modal yakin -->
<div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kirim Tanggapan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah semua data sudah lengkap?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success" id="next">Ya, Lanjutkan</button>

            </div>
        </div>
    </div>
</div>
<!-- end modal -->


<!-- Modal -->
<!-- modal reason -->
<div class="modal" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Alasan Pending</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Beri Alasan:</h5>
                <form id="alasan">
                    <textarea name="alasan_pending" rows="5" placeholder="Tulis disini..."></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="kirim_alasan">Kirim</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->


<!-- The Modal -->
<!-- modal show image -->
<div id="myModal" class="my-modal">

    <!-- The Close Button -->
    <span class="mybtn-close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="my-modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>
<!-- end modal -->

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

<script>
    // add list question
    $("#addQ").on('click', function () {
        $('#formQ').append(`<div class="form-checklist">                    
                    <label class="container">` + $('#tambah').val() +
            `<input type="checkbox" checked="checked" name="status_masalah">
                        <span class="checkmark check"></span>
                    </label>
                    <button class="delete_list">Hapus</button>
                </div>`);
    });

    // delete question
    $('#formQ').on('click', '.delete_list', function () {
        $(this).parent().remove();
    });

    // validate response on click
    $('#next').on('click', function () {
        validate();
    });

    // submit form on click
    $('#kirim_alasan').on('click', function () {
        $('#formTanggapan').submit();
        $('#alasan').submit();
    });

    // validate response
    // when input = 'belum', show modal reason and remove confirmation modal
    // else submit form
    function validate() {
        var input = $("input[type='radio'][name='status_masalah']:checked").val();
        if (input === 'belum') {
            $('#exampleModal').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();

            $('#exampleModal2').modal('show');
        } else if (input === 'selesai') {
            $('#formTanggapan').submit();
        }
    }
</script>
@endsection