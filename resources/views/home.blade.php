@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @include('shared.alert')

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
