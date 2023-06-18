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
                <livewire:likes-component :post="$post"/>
            </div>
        @endforeach
        </section>
        <section class="side-nav">
        <div class="img">
            <img src="img\ilya-shishikhin-SCIRnLEtqWc-unsplash.jpg" alt="img" srcset="">
        </div>
        </section>
    </div>
@endsection
