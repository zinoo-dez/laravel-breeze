<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandCrud extends Component
{
    use WithPagination;

    public $name;
    public $brand_id;
    public $isOpen = false;
    public $is_featured;
    public $description;

    public function render()
    {
        $brands = Brand::paginate(10);
        return view('livewire.brand-crud', compact('brands'));
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->brand_id = '';
        $this->is_featured = '';
        $this->description = '';
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Brand::updateOrCreate(['id' => $this->brand_id], [
            'name' => $this->name,
            'is_featured' => $this->is_featured,
            'description' => $this->description,
        ]);

        session()->flash('message', $this->brand_id ? 'Brand updated.' : 'Brand created.');
        $this->resetInputFields();
        $this->closeModal();
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $this->brand_id = $id;
        $this->name = $brand->name;
        $this->is_featured = $brand->is_featured;
        $this->description = $brand->description;
        $this->openModal();
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand) {
            $brand->delete();
            session()->flash('message', 'Brand deleted.');
        }
    }
}
