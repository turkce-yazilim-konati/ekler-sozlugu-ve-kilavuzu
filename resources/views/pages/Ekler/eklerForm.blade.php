@auth
    <form action="{{route('ek.ekle')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Ek : </label>
            <input type="text"  name="ek" id=""placeholder="">

            <label for="" class="form-label">Not : </label>
            <input type="text"  name="not" id=""placeholder="">

            <label for="" class="form-label">Kaynak : </label>
            <input type="text"  name="kaynak" id=""placeholder="Belirsiz ise boş bırakın">

            <button type="submit"> Ekle</button>
        </div>
    </form>

@endauth