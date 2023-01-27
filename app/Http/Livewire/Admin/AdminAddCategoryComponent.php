<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory()
    {
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        $this->resetInput();
        session()->flash('message', 'Category has been created successfull');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')
            ->layout('layouts.base');
    }
}
