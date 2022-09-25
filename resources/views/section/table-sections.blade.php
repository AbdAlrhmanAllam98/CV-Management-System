<div class="add-section d-flex justify-content-around my-3">
    <h2>{{request()->route()->uri()=='sections'?"All Sections":"CV ($cv->cvName) Sections"}}</h2>
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addModal">
        {{request()->route()->uri()=='sections'?"Add Section":"Add Section for ($cv->cvName)"}}
    </button>
</div>
<hr>
<div class="col-12">
    <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th scope="col">Section Title</th>
            <th scope="col">Cv Name</th>
            <th scope="col">User Email</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @if ($sections->count()!==0)
            @foreach ($sections as $section)
                <tr id="{{$section->id}}">
                    <td>{{$section->sectionTitle}}</td>
                    <td>
                        {{optional($section->cv)->cvName}}
                    </td>
                    <td>
                        {{optional($section->cv)->userEmail}}
                    </td>
                    <td>
                        <a href="" onclick="editSection({{$section->id}})" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="deleteSection({{$section->id}})" class="btn btn-danger rounded-0">Delete</a>
                    </td>
                </tr>
            @endforeach
            @else
            <div class="alert alert-danger text-center" id="no-data">No Data Found</div>
            @endif
        </tbody>
    </table>
</div>
@if(request()->route()->uri()==='sections')
<div class="pagination">
    {{$sections->render("pagination::default")}}
</div>
@endif