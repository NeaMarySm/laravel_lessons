@extends('layouts.main')
@section('title')
    @parent - {{$news->title}}
@endsection
@section('header')
<div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
                 <h1 class="fw-light">{{ $news->title }}</h1>
        </div>
</div>
@endsection

@section('content')
<div class="news">
        <p>Category:  <a href="{{route('categories.show', ['id' => $news->category_id])}}">{{$news->category->title}}</a>  </p>
        <img src=" {{$news->image}} ">
        <br>
        <p>Author: <em> {{$news->author}} </em></p>
        <p>Status: <em> {{$news->status}} </em></p>
        <p>{!!$news->description!!} </p>
</div>
@endsection

