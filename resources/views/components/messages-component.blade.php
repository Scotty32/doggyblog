<div class="content-main-container message">
    fuck
    fuck
        <table class="board">
        <tr>
            <td>Nom de l'utilisateur</td>
            <td>Email</td>
            <td>nombre de plainte</td>
        </tr>
            @foreach ($messages as $message)
            <tr>
                <td>{{$message->motif}}</td>
                <td>{{$message->user_id}}</td>
                <td> {{$message->created_at}}</td>
                </tr>
                @endforeach
        </table>
    </div>
</div>