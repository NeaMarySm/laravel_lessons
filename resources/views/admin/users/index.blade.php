@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список пользователей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{route('admin.users.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить пользователя</a>
      </div>
    </div>
</div>
@include('inc.messages')
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#ID</th>
        <th>Имя</th>
        <th>Email</th>
        <th>Подтвержден</th>
        <th>Дата создания</th>
        <th>Дата обновления</th>
        <th>Статус</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
              @if ($user->email_verified)
                  Да
              @else
                  Нет
              @endif
            </td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>@if ($user->is_admin == true)
                Админ
            @else
                Обыватель
                <form action="{{route('admin.users.update', ['user' => $user])}}" method="post">
                  @csrf
                  @method('put')
                  <button type="submit" class="btn-toolbar mb-2 mb-md-0" name="admin" value="true">Сделать админом</button>
                </form>
            @endif
          </tr>
      @empty
          <tr><td colspan="4">Записей нет</td></tr>
      @endforelse
    </tbody>
  </table>
  {{ $users->links()}}
</div>
@endsection