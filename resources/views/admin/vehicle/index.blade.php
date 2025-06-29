@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Starter  @endslot
@endcomponent
@livewire('vehicle.list-vehicles')
@endsection
@section('script')
{{-- @script
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function (){
        $('.js-example-basic-single').select2({
            // theme: 'bootstrap-5',
            placeholder: 'Select item',
            dropdownParent: $('#myModal'),
        });

        $('#brand_id').on('change',function(){
            let data = $(this).val();
            console.log(data);
            $wire.brandId = data;
        })

        $('#vehicle_type').on('change',function(){
            let data = $(this).val();
            console.log(data);
            this.$wire.vehicle_type = data;
        })
    })
</script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endscript --}}

@endsection
