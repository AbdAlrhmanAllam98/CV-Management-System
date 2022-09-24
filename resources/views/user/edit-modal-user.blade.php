@extends('layouts.edit-modal')
@section('titleName','Edit User')
@section('modal-body')
<div class="modal-body">
  <form action="" id="edit-user">
      @csrf
      <input type="hidden" name="edit-id" id="edit-id">
      <div class="form-group">
          <label for="edit-userName">User Name</label>
          <input type="text" name="edit-userName" id="edit-userName" class="form-control">
          <small class="form-text text-danger" id="userName-error-edit"></small>
      </div>
      <div class="form-group">
          <label for="edit-email">Email</label>
          <input type="text" name="edit-email" id="edit-email" class="form-control" disabled>
          <small class="form-text text-danger" id="email-error-edit"></small>
      </div>
@endsection