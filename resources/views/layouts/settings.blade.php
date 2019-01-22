@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="list-group">
                <a href="{{ route('settings.account.show') }}" class="list-group-item list-group-item-action">
                    👤 @lang('settings.account')
                </a>
                <a href="{{ route('settings.security') }}" class="list-group-item list-group-item-action">
                    🔒 @lang('settings.security')
                </a>
            </div>
        </div>
        <div class="col-md-8">
            @include('shared.alert')

            <div class="card">
                <div class="card-header">@yield('title')</div>

                @yield('setting')
            </div>
        </div>
    </div>
</div>
@endsection
