@extends('layouts.main')
@section('title')Выгрузка данных
@endsection
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">NewsGB</h1>
      <p class="lead text-muted">Форма для выгрузки данных</p>
      <p>
        <a href="{{route('categories')}}" class="btn btn-primary my-2">Категории новостей</a>
        <a href="{{route('news')}}" class="btn btn-primary my-2">Все новости</a>
      </p>
    </div>
  </div>
@endsection

@section('content')
    <form action="{{route('order.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="first-name">Имя</label>
            <br>
            <input type="text" class="form-control" name="first-name" id="first-name" value="{{old('first-name')}}">
        </div>
        <div class="form-group">
            <label for="last-name">Фамилия</label>
            <br>
            <input type="text" class="form-control" name="last-name" id="last-name" value="{{old('last-name')}}">
        </div>
        <div class="form-group">
            <label for="phone-number">Номер телефона</label>
            <br>
            <input type="tel" class="form-control" name="phone-number" id="phone-number" value="{{old('phone-number')}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <br>
            <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="order">Заказ</label>
            <br>
            <input type="url" class="form-control" name="order" id="order" value="{{old('order')}}">
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>

@endsection