@extends('layouts.settings')

@section('title')
    @lang('settings.account')
@endsection

@section('setting')
    <form method="POST" action="{{ route('settings.account.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
        </div>

        <div class="form-group">
            <label for="locale">{{ __('Language') }}</label>
            <select class="form-control{{ $errors->has('locale') ? ' is-invalid' : '' }}" id="locale" name="locale">
                @foreach (__('settings.locales') as $key => $value)
                    <option value="{{ $key }}"{{ App::isLocale($key) ? ' selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>

            @if ($errors->has('locale'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('locale') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group mb-0">
            <button type="submit" class="btn btn-success">
                {{ __('Save') }}
            </button>
        </div>
    </form>
@endsection
