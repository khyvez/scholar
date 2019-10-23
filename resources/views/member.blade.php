@extends('home')

@section('content')

<a href="/member/create" class="btn btn-primary">Add New</a>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Members</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Gender </th>
                            <th>Marital Status</th>
                            <th>Birth Date</th>
                            <th>Residence</th>
                            <th>Birth Place</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                        <tr>
                            <td>{{$member->firstname}}</td>
                            <td>{{$member->gender}}</td>
                            <td>{{$member->status}}</td>
                            <td>{{$member->birthdate}}</td>
                            <td>{{$member->residence}}</td>
                            <td>{{$member->birthplace}}</td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection