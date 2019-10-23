@extends('home')

@section('content')
<div class="row p-5">
    <div class="col-md-4 text-center">
        <h5 class="text-muted">Personal Information</h5>
       <i class="fas fa-fw fa-circle text-success"></i>

    </div>
    <div class="col-md-4 text-center">
            <h5 class="text-muted">Address Information</h5>
            <h2><i class="far fa-circle text-primary"></i></h2>
   
    </div>
    <div class="col-md-4 text-center">
            <h5 class="text-muted">Educational Information</h5>
        <i class="far fa-fw fa-circle text-secondary"></i>
   
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Address Information</div>
            </div>
            <div class="card-body">
            <form action="{{ route('address.store')}}" method="POST">
                @csrf
              
                <div class="form-group">
                    <label for="Middle Name">House #</label>
                    <input type="text" name="houseno" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
               
             
                <div class="form-group">
                    <label for="First Name">Street</label>
                    <input type="text" name="street" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="First Name">Barangay</label>
                      
                          <select class="form-control" name="barangay" id="barangay">
                            @foreach ($barangay as $brgy)
                                <option value="{{ $brgy->name}}">{{ $brgy->name}}</option>
                        
                            @endforeach
                          </select>
                    
                    </div>
                    <div class="col-md-6">
                        <label for="First Name">Municipality</label>
                        <select  class="form-control" name="municipality" id="municipality">
                            <option value="Bato">Bato</option>
                            <option value="Bagamanoc">Bagamanoc</option>
                            <option value="Caramoran">Caramoran</option>
                            <option value="Pandan">Pandan</option>
                            <option value="Panganiban">Panganiban</option>
                            <option value="San Andres">San Andres</option>
                            <option value="Virac">Virac</option>
                          </select>
                    </div>
                </div>
                <div class="form-group row">
                        <div class="col-md-6">
                            <label for="First Name">Province</label>
                      
                            <select class="form-control" name="province" id="province">
                                @foreach ($province as $prov)
                                    <option value="{{ $prov->name}}">{{ $prov->name}}</option>
                            
                                @endforeach
                              </select>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="First Name">Zip Code</label>
                          
                            <select  class="form-control" name="zipcode" id="zipcode">
                                <option value="4800">4800</option>
                                <option value="4800">4801</option>
                                <option value="4800">4802</option>
                                <option value="4800">4803</option>
                                <option value="4800">4804</option>
                                <option value="4800">4805</option>
                                <option value="4800">4806</option>
                                <option value="4800">4807</option>
                                <option value="4800">4808</option>
                                <option value="4800">4809</option>

                              </select>
                        </div>
                    <input type="hidden" name="student_id" id="" value="{{ $id }}" class="form-control" placeholder="" aria-describedby="helpId">
                       
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
    $("#barangay").select2();
    $("#province").select2();
    </script>
@endsection