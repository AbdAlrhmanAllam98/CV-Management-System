@extends('layouts.general-layout')
@section('title','All Sections')
@section('body')
<div class="container">
    <div class="row">
        @include('section.table-sections')
    </div>
</div>
@include('section.edit-modal-section')
@if(request()->route()->uri()==='sections')
@include('section.add-modal-section')
@else
@include('section.add-modal-cv-section')
@endif
@endsection
@push('js')
    <script src="{{asset('js/sectionAjax.js')}}"></script>
@endpush