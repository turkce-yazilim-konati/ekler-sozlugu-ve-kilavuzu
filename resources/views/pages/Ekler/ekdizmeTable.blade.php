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
                <th>Onay</th>
                <th>Güngen</th>
                @auth
                    <th>İşlemler</th>
                @endauth
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($ekler as $ek)
                    <tr class="table-light" >
                        <td scope="row">{{$ek->id}}</td>
                        <td> {{ strtolower($ek->ek) }}</td>
                        <td>{{$ek->not}} <br>
                            @if ($ek->kaynak != null)
                                Kaynak : {{$ek->kaynak}}
                            @endif
                        </td>
                        <td> {{$users->find($ek->ekleyen)->name}} </td>
                        <td> @if ($ek->aktif == 1) Onaylı @else Onaysız @endif </td>
                        <td> {{ date('d-m-Y h:i', strtotime($ek->created_at)) }}  </td>

                        @auth
                            <td>
                            @if($user->isAuthority == 0)
                                <a href="{{route('Ekdizme.edit',$ek->id)}}" id="edit" class="btn btn-primary"> Değiştir </a>
                                <a href="{{route('Ekdizme.edit.onayla', $ek->id)}}" id="aktif" value="{{1}}" class="btn btn-success"> Onayla </a>
                                <a href="{{route('Ekdizme.edit.onayla', $ek->id)}}" id="aktif" value="{{0}}" class="btn btn-info"> Onaysıra </a>
                            @endif

                            @if($user->id == $ek->ekleyen)
                                <a href="{{route('Ekdizme.edit',$ek->id)}}" id="edit" class="btn btn-primary"> Değiştir </a>
                            @endif
                        </td>
                        @endauth

                    </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
    </table>
   </div>
