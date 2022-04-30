@extends('layouts.admin')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список источников</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <a href="{{route('admin.parser.index')}}" type="button" class="btn btn-sm btn-outline-secondary">Выгрузить все новости</a>
      </div>
      <div class="btn-group me-2">
        <a href="{{route('admin.sources.create')}}" type="button" class="btn btn-sm btn-outline-secondary">Добавить источник</a>
      </div>
    </div>
</div>
@include('inc.messages')
<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#ID</th>
        <th>Источник</th>
        <th>Url</th>
        <th colspan="3">Действия</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($sources as $source)
          <tr>
            <td>{{$source->id}}</td>
            <td>{{$source->name}}</td>
            <td>{{$source->url}}</td>
            <td>
              <form action="{{route('admin.parser.store')}}" method="post">
                @csrf
                <input type="hidden" value="{{$source->id}}" name="id" id="id">
                <input type="hidden" value="{{$source->url}}" name="url" id="url">
                <input type="hidden" value="{{$source->name}}" name="name" id="name">
                <button type="submit"> Выгрузить новости</button>
              </form>
            </td>
            <td>
              <a href="{{route('admin.sources.edit', ['source' => $source])}}">Ред.</a>
            </td>
            <td>
              <a href="javascript:;" class="delete" rel="{{ $source->id }}" style="color:red;">Удл.</a>
            </td>
          </tr>
      @empty
          <tr><td colspan="6">Записей нет</td></tr>
      @endforelse
    </tbody>
  </table>
   {{ $sources->links()}}

  
</div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            el.forEach(function(element, index) {
                element.addEventListener("click", function() {
                    const id = this.getAttribute("rel");
                    if(confirm(`Подтвердите удаление записи с #ID ${id} ?`)) {
                        //send id on backend
                        send(`/admin/sources/${id}`).then(() => {
                            alert("Запись была удалена");
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush