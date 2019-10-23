@extends('home')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Admin Profile
                </div>
            </div>
            <div class="card-body">
                    <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="" id="">
                        </div>
                <div class="form-group">
                    <label for="">Name</label>
                <input type="text" value="{{ $user->name ?? "" }}" class="form-control" name="" id="">
                </div>
                <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" value="{{ $user->email ?? "" }}" class="form-control" name="" id="">
                    </div>
                    <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="" id="">
                        </div>
                        <div class="form-group text-right mt-5">
                            <button class="btn btn-primary">Update</button>
                            </div>
            </div>a
        </div>
    </div>
</div>

    
@endsection
@section('script')

@endsection