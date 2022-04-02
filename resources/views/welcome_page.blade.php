@extends('layouts.main')

@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">NewsGB</h1>
      <p class="lead text-muted">Добро пожаловать. Это агрегатор новостей NewsGB. У нас только самые актуальные новости. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ab placeat quas, maiores odio voluptas impedit laboriosam corporis? Enim deserunt tenetur nostrum quisquam quibusdam assumenda odit, ipsa vitae ullam rerum esse.</p>
      <p>
        <a href="{{route('categories')}}" class="btn btn-primary my-2">Категории новостей</a>
        <a href="{{route('news')}}" class="btn btn-primary my-2">Все новости</a>
      </p>
    </div>
  </div>
@endsection

@section('content')
    @foreach ($newsList as $news)
    <div class="col">
      <div class="card shadow-sm card-stretch"> 
        <div class="card-body">
            <strong>
                <a href="{{ route('news.show', ['id' => $news->id]) }}"> {{ $news->title }}  </a> 
              </strong>
              <img src=" {{$news->image}} " width="250" height="250">
          <p class="card-text">{!!$news->description !!}</p>
          <div class="d-flex justify-content-between align-items-center card-end">
            <div class="btn-group">
              <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
@endsection
