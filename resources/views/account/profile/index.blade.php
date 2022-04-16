@extends('layouts.app')
@section('title')
    @parent - профиль пользователя {{$user->name}}
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Профиль</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
</div>
<div class="raw">
@include('inc.messages')
    <div class="user-profile">
        <p>Имя пользователя:  {{$user->name}} </p>
        <br>
        @if ($user->avatar)
            <img src="{{$user->avatar}}" alt="avatar" style="width:250px">
        @endif

       
        <p>Email: {{$user->email}}</p>
        <br>
        <p>Дата создания:{{$user->created_at}}</p>
        <div class="btn-group me-2">
            <a href="{{route('account.profile.edit', ['profile' => $user])}}" type="button" class="btn btn-sm btn-outline-secondary">Редактировать профиль</a>
        </div>
        
    </div>

    
</div>

@endsection