<div class="add-user d-flex justify-content-around my-3">
    <h2>All Users</h2>
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">
        Add User
    </button>
</div>
<hr>
<div class="col-12">
    <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">CVs</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @if ($users->count()!==0)
            @foreach ($users as $user)
                <tr id="{{$user->id}}">
                    <td>{{$user->userName}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{url('user/cvs',$user->id)}}">{{$user->cvs->count()}}</a>
                    </td>
                    <td>
                        <a href="" onclick="editUser({{$user->id}})" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="deleteUser({{$user->id}})" class="btn btn-danger rounded-0">Delete</a>
                    </td>
                </tr>
            @endforeach
            @else
            <div class="alert alert-danger text-center" id="no-data">No Data Found</div>
            @endif
        </tbody>
    </table>
</div>