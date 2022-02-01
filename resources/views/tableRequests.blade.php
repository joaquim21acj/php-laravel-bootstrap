@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Requests Made') }}</div>

                <div style="margin-left: 2%">
                @isset($requestsResponse)
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Timestamp</th>
                            <th>User Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requestsResponse as $request)
                        <tr>
                            <td>{{ $request->Id }}</td>
                            <td>{{ $request->Timestamp_request }}</td>
                            <td>{{ $request->UserName }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
