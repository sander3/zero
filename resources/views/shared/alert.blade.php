@if (session('status'))
    <div class="alert alert-{{ $type ?? 'success' }} alert-dismissible" role="alert">
        {{ session('status') }}

        <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Close') }}">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
