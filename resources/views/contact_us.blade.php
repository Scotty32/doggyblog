@extends('layouts.base')

@section('content')
    <div class="container contact_us-container">
        @if ($errors->any())
            
        @foreach ($errors->all() as $error )
                        <span class="error post-error">{{ $error}}</span>
                    @endforeach
        @endif
        <div class="form-container contact_us ">
            <form action="{{route('sendMessageAdmin')}}" method="post" class="contact_us__form">
                @csrf
                <label for="motif" class="contact_us__label">
                    Quel est la cause de votre interrogation
                </label>
                <input name="motif" id="motif" class="contact_us__input-form">
</input>
        <label for="message" class="contact_us__label">
            Corp du message
        </label>
        <textarea name="message" id="message" cols="30" rows="10" class="contact_us__textarea">

        </textarea>
        <button type="submit" class="contact_us__btn">
            ENVOYER
        </button>
            </form>
        </div>
    </div>
@endsection