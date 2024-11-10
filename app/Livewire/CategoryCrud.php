<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryCrud extends Component
{
    use WithPagination;

    public $name;
    public $category_id;
    public $isOpen = false;

    public function render()
    {

        $categories = Category::paginate(10);
        return view('livewire.category-crud', compact('categories'));
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
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

        $this->category_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Category::updateOrCreate(['id' => $this->category_id], [
            'name' => $this->name,

        ]);

        session()->flash('message', $this->category_id ? 'Category updated.' : 'Category created.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->name = $category->name;

        $this->openModal();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Category deleted.');
    }
}
