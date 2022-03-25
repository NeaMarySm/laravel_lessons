@extends('layouts.main')
@section('title')
    @parent - Список новостей
@endsection

@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Список новостей</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </div>
@endsection
@section('content')

    @forelse ($newsList as $news)
    <div class="col">
        <div class="card shadow-sm card-stretch">
            <img src=" {{$news['image']}} ">
          <div class="card-body">
            
            <strong>
                <a href="{{ route('news.show', ['id' => $news['id']]) }}"> {{ $news['title'] }}  </a> 
            </strong>
            <p class="card-text">{{$news['description'] }}</p>
            <div class="d-flex justify-content-between align-items-center card-end">
              <div class="btn-group">
                <a href="{{ route('news.show', ['id' => $news['id']]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
              </div>
              <small class="text-muted">Status: <em> {{$news['status']}} </em></small>
              <small class="text-muted">Author: <em> {{$news['author']}} </em></small>
            </div>
          </div>
        </div>
    </div>
        
    @empty
        <p>Новостей нет</p>
    @endforelse
@endsection




    {{-- <div class="news">
        <h3>
        </h3>
        <p>Category: <em>{{ $news['category']['name']}} </em> </p>
        
        <br>
        <p>></p>
        <p></p>
        <p></p>
    </div>
    <hr> --}}



