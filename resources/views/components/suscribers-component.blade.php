<div class="content-main-container suscriber">
    @foreach ($suscribers as $suscriber)
        <div class="container suscriber">
            <div class="suscriber-info">
                <span class="suscriber-info__name">{{$suscriber->name}}</span> 
                    {{$suscriber->email}}
                <span>

                </span>
                    {{$suscriber->created_at}}
                <span>
                    {{$suscriber->phonenumber}}
                </span>
                <span></span><span></span>
</div>
    <div class="admin-action-container">
    
    <div class="admin-action">
    <span class="admin-action-item block">
    <span class="text medium-text">
        <strong>BLOQUER L'UTILISATEUR ?</strong>
    </span>
    <form action="{{route('blockUser', [$suscriber->id])}}" method="post">
    @csrf
    <span class="toggle-button" val='{{$suscriber->isBlocked}}'>
        <img src="..\icons\check-solid.svg" alt="" class="toggle-img allow">
        <img src="..\icons\times-solid.svg" alt="" class="toggle-img block">
        
    </span>
    </form>
    
</span><span class="admin-action-item"></span>
</div>
    </div>    
    
        </div>
    @endforeach
</div>
