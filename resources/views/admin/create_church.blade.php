@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Church</div>
            </div>
            <div class="card-body">
            <form action="{{ route('church.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="First Name">Church Name</label>
                  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="Middle Name">Address</label>
                    <input type="text" name="address" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

    
@endsection