@extends('layouts.admin')
@section('title')Выгрузка данных
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Форма для выгрузки данных</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
</div>
<div class="raw">
    <form action="{{route('source.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Источник</label>
            <br>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <br>
            <input type="url" class="form-control" name="url" id="url" value="{{old('url')}}">
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-success">Выгрузить</button>
    </form>
</div>

@endsection