@extends('layouts.auth')
@section('content') 
    <div class="main">
        <div class="auth-container">
            <form action="{{ route('login') }}" method="post" class="form">
            @csrf    
            <label for="email">Entrer votre email</label>
                <input type="email" name="email" id="email" require class="email-input" placeholder="entrer votre email">
                <label for="password">Entrer le Mot de Passe</label>
                <input type="password" name="password" id="password" class="password-input" require>
                <button type="submit" class="btn btn-submit"></button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
@endsection