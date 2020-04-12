@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="btn-group d-flex" role="group" aria-label="Add product to cart...">
                        <a href="{{ route('add',  ['id' => 1]) }}" class="btn btn-secondary">Product 1</a>
                        <a href="{{ route('add',  ['id' => 2]) }}" class="btn btn-secondary">Product 2</a>
                        <a href="{{ route('add',  ['id' => 3]) }}" class="btn btn-secondary">Product 3</a>
                        <a href="{{ route('add',  ['id' => 4]) }}" class="btn btn-secondary">Product 4</a>
                        <a href="{{ route('add',  ['id' => 5]) }}" class="btn btn-secondary">Product 5</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
