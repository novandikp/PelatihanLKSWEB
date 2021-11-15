@extends("layouts.index")
@section("konten")
<h3>Detail User</h3>

    <img src="{{asset('assets/images/avatar/'.$user->avatar)}}"   alt="" width="100px">

    <div class="form-group mt-2">
        <label for="">Nama</label>
        <input readonly type="text" name="name" value={{$user->name}} class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="">Email</label>
        <input readonly type="text" name="email" value={{$user->email}} class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="">Role</label>
        <select readonly disabled name="role" class="form-control">
            <option {{$user->role == 'Developer' ? 'selected': '' }} value="Developer">Developer</option>
            <option {{$user->role == 'Gamer' ? 'selected': '' }} value="Gamer">Gamer</option>
            <option {{$user->role == 'Publisher' ? 'selected': '' }} value="Publisher">Publisher</option>
        </select>
    </div>

@endsection
