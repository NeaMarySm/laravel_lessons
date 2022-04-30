@extends('layouts.admin')
@section('title')
    @parent - Добавление новости
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      </div>
    </div>
</div>
<div class="raw">
    @include('inc.messages')
    <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control @if($errors->has('title')) alert-danger @endif" name="title" id="title" value="{{old('title')}}">
            @error('title')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div> 
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select class="form-control" name="category_id" id="category_id">
                @foreach ($categories as $category)
                <option value="{{$category->id}}" 
                    @if(old('category_id') === $category->id) selected @endif>{{$category->title}}</option>  
                @endforeach
            </select>
            
        </div> 
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" class="form-control @if($errors->has('author')) alert-danger @endif" name="author" id="author" value="{{old('author')}}">
            @error('author')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>  
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if(old('status')==='DRAFT') selected @endif>DRAFT</option>
                <option @if(old('status')==='ACTIVE') selected @endif>ACTIVE</option>
                <option @if(old('status')==='BLOCKED') selected @endif>BLOCKED</option>
            </select>  
        </div> 
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" name="image" id="image" value="{{old('image')}}">
        </div> 
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{{old('description')}}</textarea>
        </div> 
        <br>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>

@endsection

@push('js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script type="text/javascript">
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
      };

    CKEDITOR.replace('description', options);
</script>

    
@endpush