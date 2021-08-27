@extends('layouts.base')
@section('content')

<div class="wrapper">
    <div class="form-container">
        @error('title')
            {{$message}}
        @enderror
        <form action="{{route('postPP')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="image">
                choisissez le image de votre profil 
            </label>
            <input type="file" name="image" id="image">
            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>@endsection