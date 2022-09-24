@extends('layouts.general-layout')
@section('title','All Users')
@section('body')
<div class="container">
    <div class="row">
        @include('user.table-users')
    </div>
</div>
@include('user.edit-modal-user')
@include('user.add-modal-user')
@endsection
@push('js')
    <script src="{{asset('js/userAjax.js')}}"></script>
@endpush