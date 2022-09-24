<div class="add-cv d-flex justify-content-around my-3">
    <h2>{{request()->route()->uri()=='cvs'?"All CVs":"User ($user->userName) CVs"}}</h2>
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">
        {{request()->route()->uri()=='cvs'?"Add CV":"Add CV for ($user->userName)"}}
    </button>
</div>
<hr>
<div class="col-12">
    <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th scope="col">CV Name</th>
            <th scope="col">User Email</th>
            <th scope="col">Sections</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @if ($cvs->count()!==0)
            @foreach ($cvs as $cv)
                <tr id="{{$cv->id}}">
                    <td>{{$cv->cvName}}</td>
                    <td>{{$cv->userEmail}}</td>         
                    <td>
                        <a href="{{url('cv/sections',$cv->id)}}">{{$cv->sections->count()}}</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="editCV({{$cv->id}})" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="deleteCV({{$cv->id}})" class="btn btn-danger rounded-0">Delete</a>
                    </td>
                </tr>
            @endforeach
            @else
            <div class="alert alert-danger text-center">No Data Found</div>
            @endif
        </tbody>
    </table>
</div>