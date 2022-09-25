$('#add-cv').on('submit',function(e){
    e.preventDefault();
    $('.form-text.text-danger').text("");
    let _token=$('input[name=_token]').val();
    let cvName=$('#add-cvName').val();
    let userEmail=$('#add-userEmail').val();
    $.ajax({
        url:"/cv/add",
        type:'post',
        data:{
            _token:_token,
            cvName:cvName,
            userEmail:userEmail
        },
        success:function(response){
            if(response){
                toastr.success("CV is Added !! ");
                $('#table tbody').append(`<tr id="${response.id}">
                                            <td>${response.cvName}</td>
                                            <td>${response.userEmail}</td>
                                            <td><a href="/cv/sections/${response.id}">0</a></td>
                                            <td><a href="javascript:void(0)" onclick="editCV(${response.id})" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#editModal">Edit</a></td>
                                            <td><a href="javascript:void(0)" onclick="deleteCV(${response.id})" class="btn btn-danger rounded-0">Delete</a></td>
                                          </tr>`);
                $('#add-cv')[0].reset();
                $('#no-data').remove();
                $('#addModal').modal('toggle');
            }
        },
        error:function(reject){
            toastr.error("CV isn`t Added !! ");
            response=JSON.parse(reject.responseText);
            $.each(response.errors,function(key,value){
                $(`#${key}-error-add`).text(value);
            });
        }
    });
});


function editCV(id){
    $.get(`/cv/edit/${id}`,function(cv){
        $('#edit-id').val(cv.id);
        $('#edit-cvName').val(cv.cvName);
        $('#edit-userEmail').val(cv.userEmail);
        $('#editModal').modal('toggle');
    })
}
$('#edit-cv').on('submit',function(e){
    e.preventDefault();
    let _token=$('input[name=_token]').val();
    let id=$('#edit-id').val();
    let cvName=$('#edit-cvName').val();
    $.ajax({
        url: `/cv/edit/${id}`,
        type:'PUT',
        data:{
            _token:_token,
            id:id,
            cvName:cvName,
        },
        success:function(response){
            if(response){
                $('#table tbody #'+id+' td:nth(0)').html(response.cvName);
                $('#editModal').modal('toggle');
                }
            },
            error:function(reject){
                toastr.error("CV isn`t Updated !! ");
                response=JSON.parse(reject.responseText);
                console.log(reject.responseText);
                $.each(response.errors,function(key,value){
                    $(`#${key}-error-edit`).text(value[0]);
                });
            }
    });
});

// Delete Post
function deleteCV(id){
    if(confirm("Are You want to delete the CV ?")){
        $.ajax({
            url:`/cv/delete/${id}`,
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