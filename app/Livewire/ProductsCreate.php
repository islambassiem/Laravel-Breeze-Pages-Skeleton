<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductsForm;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductsCreate extends Component
{
	public ProductsForm $form;

	public Collection $categories;

	public function mount(): void
	{
		$this->categories = Category::pluck('name', 'id');
	}

	public function save(): void
	{
		$this->form->save();
		$this->redirect('/products');
	}

	public function render()
	{
		return view('livewire.products-create');
	}
}
