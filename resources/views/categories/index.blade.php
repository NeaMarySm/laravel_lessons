@extends('layouts.main')

@section('title')
@parent - Категории
@endsection  

@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Категории</h1>
      <p>
        <a href="{{route('welcome')}}" class="btn btn-primary my-2">На главную</a>
        <a href="{{route('news')}}" class="btn btn-primary my-2">Все новости</a>
      </p>
    </div>
  </div>
@endsection
@section('content')
    @foreach ($categoryList as $category)

    <h3>
    <a href="{{route('categories.show', ['id' => $category->id])}}"> {{$category->title}}</a>
    </h3>
    <p>{!! $category->description !!}</p>

    @endforeach
@endsection
