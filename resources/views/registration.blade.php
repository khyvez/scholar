@extends('home')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Register</div>
            </div>
            <div class="card-body">
            <form action="{{ route('member.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="First Name">First Name</label>
                  <input type="date" name="firstname" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="Middle Name">Middle Name</label>
                    <input type="text" name="middlename" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="First Name">Last Name</label>
                    <input type="text" name="lastname" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="First Name">Ext_Name</label>
                    <input type="text" name="extname" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="First Name">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="First Name">Marital Status</label>
                    <input type="text" name="status" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="First Name">Date of Birth</label>
                    <input type="date" name="birthdate" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="First Name">Residence</label>
                    <input type="text" name="residence" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="First Name">Place of Birth</label>
                    <input type="text" name="birthplace" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="First Name">Username</label>
                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="First Name">Password</label>
                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
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