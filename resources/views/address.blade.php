@extends('home')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
       <div class="card">
           <div class="card-body">

         
    <form action="{{ route('addresslist.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <select name="type" class="form-control" id="type">
                    <option value="barangay">Barangay</option>
                    <option value="province">Province</option>
                
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
    </form>
</div>
</div> 
    </div>
</div>
    
@endsection

@section('script')
    <script>
    $("#province").select2();
    </script>
@endsection