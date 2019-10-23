@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Church</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Church Name</th>
                            <th>Address </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($churches as $church)
                            <tr>
                                <td>{{$church->name}}</td>
                                <td>{{$church->address}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>