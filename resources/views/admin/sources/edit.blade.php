@extends('layouts.admin')
@section('title')Редактировать данные
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать запись {{$source->id}}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
</div>
<div class="raw">
    <form action="{{route('admin.sources.update', ['source'=>$source])}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Источник</label>
            <br>
            <input type="text" class="form-control @if($errors->has('name')) alert-danger @endif" name="name" id="name" value="{{$source->name}}">
            @error('name')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <br>
            <input type="url" class="form-control @if($errors->has('url')) alert-danger @endif" name="url" id="url" value="{{$source->url}}">
            @error('url')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>

@endsection