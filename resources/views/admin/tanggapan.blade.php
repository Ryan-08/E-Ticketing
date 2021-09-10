@extends('layout.dashboard')

@section('title') Admin | Daftar Tiket @endsection

@section('header-title') Tanggapan @endsection

@section('konten')
<div class="button-sticky">
    <a href="{{ route('cetak', $tiket->no_ticket) }}" class="btn-primary">
        <span><i class="fas fa-print"></i></span>
        Cetak Laporan
    </a>
</div>
<div class="container" style="display: flex; justify-content: space-between; margin-top: 80px;">
    <div class="form-container"
        style="display: flex; flex-direction: column; margin-left:20px; justify-content: space-between;">
        <form id="formQuestion" class="form" style="width:100%; height: 580px;" method="POST"
            action="{{ route('update-quest', $tiket->no_ticket) }}">
            @csrf
            <div class="form-header" style="text-align: left; display: flex; justify-content: space-between;">
                Form Pertanyaan                
            </div>
            <div class="form-tambah">
                <input type="text" name="tambah" placeholder="Tambah Pertanyaan" id="tambah" autocomplete="off">
                <button type="button" id="addQ">
                    <span>
                        <i class="fas fa-plus"></i>
                    </span>
                </button>
            </div>
            <div class="form-body" id="formQ" style="padding: 0px;height: 430px; overflow-y: auto;">
                @if ($question->isNotEmpty())
                    @foreach ($question as $item)
                    <div class="form-checklist">
                        <label class="container">{{$item->pertanyaan}}
                            <input type="checkbox" checked name="question[]" value="{{$item->pertanyaan}}">
                            <span class="checkmark check"></span>
                        </label>
                        <a href="{{route('delete-quest', ['id' => $tiket->no_ticket, 'quest' => $item->id])}}" class="btn delete_list">Hapus</a>
                    </div>                        
                    @endforeach                    
                @endif
                <!-- <div class="form-checklist">
                    <label class="container">Pertanyaan 1
                        <input type="checkbox" name="question[]" value="Pertanyaan 1">
                        <span class="checkmark check"></span>
                    </label>
                    <button class="delete_list">Hapus</button>
                </div>
                <div class="form-checklist">
                    <label class="container">Pertanyaan 2
                        <input type="checkbox" name="question[]" value="Pertanyaan 2">
                        <span class="checkmark check"></span>
                    </label>
                    <button class="delete_list">Hapus</button>
                </div> -->
            </div>
        </form>
        <form class="form" id="formTanggapan" style="width:100%;" method="POST"
            action="{{ route('send-notif', $tiket->no_ticket) }}">
            @csrf
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
                        <input type="radio" name="status_masalah" value="belum">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
            <input type="hidden" name="alasan_pending">
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
                        <img width="40px" height="40px"
                            src="{{ Storage::url('images/'.$data->user_profiles->image_path) }}" alt="avatar">
                        <div class="form-text">{{ $data->name }}</div>
                    </div>
                </div>
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
        </div>
    </div>
</div>
@include('sticky-chat')

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
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="next">Ya, Lanjutkan</button>

            </div>
        </div>
    </div>
</div>
<!-- end modal -->


<!-- Modal -->
<!-- modal reason -->
<div class="modal" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterLabel">Alasan Pending</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Beri Alasan:</h5>
                <form id="alasan" method="POST">
                    @csrf
                    <textarea name="alasan_pending" rows="5" placeholder="Tulis disini..."></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success" id="kirim_alasan">Kirim</button>
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
    <img style="border-radius: 0%;" class="my-modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>
<!-- end modal -->
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

<script>
    $(function () {
        // add list question
        $("#addQ").on('click', function () {
            if ($('#tambah').val()) {
                $('#formQ').append(`<div class="form-checklist">                    
                    <label class="container">` + $('#tambah').val() +
                    `<input type="checkbox" checked="checked" name="question[]" value=` + $('#tambah').val()
                    + `>
                        <span class="checkmark check"></span>
                    </label>
                    <a class="btn delete_list">Hapus</a>
                </div>`);
            }
            $('#tambah').val('');
        });

        $('#tambah').keydown(function(event) {
            if (event.keyCode == 13) {
                if ($('#tambah').val()) {
                    $('#formQ').append(`<div class="form-checklist">                    
                        <label class="container">` + $('#tambah').val() +
                        `<input type="checkbox" checked="checked" name="question[]" value=` + $('#tambah').val()
                        + `>
                            <span class="checkmark check"></span>
                        </label>
                        <a class="btn delete_list">Hapus</a>
                    </div>`);
                }
                $('#tambah').val('');
            }
        });

        // delete question
        $('#formQ').on('click', '.delete_list', function () {
            $(this).parent().remove();
        });

        // update question
        // $('#updateQuest').on('click', function () {
        //     var searchIDs = $("#formQuestion input[type='checkbox'][name='question[]']:checked").map(function () {
        //         return $(this).val();
        //     }).get();
        //     searchIDs.forEach(element => {
        //         $('<input>').attr({
        //             type: 'hidden',
        //             name: 'listofQuest[]',
        //             value: element
        //         }).appendTo('#formQuestion');
        //         $("#formQuestion").submit();
        //     });

        // });

        // validate response on click
        $('#next').on('click', function () {
            // console.log('clicked');
            validate();
        });

        // submit form on click
        $('#kirim_alasan').on('click', function () {
            var searchIDs = $("#formQuestion input[type='checkbox'][name='question[]']:checked").map(function () {
                return $(this).val();
            }).get(); // <----                
            searchIDs.forEach(element => {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'listofQuest[]',
                    value: element
                }).appendTo('#formTanggapan');
            });
            var alasan = $('#alasan textarea').val();
            $('#formTanggapan input[name=alasan_pending]').val(alasan);
            $('#formTanggapan').submit();
        });

        // validate response
        // when input = 'belum', show modal reason and remove confirmation modal
        // else submit form
        function validate() {
            var input = $("input[type='radio'][name='status_masalah']:checked").val();
            var checkbox = $("input[type='checkbox'][name='question[]']:checked").val();
            console.log(checkbox)
            if (input === 'belum') {
                $('#exampleModal').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();

                $('#exampleModalCenter').modal('show');
            } else if (input === 'selesai') {
                var searchIDs = $("#formQuestion input[type='checkbox'][name='question[]']:checked").map(function () {
                    return $(this).val();
                }).get();
                searchIDs.forEach(element => {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'listofQuest[]',
                        value: element
                    }).appendTo('#formTanggapan');
                });
                $('#formTanggapan').submit();
            }
        }
    });
</script>
@endpush
@endsection