@extends("layouts.index")
@section("konten")
    <div class="card p-5 my-auto">
        <h3>Login</h3>
        @if(count($errors) > 0)
        <div class="alert alert-danger my-2">

                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach

        </div>
        @endif
        <form method="post" action="{{url("/auth")}}" action="">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder=""/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder=""/>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
