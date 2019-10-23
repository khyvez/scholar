@extends('home')

@section('content')
<div class="row p-5">
    <div class="col-md-4 text-center">
        <h5 class="text-muted">PERSONAL INFORMATION</h5>
        <h2><i class="far fa-fw fa-circle text-primary"></i></h2>

    </div>
    <div class="col-md-4 text-center">
            <h5 class="text-muted">ADDRESS INFORMATION</h5>
        <i class="far fa-fw fa-circle text-secondary"></i>
   
    </div>
    <div class="col-md-4 text-center">
            <h5 class="text-muted">EDUCATIONAL INFORMATION</h5>
        <i class="far fa-fw fa-circle text-secondary"></i>
   
    </div>
   
</div>


<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Personal Information</div>
            </div>
            <div class="card-body">
            <form action="{{ route('student.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="First Name">Last Name</label>
                        <input type="text" name="lastname" id="" class="form-control" placeholder="last name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">First Name</label>
                        <input type="text" name="firstname" id="" class="form-control" placeholder="first name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">Middle Name</label>
                        <input type="text" name="middlename" id="" class="form-control" placeholder="middle name" aria-describedby="helpId">                  
                    </div>
                </div>
                <div class="form-group">
                    <label for="Middle Name">Date of Birth</label>
                    <input type="date" name="birthdate" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                        <label for="First Name">Gender</label>
                        <select name="gender" id="" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
    
                    </div>
             
                <div class="form-group">
                    <label for="First Name">Place of Birth</label>
                    <input type="text" name="birthplace" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                        <label for="First Name">Contact</label>
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                <div class="form-group">
                    <label for="First Name">Email Address</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="row px-2">
                    <div class="text-muted">Father</div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="First Name">Last Name</label>
                        <input type="text" name="flastname" id="" class="form-control" placeholder="last name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">First Name</label>
                        <input type="text" name="ffirstname" id="" class="form-control" placeholder="first name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">Middle Name</label>
                        <input type="text" name="fmiddlename" id="" class="form-control" placeholder="middle name" aria-describedby="helpId">                  
                    </div>
                </div>
                <div class="row px-2">
                    <div class="text-muted">Mother</div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="First Name">Last Name</label>
                        <input type="text" name="mlastname" id="" class="form-control" placeholder="last name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">First Name</label>
                        <input type="text" name="mfirstname" id="" class="form-control" placeholder="first name" aria-describedby="helpId">                  
                    </div>
                    <div class="col-md-4">
                        <label for="First Name">Middle Name</label>
                        <input type="text" name="mmiddlename" id="" class="form-control" placeholder="middle name" aria-describedby="helpId">                  
                    </div>
                </div>
            
                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Save & Next</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>

    
@endsection

@section('script')
    <script>
    $("#contact").inputmask({"mask": "(9999) 9999999"});
    </script>
@endsection