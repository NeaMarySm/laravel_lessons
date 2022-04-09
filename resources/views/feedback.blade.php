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
            <input type="text" class="form-control @if($errors->has('username')) alert-danger @endif" name="username" value="{{old('username')}}">
            @error('username')
              <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <br>
          <input type="email" class="form-control @if($errors->has('email')) alert-danger @endif" name="email" value="{{old('email')}}">
          @error('email')
              <span style="color: red;">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
            <label for="feedback-text">Ваш отзыв</label>
            <textarea name="feedback-text" class="form-control @if($errors->has('feedback-text')) alert-danger @endif" id="feedback-text" cols="60" rows="10">{{old('feedback-text')}}</textarea>
            @error('feedback-text')
              <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-success">Отправить отзыв</button>
    </form>
</div>
    

@endsection