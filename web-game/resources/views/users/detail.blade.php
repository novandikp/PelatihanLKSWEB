@extends("layouts.index")
@section("konten")
<h3>Detail User</h3>

    <img class="img-thumbnail"  alt="">
    <div class="form-group mt-2">
        <label for="">Nama</label>
        <input  disabled type="text" name="name" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="">Email</label>
        <input disabled type="text" name="email" class="form-control">
    </div>


    <div class="form-group mt-2" disabled>
        <label for="">Role</label>
        <select name="role" class="form-control">
            <option value="Developer">Developer</option>
            <option value="Gamer">Gamer</option>
            <option value="Gamer">Publisher</option>
        </select>
    </div>

@endsection
