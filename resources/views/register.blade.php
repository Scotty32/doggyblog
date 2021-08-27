@extends('layouts.auth')
@section('content')
    <div class="main">
    <div class="auth-container">
            <form action="{{ route('register') }}" method="post" class="form">
            @csrf    
            @forelse ($errors->all() as $error )
                <span class="error register-error">{{ $error}}</span>
            @empty
                
            @endforelse
            <!-- Name -->
            
                <label for="name">VOTRE NOM</label>

                <input id="name" class="" type="text" name="name" required />
            
            <!-- Email Address -->
            
                <label for="email">VOTRE EMAIL</label>

                <input id="email" class="" type="email" name="email" required />
            
            <!-- Password -->
                <label for="password">ENTRER UN MOT DE PASSE</label>

                <input id="password" class=""
                                type="password"
                                name="password"
                                required />
            

            <!-- Confirm Password -->
                <label for="password_confirmation" >REPETER LE MON DE PASSE</label>

                <input id="password_confirmation" class=""
                                type="password"
                                name="password_confirmation" required />
            
            <div id="register">
                <a href="{{ route('login') }}">
                    Already registered?
                </a>

                <button class="btn-register">
                    Register
                </button>
            </div>
            </form>
        </div>
    </div>
@endsection