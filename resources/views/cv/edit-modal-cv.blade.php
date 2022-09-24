@extends('layouts.edit-modal')
@section('titleName','Edit CV')
@section('modal-body')        
<div class="modal-body">
  <form action="" id="edit-cv">
      @csrf
      <input type="hidden" name="edit-id" id="edit-id">
      <div class="form-group">
          <label for="edit-cvName">CV Name</label>
          <input type="text" name="edit-cvName" id="edit-cvName" class="form-control">
          <small class="form-text text-danger" id="cvName-error-edit"></small>
      </div>
@endsection