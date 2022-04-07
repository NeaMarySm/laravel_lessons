@extends('layouts.main')
@section('title')
    @parent - Обратная связь
@endsection
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">NewsGB</h1>
      <p class="lead text-muted">Здесь вы можете оставить отзыв о работе сайта</p>
      <p>
        <a href="{{route('categories')}}" class="btn btn-primary my-2">Категории новостей</a>
        <a href="{{route('news')}}" class="btn btn-primary my-2">Все новости</a>
      </p>
    </div>
  </div>
@endsection

@section('content')
<div class="raw">
  @include('inc.messages')
    <form action="{{route('feedback.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">Имя пользователя</label>
            <br>
            <input type="text" name="username" value="{{old('username')}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <br>
          <input type="email" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="feedback-text">Ваш отзыв</label>
            <textarea name="feedback-text" id="feedback-text" cols="60" rows="10">{{old('feedback-text')}}</textarea>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-success">Отправить отзыв</button>
    </form>
</div>
    

@endsection