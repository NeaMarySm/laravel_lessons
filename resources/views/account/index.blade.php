@extends('layouts.app')

@section('content')
    <div class="">
        <h2>Добро пожаловать, {{ Auth::user()->name}}</h2>
        @if (Auth::user()->is_admin)
            <a href="{{route('admin.index')}}">Перейти в админку</a>
        @endif

        <a href="{{route('account.profile.index')}}">Открыть профиль</a>
    </div>
@endsection