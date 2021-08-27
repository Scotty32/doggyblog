@extends('layouts.base')
@section('content')
    <div class="main-container">
        <div class="content">
            
                <form action="{{route('createPost')}}" class="form" method="post">
                @csrf
                @if ($errors->any())
                @foreach ($errors as $error)
                <span>{{$error->message}}</span>
                @endforeach
                    
                @endif
                <label for="title" class="contact_us__label">
                    Entrer le titre de votre post
                </label>
                <input name="title" id="title" class="contact_us__input-form">
</input>
        <label for="message" class="contact_us__label">
            Corp du message
        </label>
        <textarea name="content" id="content" cols="30" rows="10" class="contact_us__textarea">

        </textarea>
        <button type="submit" class="contact_us__btn">
            ENVOYER
        </button>
                </form>

        </div>
    </div>
@endsection