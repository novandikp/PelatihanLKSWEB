@extends("layouts.index")
@section("konten")
<h3>Tambah User</h3>
<form enctype="multipart/form" action="{{url('/user/store')}}" method="post">
    @csrf
    <div class="form-group mt-2">
        <label for="">Nama</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="">Avatar</label>
       <input type="file" name="avatar" class="form-control"/>
    </div>
    <div class="form-group mt-2">
        <label for="">Role</label>
        <select name="role" class="form-control">
            <option value="Developer">Developer</option>
            <option value="Gamer">Gamer</option>
            <option value="Gamer">Publisher</option>
        </select>
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection
