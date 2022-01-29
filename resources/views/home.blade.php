@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div style="margin-left: 2%">
                    {{ __('Click in the button to check timestamp of now:')}}
                    <div>
                        <form action="{{ route('get_timestamp') }}" method="GET">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-success">Get timestamp</button>
                        </form>
                    </div>
                </div>

                @isset($time)
                <div style="margin-left: 2%">
                    {{ __('Your requisition returned:')}}
                    <div>
                        {{$time}}
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
