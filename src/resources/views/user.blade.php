@extends('auth::layouts.app')
 
@section('title', 'Профиль')
 
@section('content')
    <p>Мой профиль</p>
    
    <p><a href="{{ route('logout') }}">Выйти</a></p>
@stop