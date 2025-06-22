@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Starter  @endslot
@endcomponent
@livewire('brands.list-brands')
@endsection
@section('script')
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
