@extends('layouts.edit-modal')
@section('titleName','Edit Section')
@section('modal-body')
<div class="modal-body">
  <form action="" id="edit-section">
      @csrf
      <input type="hidden" name="edit-id" id="edit-id">
      <div class="form-group">
          <label for="edit-sectionTitle">Section Title</label>
          <input type="text" name="edit-sectionTitle" id="edit-sectionTitle" class="form-control">
          <small class="form-text text-danger" id="sectionTitle-error-edit"></small>
      </div>
        <input type="hidden" name="edit-cvName" id="edit-cvName">                   
@endsection