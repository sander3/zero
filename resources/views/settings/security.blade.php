@extends('layouts.settings')

@section('title')
    @lang('settings.security')
@endsection

@section('setting')
    @component('components.card-body')
        <p class="lead border-bottom">@lang('log.log')</p>
        <table class="table table-bordered mb-0">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">@lang('log.message')</th>
                    <th scope="col">@lang('log.ip_address')</th>
                    <th scope="col">@lang('log.created_at')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->message }}</td>
                        <td title="{{ $log->ip_address }}">
                            {{ Illuminate\Support\Str::limit($log->ip_address, 20, ' (...)') }}
                        </td>
                        <td title="{{ $log->created_at }}">
                            {{ $log->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endcomponent
@endsection
