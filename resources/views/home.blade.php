@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('activated'))
                            <div class="alert alert-success" role="alert">
                                {{ session('activated') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('update'))
                            <div class="alert alert-success" role="alert">
                                {{ session('update') }}
                            </div>
                        @endif
                        You are logged in!

                        <a href="{{ route('profile') }}">Add Profile</a>

                    </div>
                    <div class="container">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Image</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($profile as $amit)
                                <tr>
                                    <th scope="row">{{ $amit->id}}</th>
                                    <td>{{$amit->name}}</td>
                                    <td>{{$amit->email}}</td>
                                    <td>{{$amit->phone}}</td>
                                    <td>{{$amit->image}}</td>
                                    <td> <img src="{{ asset('images/' . $amit->image)}}" style="height:100px;width:100px;" alt=""></td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('profile_edit', $amit->id)}}">Edit</a>
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
