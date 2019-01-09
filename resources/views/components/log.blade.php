<div class="col-md-6">
    <div class="card">
        <div class="card-header">@lang('log.log')</div>

        <table class="table mb-0">
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
                            {{ str_limit($log->ip_address, 20, ' (...)') }}
                        </td>
                        <td title="{{ $log->created_at }}">
                            {{ $log->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
