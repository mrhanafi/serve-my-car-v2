<?php

namespace App\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;

class Brands extends Component
{
    public $brand;
    // public $brands = [];

    public function store()
    {
        
        Brand::create([
            'name' => $this->brand
        ]);

        return redirect()->back();
    }

    public function update()
    {
        dd($this->brand);
    }

    public function render()
    {
        $brands = Brand::paginate(5);
        return view('livewire.brands.brands.brands',[
            'brands' => $brands
        ]);
    }
}
