<span id="bell">
    {{-- @if($notif->isNotEmpty())        
    <div class="notification-count">{{ $notif->count()}}</div>
    @endif --}}
    <i class="fas fa-bell"></i>
</span>


<style>
    #bell {
        cursor: pointer;
    }

    .notification-count {
        position: absolute;
        top: 30px;
        margin-left: 5px;
        color: white;
        background-color: red;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        line-height: 18px;
        font-size: 10px;
        text-align: center;
        cursor: pointer;
    }

    .notif {
        position: absolute;
        top: 45px;
        right: 155px;
        background-color: white;
        margin: 20px 20px;
        width: 450px;
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
        width: 100%;
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
        @if($notif->isNotEmpty())
            @foreach($notif as $notifikasi)
            <?php $createdAt = \Carbon\Carbon::parse($notifikasi->created_at); ?>
            @if($createdAt->diffInMinutes(\Carbon\Carbon::now()) < 60)
                @foreach ($user->tickets as $item)
                    @if($notifikasi->from == "admin" && $notifikasi->ticket_id == $item->id)
                        @role('user')
                        <!-- notif -->
                        <div class="list-notif" data-url="{{ route('user-tiket', $notifikasi->no_ticket) }}">
                            <div class="body-notif">
                                <img src="{{ asset('images/avatar-noname.svg')}}" alt="avatar">
                                <div class="detail-notif">
                                    <div class="judul-notif">{{ $notifikasi->judul }} dari {{$notifikasi->from}}</div>
                                    <div class="desc-notif">{{ $notifikasi->pesan }}</div>
                                    <div class="extras-notif">                                    
                                        <div class="extras-time">{{$createdAt->diffInMinutes(\Carbon\Carbon::now())}}
                                            menit yang lalu
                                        </div>                                             
                                            @if($item->id == $notifikasi->ticket_id && $item->ticket_status_id == 2)                                                                
                                            <div class="extras-from">
                                                <a href="{{ route('user-response', [$status = 'belum', $notifikasi->id]) }}" class="myBtnradius btn-danger">Belum</a>
                                                <a href="{{ route('user-response', [$status = 'selesai', $notifikasi->id]) }}" class="myBtnradius btn-success">Selesai</a>
                                            </div>   
                                            @endif                                                                                                                                                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- endof notif -->
                        @endrole                
                    @endif
                @endforeach    
                @if($notifikasi->from != "admin")
                    @role('admin')                                            
                            <!-- notif -->
                            <div class="list-notif" data-url="{{ route('detail', $notifikasi->no_ticket) }}">
                                <div class="body-notif">
                                    <img src="{{ asset('images/avatar-noname.svg')}}" alt="avatar">
                                    <div class="detail-notif">
                                        <div class="judul-notif">{{ $notifikasi->judul }} dari {{$notifikasi->from}}</div>
                                        <div class="desc-notif">{{ $notifikasi->pesan }}</div>
                                        <div class="extras-notif">
                                            @if($createdAt = \Carbon\Carbon::parse($notifikasi->created_at))
                                            <div class="extras-time">{{$createdAt->diffInMinutes(\Carbon\Carbon::now())}}
                                                menit yang lalu
                                            </div>
                                            <div class="extras-from">{{ $notifikasi->from }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- endof notif -->                                   
                    @endrole 
                @endif                                    
            @endif
            @endforeach        
        @endif
    </div>
</div>