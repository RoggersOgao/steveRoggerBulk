@extends('layouts.dashboard')
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,700);
    *, *:before, *:after {
        box-sizing: border-box;
    }

    .container-chat {
        margin: 0 auto;
        width: 850px;
        background: #444753;
        border-radius: 5px;
    }
    .people-list {
        width: 280px;
        float: left;
    }
    .people-list .search {
        padding: 20px;
    }
    .people-list input {
        border-radius: 3px;
        border: none;
        padding: 14px;
        color: white;
        background: #6a6c75;
        width: 90%;
        font-size: 14px;
    }
    .people-list .fa-search {
        position: relative;
        left: -25px;
    }
    .people-list ul {
        padding: 20px;
        height: 770px;
    }
    .people-list ul li {
        padding-bottom: 10px;
        list-style: none;
        cursor: pointer;
    }
    .people-list img {
        float: left;
    }
    .people-list .about {
        float: left;
        margin-top: 8px;
    }
    .people-list .about {
        padding-left: 8px;
    }
    .people-list .status {
        color: #92959e;
    }
    .chat {
        width: 550px;
        float: left;
        background: #f2f5f8;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        color: #434651;
    }
    .chat .chat-header {
        padding: 20px;
        border-bottom: 2px solid white;
    }
    .chat .chat-header img {
        float: left;
    }
    .chat .chat-header .chat-about {
        float: left;
        padding-left: 10px;
        margin-top: 6px;
    }
    .chat .chat-header .chat-with {
        font-weight: bold;
        font-size: 16px;
    }
    .chat .chat-header .chat-num-messages {
        color: #92959e;
    }
    .chat .chat-header .fa-star {
        float: right;
        color: #d8dadf;
        font-size: 20px;
        margin-top: 12px;
    }
    .chat .chat-history {
        padding: 30px 30px 20px;
        border-bottom: 2px solid white;
        overflow-y: scroll;
        height: 575px;
    }
    .chat .chat-history ul li {
        list-style: none;
    }
    .chat .chat-history .message-data {
        margin-bottom: 15px;
    }
    .chat .chat-history .message-data-time {
        color: #a8aab1;
        padding-left: 6px;
    }
    .chat .chat-history .message {
        color: white;
        padding: 18px 20px;
        line-height: 26px;
        font-size: 16px;
        border-radius: 7px;
        margin-bottom: 30px;
        width: 90%;
        position: relative;
    }
    .chat .chat-history .message:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #86bb71;
        border-width: 10px;
        margin-left: -10px;
    }
    .chat .chat-history .my-message {
        background: #86bb71;
    }
    .chat .chat-history .other-message {
        background: #94c2ed;
    }
    .chat .chat-history .other-message:after {
        border-bottom-color: #94c2ed;
        left: 93%;
    }
    .chat .chat-message {
        padding: 30px;
    }
    .chat .chat-message textarea {
        width: 100%;
        border: none;
        padding: 10px 20px;
        font: 14px/22px "Lato", Arial, sans-serif;
        margin-bottom: 10px;
        border-radius: 5px;
        resize: none;
    }
    .chat .chat-message .fa-file-o, .chat .chat-message .fa-file-image-o {
        font-size: 16px;
        color: gray;
        cursor: pointer;
    }
    .chat .chat-message button {
        float: right;
        color: #94c2ed;
        font-size: 16px;
        text-transform: uppercase;
        border: none;
        cursor: pointer;
        font-weight: bold;
        background: #f2f5f8;
    }
    .chat .chat-message button:hover {
        color: #75b1e8;
    }
    .online, .offline, .me {
        margin-right: 3px;
        font-size: 10px;
    }
    .online {
        color: #86bb71;
    }
    .offline {
        color: #e38968;
    }
    .me {
        color: #94c2ed;
    }
    .align-left {
        text-align: left;
    }
    .align-right {
        text-align: right;
    }
    .float-right {
        float: right;
    }
    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }
    .names:hover {
        background-color: #E1F0FF;
        border-radius: 4px;
    }

    .people-list ul{overflow-y: scroll!important}
</style>
@section('content')
    <body class="bg-dark">
    <div class="container">
        <div class="d-flex flex-row">
            <div class="col-md-12" id="app" style="padding: 20px;">
                        <main-app></main-app>
        </div>
        </div>
    </div>
    </body>
@endsection
<script src="{{ asset('js/app.js') }}" defer></script>
