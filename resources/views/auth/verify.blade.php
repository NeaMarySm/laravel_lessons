@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите свой Email адрес') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Новое письмо с подтверждением была отправлена на ваш Email адрес') }}
                        </div>
                    @endif

                    {{ __('Перед тем, как продолжить, проверьте свою почту, чтобы подтвердить свой Email адрес ') }}
                    {{ __('Если вы не получили письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь, чтобы отправить новое') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
