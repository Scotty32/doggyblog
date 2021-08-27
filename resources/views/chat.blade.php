<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="{{asset('../css/chat.css')}}">
</head>
<body>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<div class="chat-info">
<div id="online" online="{{route('userOnline')}}"></div>
    <div class="online-users">
        <ul class="online-users__list">

        </ul>
    </div>
</div>
<div class="chat-global">

    <div class="nav-top">
        <div class="utilisateur">
            <p>{{count($onlines)}} utilisateur connecté</p>
        </div>

        <div class="logos-call">
            <img src="ressources/phone.svg">
            <img src="ressources/video-camera.svg">
        </div>
    </div>

    <div class="conversation">
        @foreach ($messages as $message )
            @if ($message->user->id == Session::get('user_id'))
            <div class="talk right">
            <p>{{$message->content}}
            @if (in_array($message->user->id, $onlines))
                en ligne
            @else
                offline
            @endif
            </p>
            <img src="ressources/avatar1.jpg">
        </div>                
            @else
            <div class="talk left">
            <img src="ressources/avatar2.jpg">
            <p>{{$message->content}}
            @if (in_array($message->user->id, $onlines))
                en ligne
            @else
                offline
            @endif
            </p>
        </div>
                
            @endif
        @endforeach
    </div>


    <form class="chat-form">

        <div class="container-inputs-stuffs">

            <div class="files-logo-cont">
                <img src="ressources/paperclip.svg">
            </div>

            <div class="group-inp">
                <textarea placeholder="Enter your message here" minlength="1" maxlength="1500"></textarea>
                <img src="ressources/smile.svg">
            </div>


            <button class="submit-msg-btn">
                <img src="ressources/send.svg">
            </button>
        </div>

    </form>
</body>
<script src="{{asset('js/chat.js')}}"></script>
</html>
