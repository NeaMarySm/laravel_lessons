@extends('layouts.app')
@section('title')
    @parent - Редактирование профиля {{$user->name}}
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать профиль</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
</div>
<div class="raw">
    @include('inc.messages')
    <form action="{{route('account.profile.update', [
        'profile' => $user
    ])}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control @if($errors->has('name')) alert-danger @endif" name="name" id="name" value="{{$user->name}}">
            @error('name')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div> 
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @if($errors->has('email')) alert-danger @endif" name="email" id="email" value="{{$user->email}}">
            @error('email')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div> 
         
        <div class="form-group">
            <label for="password">Старый пароль</label>
            <input type="password" class="form-control @if($errors->has('password')) alert-danger @endif" name="password" id="password" value="">
            @error('password')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>  
        <div class="form-group">
            <label for="new-password">Новый пароль</label>
            <input type="password" class="form-control @if($errors->has('new-password')) alert-danger @endif" name="new-password" id="new-password" value="">
            @error('new-password')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div> 
        
        <br>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>

@endsection