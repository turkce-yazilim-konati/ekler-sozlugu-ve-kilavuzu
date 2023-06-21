@extends('layouts.app')

@section('content')
    <!-- <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"> Ek Yığma Dizmesi</h2>
                        </div>
                        <div class="card-body">
                            {{-- @include('layouts.message') --}}

                            {{-- @include('pages.Ekler.eklerForm') --}}

                        </div>
                    </div>

                    {{-- @include('pages.Ekler.ekdizmeTable') --}}

                </div> -->

    <div>
        <h1 style="margin: 0 0 20px 0;">Ek Yığma Dizmesi</h1>

        <div>
            <form action="{{ route('ek.ekle') }}" method="post">
                <label for="">Ek: </label><input type="text" name="ek">
                <label for="">Not: </label><input type="text" name="not">
                <label for="">Kaynak: </label><input type="text" name="kaynak">

                <button type="submit">EKLE</button>
            </form>
        </div>

        @foreach ($ekler as $ek)
            <div class="bilgi-1 esnek">
                <div class="ek (1/1)">
                    <div class="içerik">
                        {{ $ek->ek }}
                    </div>
                    <div class="id">
                        #{{ $ek->id }}
                        @if ($ek->aktif == 1)
                            <span class="onaylı">
                                ✔
                            </span>
                        @endif
                    </div>
                    <div class="sürüm">
                        Sürümü: <a href="#">0.0.0</a>
                    </div>
                    <div class="(0)" style="margin-left: auto;">
                        <input id="{{ $ek->id }}-basmacayı-aç" type="radio" name="{{ $ek->id }}-tr">
                        <label for="{{ $ek->id }}-basmacayı-aç"><button type="button">AÇ</button></label>
                        <label for="{{ $ek->id }}-basmacayı-kapa"><button type="button">YUM</button></label>
                    </div>

                </div>


                <input id="{{ $ek->id }}-basmacayı-kapa" type="radio" name="{{ $ek->id }}-tr" checked="">
                <div class="(1/1)">
                    <div class="icerik esnek (1/1)">
                        <div class="(0)">{{ $ek->not }}</div>
                    </div>
                    <div class="ekleme-bilgileri esnek (1/1)">
                        <div class="ekleyen (0)">
                            <img src="./assets/image/ak giysili gözlüklü müslüman kadın.png" alt="">
                            <span> {{ $users->find($ek->ekleyen)->name }} </span>
                        </div>
                        <div class="(0)">
                            <yıl>2023</yıl>.<ay>03</ay>.<gün>10</gün>
                            <günadı>Cuma</günadı>, <saat>14</saat>:<dakika>06</dakika>:<saniye>59</saniye>
                        </div>
                        <div class="düğmeler esnek (0)">

                            @auth
                                @if ($user->isAuthority == 0)
                                    <a href="{{ route('Ekdizme.edit', $ek->id) }}"><button id="edit">
                                            Değiştir </button> </a>
                                    @if ($ek->aktif == 0)
                                        <a href="{{ route('Ekdizme.edit.onayla', $ek->id) }}"> <button id="aktif"
                                                value="{{ 1 }}"> Onayla </button> </a>
                                    @else
                                        <a href="{{ route('Ekdizme.edit.onayla', $ek->id) }}"> <button id="aktif"
                                                value="{{ 0 }}"> Onaysıra </button> </a>
                                    @endif
                                    <a href="#"> <button id="aktif" class="bg-danger" value="{{ 0 }}">
                                            Sil </button> </a>
                                @endif

                                @if ($user->id == $ek->ekleyen && $user->isAuthority == 1)
                                    <a href="{{ route('Ekdizme.edit', $ek->id) }}"> <button id="edit">
                                            Değiştir </button> </a>
                                    <a href="#"> <button id="aktif" class="bg-danger" value="{{ 0 }}">
                                            Sil </button> </a>
                                @endif
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        @endforeach



    </div>
@endsection
