@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title"> Ek Yığma Dizmesi</h2>
        </div>
        <div class="card-body">
            @include('layouts.message')

            @include('pages.Ekler.eklerForm')

        </div>
    </div>

    @include('pages.Ekler.ekdizmeTable')

</div>

@endsection
