@extends('home')

@section('content')
<div class="row p-5">
    <div class="col-md-4 text-center">
        <h5 class="text-muted">Personal Information</h5>
       <i class="fas fa-fw fa-circle text-success"></i>

    </div>
    <div class="col-md-4 text-center">
            <h5 class="text-muted">Address Information</h5>
            <i class="fas fa-circle text-success"></i>
   
    </div>
    <div class="col-md-4 text-center">
            <h5 class="text-muted">Educational Information</h5>
        <h2><i class="far fa-fw fa-circle text-primary"></i></h2>
   
    </div>
</div>
<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Educational Information</div>
            </div>
           
            <div class="row">
                <div class="col">
                        <form action="{{ route('education.store')}}" method="POST">
                                @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th>LEVEL</th>
                                <th>NAME OF SCHOOL</th>
                                <th>BASIC EDUCATION</th>
                                <th>PERIOD</th>
                                <th>HIGHEST DEGREE</th>
                                <th>YEAR GRADUATED</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">ELEMENTARY</td>
                                <td><input type="text" name="name1" class="form-control" id=""> </td>
                                <td><input type="text" name="course1" class="form-control" id=""> </td>
                                <td>
                                  <div class="d-flex">
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" name="period_from1" id="">
                                            <option></option>
                                            
                                          </select>
                                      
                                      </div>
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" name="period_to1" id="">
                                            <option></option>
                                         
                                          </select>
                                      
                                    </div>
                                  </div>
                                  
                                </td>
                                <td><input type="text" name="degree1" class="form-control" id=""> </td>
                                <td> <select class="form-control yeardrop" name="graduate1" id="">
                                    <option></option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                                <td scope="row">HIGH SCHOOL</td>
                                <td><input type="text" name="name2" class="form-control" id=""> </td>
                                <td><input type="text" name="course2" class="form-control" id=""> </td>
                                <td>
                                  <div class="d-flex">
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" name="period_from2" id="">
                                            <option></option>
                                            
                                          </select>
                                      
                                      </div>
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" name="period_to2" id="">
                                            <option></option>
                                         
                                          </select>
                                      
                                    </div>
                                  </div>
                                  
                                </td>
                                <td><input type="text" name="degree2" class="form-control" id=""> </td>
                                <td> <select class="form-control yeardrop" name="graduate2" id="">
                                    <option></option>
                                  </select>
                              </td>
                            </tr>
                            <tr>
                                <td scope="row">COLLEGE</td>
                                <td><input type="text" name="name3" class="form-control" id=""> </td>
                                <td><input type="text" name="course3" class="form-control" id=""> </td>
                                <td>
                                  <div class="d-flex">
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" name="period_from3" id="">
                                            <option></option>
                                            
                                          </select>
                                      
                                      </div>
                                      <div class="flex-item">
                                        <select class="form-control yeardrop" name="period_to3" id="">
                                            <option></option>
                                         
                                          </select>
                                      
                                    </div>
                                  </div>
                                  
                                </td>
                                <td><input type="text" name="degree3" class="form-control" id=""> </td>
                                <td> <select class="form-control yeardrop" name="graduate3" id="">
                                    <option></option>
                                  </select>
                              </td>
                            </tr>
                        </tbody>
                    </table>

                    <input type="hidden" name="student_id" id="" value="{{ $id }}" class="form-control" placeholder="" aria-describedby="helpId">
                       
           
                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                        </form>
                </div>
            </div>
        
        </div>
    </div>

    </div>

    
@endsection

@section('script')
    <script>
    $("#province").select2();
    for (i = new Date().getFullYear(); i > 1900; i--)
{
    $('.yeardrop').append($('<option val="'+ i +'" />').val(i).html(i));
}

    
    </script>
@endsection