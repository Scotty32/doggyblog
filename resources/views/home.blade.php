@extends('layouts.base')
@section('content')
    <div class="main-container">
        <section class="content">
        @foreach ($posts as $post)
            <div class="post">
                <div class="post-container">
                    <h3 class="post-title">
                        {{$post->title}}
                    </h3>
                    <p class="post-content">
                        {{substr($post->content, 0, 500)}}<a href="{{route('post', [$post->id])}}"><strong>...lire la suite</strong></a>
                    </p>
                </div>
                <div class="post-rate">
                    <div class="like">
                        <form action="{{route('like', [$post->id])}}" method="POST">
                        @csrf
                        <i class="far fa-thumbs-up" onclick="event.preventDefault();
                                                this.closest('form').submit()"></i>
                        </form>
                        <span class="like-rate">
                            {{$post->rate->likes}}
                        </span>
                    </div>
                    <div class="dislike"><form action="{{route('dislike', [$post->id])}}" method="POST">
                        @csrf
                        <i class="far fa-thumbs-down" onclick="event.preventDefault();
                                                this.closest('form').submit()"></i>
                        </form>
                    <span class="like-rate">
                            {{$post->rate->dislikes}}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
        </section>
        <section class="side-nav">
        <div class="img">
            <img src="img\ilya-shishikhin-SCIRnLEtqWc-unsplash.jpg" alt="img" srcset="">
        </div>
            <div class="bestof-post">
            @foreach ($bests as $post)
    
            <div class="post">
                <div class="post-container">
                    <h3 class="post-title">
                        {{$post->rateable->title}}
                    </h3>
                    <p class="post-content">
                        {{substr($post->rateable->content, 0, 200)}}  <a href="{{route('post', [$post->rateable->id])}}"><strong>...lire la suite</strong></a>
                    </p>
                </div>
            </div>
        @endforeach
            </div>
        </section>
    </div>
@endsection