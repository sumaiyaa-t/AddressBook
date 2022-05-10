@extends('layouts.app')
@section('content')
    <div class="mt-5 p-5">
        <h1 class="text-center">Welcome to Address Book. </h1>
        <div class="text-center">
            <a class="btn btn-success" type="button" href={{ route('address.index') }}>Explore</a>
        </div>
    </div>
@endsection



