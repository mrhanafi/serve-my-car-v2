<?php

namespace App\Livewire\Brands;

use App\Models\Brand;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class ListBrands extends Component
{
    public $brand,$brand_id;
    // public $brands = [];

    public function store()
    {
        
        Brand::create([
            'name' => $this->brand
        ]);

        LivewireAlert::title('Item Saved')
            ->text('The item has been successfully saved to the database.')
            ->success()
            ->show();

        // return redirect()->back();
    }

    public function editBrand(Brand $brand)
    {
        $this->brand_id = $brand->id;
        $this->brand = $brand->name;
    }

    public function updateBrand(Brand $brand)
    {
        // dd($brand);
        $brand->update([
            'name' => $this->brand
        ]);

        // return redirect()->back();
    }

    public function deleteBrand(Brand $brand)
    {
        $brand->delete();
    }

    public function render()
    {
        $brands = Brand::paginate();
        return view('livewire.brands.list-brands',[
            'brands' => $brands
        ]);
    }
}
