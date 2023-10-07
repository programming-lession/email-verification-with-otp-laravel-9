@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit Profile</h1>
            <form id="form" action="{{ route('profile_update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $edit_profile['id'] }}">
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                        value="{{ $edit_profile->name }}">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                        value="{{ $edit_profile->email }}">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="phone" id="contact" aria-describedby="emailHelp"
                        value="{{ $edit_profile->phone }}">
                </div>
                <div class="form-group">
                    
                    <div>
                        @if ($edit_profile->image)
                            <img src="{{ asset('images/' . $edit_profile->image) }}" alt="Profile Image"
                                style="max-width: 10%;">
                        @endif
                        <br><br>
                        <input type="file" class="form-control" name="image" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>

        </div>
    </div>

    <style>
        .error {
            color: red;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#form').validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    contact: {
                        required: true,
                        rangelength: [10, 12],
                        number: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    name: 'Please enter Name.',
                    email: {
                        required: 'Please enter Email Address.',
                        email: 'Please enter a valid Email Address.',
                    },
                    contact: {
                        required: 'Please enter Contact.',
                        rangelength: 'Contact should be 10 digit number.'
                    },
                    password: {
                        required: 'Please enter Password.',
                        minlength: 'Password must be at least 8 characters long.',
                    },
                    confirmPassword: {
                        required: 'Please enter Confirm Password.',
                        equalTo: 'Confirm Password do not match with Password.',
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
