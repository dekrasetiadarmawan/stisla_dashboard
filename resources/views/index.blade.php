@extends('layouts.master')

@section('content')

<div class="section-body">
    ini isi content
    {{ Auth::user()->email }}
</div>

@endsection

@push('page-scripts')
    
@endpush

