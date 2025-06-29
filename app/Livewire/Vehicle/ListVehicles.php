<?php

namespace App\Livewire\Vehicle;

use App\Models\Brand;
use App\Models\Vehicle;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class ListVehicles extends Component
{
    public $vehicle_model,$vehicle_type,$brandId;

    public $vehicle_type_arr = [
        'Passenger Vehicles' => [
            'Sedan',
            'Hatchback',
            'Coupe',
            'EV',
            'Hybrid',
            'Convertible',
            'Wagon',
            'SUV',
            'MPV',
            'Pickup Truck',
            'Crossover',
        ],
        'Two-Wheeler' => [
            'Motorcycle',
            'Scooter',
            'Moped',
            'E-bike',
        ],
        'Commercial Vehicles' => [
            'Van',
            'Lorry',
            'Moped',
            'E-bike',
        ],
    ];

    protected $listeners = [
        'selectedCompanyItem',
    ];

    public function hydrate()
    {
        $this->dispatch('refreshDropdown');
    }

    public function store()
    {
        // dd($this->vehicle_model,$this->vehicle_type,$this->brandId);
        Vehicle::create([
            'model' => $this->vehicle_model,
            'brand_id' => $this->brandId,
            'vehicle_type' => $this->vehicle_type,
        ]);

        $this->vehicle_model = '';
        $this->brandId = '';
        $this->vehicle_type = '';

        LivewireAlert::title('Item Saved')
            ->text('The item has been successfully saved to the database.')
            ->success()
            ->show();

        return redirect()->back();
    }

    public function editVehicle(Vehicle $vehicle)
    {

    }

    public function deleteVehicle(Vehicle $vehicle)
    {

    }

    public function render()
    {
        $brands = Brand::all();
        $vehicles = Vehicle::paginate();
        // dump($this->brandId);
        return view('livewire.vehicle.list-vehicles',[
            'vehicle_type_arr' => $this->vehicle_type_arr,
            'brands' => $brands,
            'vehicles' => $vehicles,
        ]);
    }
}
