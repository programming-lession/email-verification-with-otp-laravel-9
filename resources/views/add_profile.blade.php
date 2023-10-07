@extends('layouts.app')
@section('content')
    
    <div class="container">
        <div class="row">
            <h1>Add Profile</h1>
            {{-- <form id="form" action="{{ route('profile_add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"
                        placeholder="Enter Name">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="phone" id="contact" aria-describedby="emailHelp"
                        placeholder="Enter phone">
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="image" multiple="">
                </div>
                <button type="submit" class="btn btn-primary">Add Profile</button>
            </form> --}}

            <form id="form" method="POST" action="{{ route('profile_add') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
              </div>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
              </div>
              <div class="form-group">
                <label for="contact">Phone</label>
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Phone no">
              </div>
              <input type="file" name="image" class="form-control" id="image"
                        aria-describedby="emailHelp" placeholder="image" placeholder="Upload Image">
                        <br>
              <input type="submit" class="btn btn-primary" value="Submit" />
            </form>

        </div>
    </div>




    <style>
      .error {
        color: red;
      }
    </style>
    <script>
      $(document).ready(function () {
        $('#form').validate({
          rules: {
            name: {
              required: true
            },
            email: {
              required: true,
              email: true
            },
            image: {
              required: true,
              image: true
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
            image: {
              required: 'Please Upload Image.',
              image: 'Please Upload Image',
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
          submitHandler: function (form) {
            form.submit();
          }
        });
      });
    </script>
@endsection
