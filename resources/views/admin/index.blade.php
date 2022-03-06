@extends('admin.layout.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Fullname</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col" style="width: 350px;">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Birthdate</th>
            <th scope="col" style="width: 200px;text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$user->fullname}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>{{($user->gender == 1) ? 'Nam' : 'Nữ'}}</td>
                <td>{{$user->birthdate}}</td>
                <td style="padding: 15px 0px 0px 0px">
                    <a href="" class="btn btn-success" style="width: 90px;">Edit</a>
                    <a href="" class="btn btn-danger" style="width: 90px;">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <button type="button"
            class="btn btn-primary"
               style="width: 200px;"
               data-bs-toggle="modal"
               data-bs-target="#myModal">Add user</button>
    <hr>
    {{ $users->links() }}

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('addUser')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Fullname:</label>
                                    <input type="text" class="form-control" name="fullname" value="{{old('fullname')}}">
                                    @error('fullname')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Username:</label>
                                    <input type="text" class="form-control" name="username" value="{{old('username')}}">
                                    @error('username')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Email:</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Password:</label>
                                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Re-password:</label>
                                    <input type="password" class="form-control" name="re-password" value="{{old('re-password')}}">
                                    @error('re-password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Birthdate:</label>
                                    <input type="date" class="form-control" name="birthdate" value="{{old('birthdate')}}">
                                    @error('birthdate')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Address:</label>
                                    <input type="text" class="form-control" name="address" value="{{old('address')}}">
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Avatar:</label>
                                    <input type="file" class="form-control" name="avatar" onchange="previewFile()" id="avatar" value="{{old('avatar')}}">
                                    @error('avatar')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <img id="previewAvatar" width="300px" alt="Avatar preview..." src="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
