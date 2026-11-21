@extends('member.layouts.main')
@section('title', 'Create User')
@section('container')



    <!--**********************************
                            Content body start
                        ***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <h4 class="fw-bold text-white py-3 mb-4 text-white">
                <span class="text-white fw-light text-white">{{ config('detailsApp.name') }} /</span> New Registration

            </h4>
            <!-- row -->
            <div class="row" style="min-height: 70vh">
                <div class="col-md-5">
                    @if (session()->has('successMsg'))
                        <div class="card">
                            <div class="card-body">
                                <div class="cp-heading text-center">
                                    <h4 style="color: green">Congratulations !</h4>
                                    <h5>{{ session('name') }}</h5>
                                </div>
                                <div class="cp-body">
                                    <table class="table mt-4 text-start">
                                        <tr>
                                            <th>Memberid</th>
                                            <td>{{ session('userid') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ session('email') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <td>{{ session('password') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Transaction<br> Password</th>
                                            <td>{{ session('txn_password') }}</td>
                                        </tr>
                                    </table>
                                    <a href="{{ url('/member/new-registration') }}"
                                        class="btn btn-primary mt-4 float-end mx-auto">New Registration</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4">Register New User</h4>
                                <form class="forms-sample" method="POST" action="{{ route('createNewUser') }}">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="username" class="form-label">SponsorId</label>
                                        <input type="text" class="form-control" placeholder="Enter SponsorId "
                                            name="sponsor" id="sponsor" minlength="5" maxlength="20" />
                                        <span id="sponhtml"></span>
                                        @error('sponsor')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                        @error('name')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter your email">
                                        @error('email')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Mobile</label>
                                        <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile"
                                            minlength="10" maxlength="10">
                                        @error('mobile')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="mb-1">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter Password">
                                        @error('password')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="mb-1">Transaction Password</label>
                                        <input type="password" class="form-control" name="txn_password"
                                            placeholder="Enter Transaction Password">
                                        @error('txn_password')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-4 form-password-toggle">
                                        <label class="form-label" for="password">Country</label>
                                        <select name="country" class="form-control">
                                            <option class="text-dark" value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option class="text-dark" value="{{ $country['nicename'] }}">
                                                    {{ $country['nicename'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                            <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group ml-5">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" required>
                                            I agree to all Terms & Conditions
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary mt-3 float-end">Register User</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

    <!--**********************************
                            Content body end
                        ***********************************-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.ti-eye-off').on('click', function() {
                var type = $('#password').attr('type');
                if (type == 'password') {
                    $('#password').attr('type', 'text');
                    $('#eye').removeClass('ti-eye-off').addClass('ti-eye')
                } else {
                    $('#password').attr('type', 'password');
                    $('#eye').removeClass('ti-eye').addClass('ti-eye-off')
                }
            })
        });

        $('#sponsor').on('input', function() {
            var sponsor = $(this).val();
            var token = $('#csrfToken').val();
            if (sponsor.length == 0) {
                $('#sponhtml').html('');
            }
            $.ajax({
                url: '/getSponname',
                type: 'POST',
                data: {
                    'sponsorid': sponsor,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {

                    $('#sponhtml').html(response['data'])

                }
            })
        });

        $('#username').on('input', function() {
            var username = $(this).val();
            var token = $('#csrfToken').val();
            if (username.length == 0) {
                $('#userhtml').html('');
            }
            $.ajax({
                url: '/getUsername',
                type: 'POST',
                data: {
                    'username': username,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    $('#userhtml').html(response['data'])
                }
            })
        });
    </script>


@endsection
