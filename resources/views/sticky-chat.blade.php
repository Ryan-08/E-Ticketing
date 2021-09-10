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
    .chat-bot {
        display: flex;
        align-items: center;
        margin: 10px 0px;
    }

    .mychat-container .chat .chat-body .chat-message {
        display: block;
        max-width: 300px;        
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
        justify-content: flex-end;
    }

    .chat-receive {
        justify-content: flex-start;
    }

    .chat-receive .chat-message {
        background-color: var(--dark-blue-color);
        color: white;
    }

    .chat-send .chat-message {
        background-color: #F3F3F3;
        color: black;
    }

    .chat-bot{
        justify-content: center
    }
    .chat-bot .chat-message{
        background-color: var(--dark-gray-color);
        color: white;
        width: 300px; 
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
            @role('admin')
            <div class="chat-avatar">
                <img src="{{ Storage::url('images/'.$data->user_profiles->image_path) }}" alt="avatar" width=60 height=60>
            </div>
            <div class="chat-username">{{ $data->name }}</div>
            @else
            <div class="chat-avatar">
                <img src="{{ Storage::url('images/'.$admin->user_profiles->image_path) }}" alt="avatar" width=60 height=60>
            </div>
            <div class="chat-username">{{ $admin->name }}</div>
            @endrole
        </div>
        <div class="chat-body"></div>
        <div class="chat-footer">
            <form action="" class="chat-form" id="chat-form" autocomplete="off">
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
<!-- qs cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.10.1/qs.min.js"
    integrity="sha512-aTKlYRb1QfU1jlF3k+aS4AqTpnTXci4R79mkdie/bp6Xm51O5O3ESAYhvg6zoicj/PD6VYY0XrYwsWLcvGiKZQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var user = {!! auth()->user()->toJson() !!};        
    var path = {!! $user->user_profiles->toJson() !!};    
    var ticket = {!! $tiket->toJson() !!};
    @role('user')   
        var from = {!! $admin->toJson() !!};
    @else
        var from = {!! $data->toJson() !!};
    @endrole
</script>
<script src="{{ asset ('js/main.js') }}"></script>
<!-- endof chat -->