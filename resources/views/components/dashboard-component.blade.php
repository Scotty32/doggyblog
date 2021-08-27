<div class="content-main-container dashboard">
    <div class="content-container first">
<div class="content-item resume post">
    <div>
        Nombre total de posts sur le blog
    </div>    
<span class="count post-count">
        
    {{$post->count()}}
    </span>
</div>
<div class="content-item resume message">
 <div>
     Nombre de messag non lu
 </div>
 <span class="count message-count">
     
 </span>   
</div>
<div class="content-item resume comment ">
    <div>
      Nombre des commentaire de l'admin  
    </div>
    <span class="count comment-count">
        {{$comments->count()}}
    </span>
</div>
</div>
<div class="content-container second">
    <div class="content-item posts">
    <table  class="board">
        <tr>
            <td>titre</td>
            <td>nom de l'autheur</td>
            <td>date de création</td>
            <td>ratio</td>
        </tr>
    @foreach ($post as $post )        
    <tr>
                <td class="post-board-cell cell-title">{{$post->title}}</td>
                <td class="post-board-cell cell-user">créer par : {{$post->user->name}} </td>
                <td class="post-board-cell cell-created">le : {{ $post->created_at}}</td>
                <td class="post-board-cell cell-rate">rate : {{($post->rate->likes - $post->rate->dislikes)}}</td>
            </tr>
            
    @endforeach
    </table>
    </div>
    <div class="content-item users">
        <table class="board">
        <tr>
            <td>Nom de l'utilisateur</td>
            <td>Email</td>
            <td>nombre de plainte</td>
        </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td> {{$user->isSignaled}}</td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
</div>