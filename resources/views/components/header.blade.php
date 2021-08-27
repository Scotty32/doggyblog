@extends('layouts.base')
@section('header')
<header class="header">
    
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-list-item"><a href="#">Acceuil</a></li>
                <li class="nav-list-item"><a href="#">Meilleur post du moment</a></li>
                <li class="nav-list-item"><a href="#">Categorie</a></li>
                <li class="nav-list-item"><a href="#">Contacter nous</a></li>
            </ul>
        </nav>
        <div class="logo">
            <div class="logo-img">
                <img src="{{ 'img/dalmatien.svg '}}" >
            </div>
            <div class="scroll">
            <span class="scroll-txt">calin de Toutou.com || Le blog des amis canin || et vous, que faite vous pour les mettre a l'aise?</span>
            <span class="scroll-txt reverse">Retrouver d'autres amoureux de toutou poilu || partager vos experiences avec nos amis a quatre pattes  </span>
            </div>
        </div>
@endsection