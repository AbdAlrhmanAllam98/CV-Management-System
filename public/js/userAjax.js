$('#add-user').on('submit',function(e){
    e.preventDefault();
    $('.form-text.text-danger').text("");
    let _token=$('input[name=_token]').val();
    let userName=$('#add-userName').val();
    let email=$('#add-email').val();
    $.ajax({
        url:"/user/add",
        type:'post',
        data:{
            _token:_token,
            userName:userName,
            email:email
        },
        success:function(response){
            if(response){
                toastr.success("User is Added !! ");
                $('#table tbody').append(`<tr id="${response.id}">
                                            <td>${response.userName}</td>
                                            <td>${response.email}</td>
                                            <td><a href="/user/cvs/${response.id}">0</a></td>
                                            <td><a href="javascript:void(0)" onclick="editUser(${response.id})" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#editModal">Edit</a></td>
                                            <td><a href="javascript:void(0)" onclick="deleteUser(${response.id})" class="btn btn-danger rounded-0">Delete</a></td>
                                          </tr>`);
                $('#add-user')[0].reset();
                $('#no-data').remove();
                $('#addModal').modal('toggle');
            }
        },
        error:function(reject){
            toastr.error("User isn`t Added !! ");
            response=JSON.parse(reject.responseText);
            $.each(response.errors,function(key,value){
                $(`#${key}-error-add`).text(value);
            });
        }
    });
});


function editUser(id){
    $.get(`/user/edit/${id}`,function(user){
        $('#edit-id').val(user.id);
        $('#edit-userName').val(user.userName);
        $('#edit-email').val(user.email);
        $('#editModal').modal('toggle');
    })
}
$('#edit-user').on('submit',function(e){
    e.preventDefault();
    let _token=$('input[name=_token]').val();
    let id=$('#edit-id').val();
    let userName=$('#edit-userName').val();
    let email=$('#edit-email').val();
    $.ajax({
        url: `/user/edit/${id}`,
        type:'PUT',
        data:{
            _token:_token,
            id:id,
            userName:userName,
            email:email
        },
        success:function(response){
            if(response){
                $('#table tbody #'+id+' td:nth(0)').html(response.userName);
                $('#table tbody #'+id+' td:nth(1)').html(response.email);
                $('#editModal').modal('toggle');
                }
            },
            error:function(reject){
                toastr.error("User isn`t Updated !! ");
                response=JSON.parse(reject.responseText);
                $.each(response.errors,function(key,value){
                    $(`#${key}-error-edit`).text(value[0]);
                });
            }
    });
});

// Delete Post
function deleteUser(id){
    if(confirm("Are You want to delete this User ?")){
        $.ajax({
            url:`/user/delete/${id}`,
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