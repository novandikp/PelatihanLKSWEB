@extends("layouts.index")
@section("konten")
<h3>Edit User</h3>
@if(count($errors) > 0)
<div class="alert alert-danger my-2">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form enctype="multipart/form-data" action="{{url('/user/update/'.$user->id)}}" method="post">
    @csrf
    <div class="form-group mt-2">
        <label for="">Nama</label>
        <input type="text" name="name" value={{$user->name}} class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="">Email</label>
        <input type="text" name="email" value={{$user->email}} class="form-control">
    </div>
    <div class="form-group mt-2">
        <label for="">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <img src="{{asset('assets/images/avatar/'.$user->avatar)}}"   alt="" width="100px">
    <div class="form-group mt-2">
        <label for="">Avatar</label>
       <input type="file" name="image" class="form-control"/>
    </div>
    <div class="form-group mt-2">
        <label for="">Role</label>
        <select name="role" class="form-control">
            <option {{$user->role == 'Developer' ? 'selected': '' }} value="Developer">Developer</option>
            <option {{$user->role == 'Gamer' ? 'selected': '' }} value="Gamer">Gamer</option>
            <option {{$user->role == 'Publisher' ? 'selected': '' }} value="Publisher">Publisher</option>
        </select>
    </div>
    <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection
