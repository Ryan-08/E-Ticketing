@extends('layout.master')
@section('title') E-Ticketing | Masuk @endsection
@section('konten')
<style>
    @import 'color.css';

    body {
        height: 100vh;
    }

    .mychat-container {
        position: absolute;
        right: 0;
        background-color: teal;
        height: 100px;
        width: 100px;
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

</div>
<div class="chat-button">
    <button class="btn-chat">
        <span>
            <i class="far fa-comment"></i>
        </span>
    </button>
</div>

@endsection