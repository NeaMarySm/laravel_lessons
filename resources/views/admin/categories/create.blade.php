
@extends('layouts.admin')

@section('title')
    @parent - Добавление категории
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
</div>
<div class="raw">
    @include('inc.messages')
    <form action="{{route('admin.categories.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control @if($errors->has('title')) alert-danger @endif" name="title" id="title">
            @error('title')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>   
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control @if($errors->has('description')) alert-danger @endif" name="description" id="description"></textarea>
            @error('title')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div> 
        <br>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>

@endsection