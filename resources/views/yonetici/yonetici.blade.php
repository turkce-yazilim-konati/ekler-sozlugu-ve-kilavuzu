@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Onay Bekleyen</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped
                table-hover	
                table-borderless
                table-primary
                align-middle">
                    <thead class="table-primary">
                        <caption>Ek Yığma Dizesi</caption>
                        <tr>
                            <th>Sayı</th>
                            <th>Ek</th>
                            <th>Not ve Kaynak</th>
                            <th>Ekleyen</th>
                            <th>Güngen</th>
                            @auth
                                <th>İşlemler</th>
                            @endauth
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($ekler as $ek)
                            @if ($ek->aktif == 0)
                                <tr class="table-light" >
                                    <td scope="row">{{$ek->id}}</td>
                                    <td> {{ strtolower($ek->ek) }}</td>
    
                                    <td>{{$ek->not}} <br> 
                                        @if ($ek->kaynak != null)
                                            Kaynak : {{$ek->kaynak}} 
                                        @endif
                                    </td>
    
                                    <td> {{$users->find($ek->ekleyen)->name}} </td>
                                    <td> {{ date('d-m-Y h:i', strtotime($ek->created_at)) }}  </td>
    
                                    @if ($ek->ekleyen == $user->id || $user->isAuthority == 0)
                                        <td> 
                                            <a href="{{route('Ekdizme.edit',$ek->id)}}" id="edit" class="btn btn-primary"> Değiştir </a> 
                                            <a href="{{route('Ekdizme.edit',$ek->id)}}" id="edit" class="btn btn-primary"> Onayla </a>
                                        </td>
                                    @else
                                        <td>Bildir</td>
                                    @endif
                                    
                                </tr>
                            @endif
                            
                            @endforeach
                           
    
                        </tbody>
                        <tfoot>
                            
                        </tfoot>
                </table>
               </div>
        </div>
    </div>
</div>

@endsection