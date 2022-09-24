$('#add-section').on('submit',function(e){
    e.preventDefault();
    $('.form-text.text-danger').text("");
    let _token=$('input[name=_token]').val();
    let sectionTitle=$('#add-sectionTitle').val();
    let cvName=$('#add-cvName').val();
    $.ajax({
        url:"/section/add",
        type:'post',
        data:{
            _token:_token,
            sectionTitle:sectionTitle,
            cvName:cvName
        },
        success:function(response){
            if(response){
                toastr.success("Section is Added !! ");
                $('#table tbody').append(`<tr id="${response[0].id}">
                                            <td>${response[0].sectionTitle}</td>
                                            <td>${response[1].cvName}</td>
                                            <td>${response[1].userEmail}</td>                                            
                                            <td><a href="javascript:void(0)" onclick="editSection(${response[0].id})" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#editModal">Edit</a></td>
                                            <td><a href="javascript:void(0)" onclick="deleteSection(${response[0].id})" class="btn btn-danger rounded-0">Delete</a></td>
                                          </tr>`);
                $('#add-section')[0].reset();
                $('#no-data').remove();
                $('#addModal').modal('toggle');
            }
        },
        error:function(reject){
            toastr.error("Section isn`t Added !! ");
            response=JSON.parse(reject.responseText);
            $.each(response.errors,function(key,value){
                $(`#${key}-error-add`).text(value);
            });
        }
    });
});


function editSection(id){
    $.get(`/section/edit/${id}`,function(section){
        $('#edit-id').val(section[0].id);
        $('#edit-sectionTitle').val(section[0].sectionTitle);
        $('#edit-cvName').val(section[1].cvName);
        $('#editModal').modal('toggle');
    })
}
$('#edit-section').on('submit',function(e){
    e.preventDefault();
    let _token=$('input[name=_token]').val();
    let id=$('#edit-id').val();
    let sectionTitle=$('#edit-sectionTitle').val();
    let cvName=$('#edit-cvName').val();
    $.ajax({
        url: `/section/edit/${id}`,
        type:'PUT',
        data:{
            _token:_token,
            id:id,
            sectionTitle:sectionTitle,
            cvName:cvName
        },
        success:function(response){
            if(response){
                $('#table tbody #'+id+' td:nth(0)').html(response.sectionTitle);
                $('#table tbody #'+id+' td:nth(1)').html(response.cvName);
                $('#editModal').modal('toggle');
                }
            },
            error:function(reject){
                toastr.error("Section isn`t Updated !! ");
                response=JSON.parse(reject.responseText);
                $.each(response.errors,function(key,value){
                    $(`#${key}-error-edit`).text(value[0]);
                });
            }
    });
});

// Delete Post
function deleteSection(id){
    if(confirm("Are You want to delete this Section ?")){
        $.ajax({
            url:`/section/delete/${id}`,
            type:'DELETE',
            data:{
                _token:$('input[name=_token]').val(),
            },
            success:function(response){
                if(response){
                    $('#table tbody #'+id).remove();
                    let count=$('#table tbody tr').length;
                    if(count===0){
                        $('#table').html('<div class="alert alert-danger text-center">No Data Found</div>');
                    }
                }
            }
        });
    }
}