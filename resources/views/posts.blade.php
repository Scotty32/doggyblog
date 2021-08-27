@extends('layouts.base')
@section('content')
    <div class="main-container post-page">
        <section class="content ">
        <div class="post">
            <span class="post-title">
                {{$post->title}}    
            </span>
            <div class="post-content ">
                {{$post->content}}
            </div>
        </div>
        <div class="comment-container">
            <form action="{{ Route('registComment', ['id' => $post->id]) }}" method="post" class="form">
                @csrf
                @if (!Auth::user())
                <label for="name_comment"> Entrer Votre nom</label>
                <input type="text" name="name_comment" require >
        @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error )
                        <span class="error post-error">{{ $error}}</span>
                    @endforeach
                @endif
                <textarea name="content_comment" id="content_comment" cols="30" rows="10" placeholder="Entrer Votre commentaire" require ></textarea>
                <button type="submit" class="btn">Envoyer</button>
            </form>
            <section class="already_comment">
                @foreach ($comments as $comment )
                    <div class="post-comment">
                        <div class="comment-content">
                            {{ $comment->content}}
                        </div>
                         <h4 class="comment-user">
                         Commentaire de : {{ $comment->commentable->user? $comment->user->name : $comment->commentable->user->userDefault()->name}}
                        </h4>
                        
                    </div>
                    
                @endforeach

            </section>
        </div>
        </section>

    </div>
@endsection