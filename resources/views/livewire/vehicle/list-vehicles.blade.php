<div>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Vehicles</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Vehicle</button>
                            <div id="myModal" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Add Vehicle</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div class="mt-3">
                                                    <h6 class="fw-semibold">Vehicle Brand</h6>
                                                    <select wire:model='brandId' id="brand_id" name="brand_id" class="js-example-basic-single">
                                                        <option value="">Select Brand</option>
                                                        @foreach ($brands as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                                
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-group mt-3">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control" wire:model="vehicle_model" placeholder="Model" aria-label="Brand Name" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="mt-3">
                                                    <h6 class="fw-semibold">Vehicle Type</h6>
                                                    <select class="js-example-basic-single" name="vehicle_type" id="vehicle_type" wire:model='vehicle_type'>
                                                        <option value="">Select Vehicle Type</option>
                                                        @foreach ($vehicle_type_arr as $key => $value)
                                                            <optgroup label="{{$key}}">
                                                                @foreach ($value as $item)
                                                                    
                                                                <option value="{{$item}}">{{$item}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary " wire:click="store" data-bs-dismiss="modal">Save Changes</button>
                                        </div>
        
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col" class="w-20">Model</th>
                                        <th scope="col" class="w-10">Vehicle Type</th>
                                        <th scope="col" class="w-20">Brand</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($vehicles as $vehicle)
                                        <tr wire:key='{{$vehicle->id}}'>
                                            <td scope="row">{{$i++}}</td>
                                            <td>{{$vehicle->model}}</td>
                                            <td>{{$vehicle->vehicle_type}}</td>
                                            <td>{{$vehicle->brand->name}}</td>
                                            <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" wire:click="editVehicle({{$vehicle->id}})">Edit</a>
                                                    <a class="dropdown-item" href="#" wire:click="deleteVehicle({{$vehicle->id}})">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@script
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
            $wire.vehicle_type = data;
        })

        document.addEventListener('livewire:load', function (event) {
          this.on('refreshDropdown', function () {
              $('.js-example-basic-single').select2({
            // theme: 'bootstrap-5',
            placeholder: 'Select item',
            dropdownParent: $('#myModal'),
        });
          });
     })

        // window.initSelectCompanyDrop=()=>{
        //         $('#brand_id').select2({
        //             placeholder: 'Select a Company',
        //             allowClear: true});
        // }

        // initSelectCompanyDrop();
        // $('#brand_id').on('change', function (e) {
        //     livewire.emit('selectedCompanyItem', e.target.value)
        // });

        // window.livewire.on('select2',()=>{
        //         initSelectCompanyDrop();
        //     });
    })
</script>
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endscript
@endsection


