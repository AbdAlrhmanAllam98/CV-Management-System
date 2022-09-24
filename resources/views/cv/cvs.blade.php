@extends('layouts.general-layout')
@section('title','All CVs')
@section('body')
<div class="container">
    <div class="row">
        @include('cv.table-cvs')
    </div>
</div>
@include('cv.edit-modal-cv')
@if(request()->route()->uri()==='cvs')
@include('cv.add-modal-cv')
@else
@include('cv.add-modal-user-cv')
@endif

@endsection
@push('js')
    <script src="{{asset('js/cvAjax.js')}}"></script>
@endpush