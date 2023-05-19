@extends('layouts.app')

@section('content')

@auth
    <div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> {{$ek->ek}} </h3>
        </div>
        <div class="card-body">
            @include('layouts.message')

            <form action="{{ route('Ekdizme.edit.post') }}" method="Post">
                @csrf
                <input type="hidden" name="id" value="{{$ek->id}}">

                <div class="mb-3">
                  <label for="" class="form-label">Ek : </label>
                    <input type="text"  name="ek" id="" value="{{$ek->ek}}">

                  <label for="" class="form-label">Not : </label>
                    <input type="text"  name="not" id="" value="{{$ek->not}}">

                  <label for="" class="form-label">Kaynak : </label>
                    <input type="text"  name="kaynak" id="" value="{{$ek->kaynak}}">

                    <button type="submit" class="btn btn-primary"> Güncelle </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endauth

@endsection