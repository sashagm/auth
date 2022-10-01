@extends('auth::layouts.app')
 
@section('title', 'Авторизация')
 
@section('content')


    <div class="card">
    <div class="card-header text-center font-weight-bold">
    Авторизация
    </div>
    <div class="card-body">
    @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ route('loginProcess') }}">
       @csrf
        <div class="form-group">
          <label for="name">Email</label>
          <input type="email" id="email" name="email" class="form-control" required="">
          @if ($errors->has('email'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
        @endif           
        </div>
        <div class="form-group">
          <label for="name">Пароль</label>
          <input type="text" id="password" name="password" class="form-control" required="">
          @if ($errors->has('password'))
        <div class="error">
            {{ $errors->first('password') }}
        </div>
        @endif          
        </div>
        <button type="submit" class="btn btn-primary">Авторизация</button>
      </form>
      </div></div>
@stop