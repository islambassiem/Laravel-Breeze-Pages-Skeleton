<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductsForm extends Form
{

	#[Locked]
	public int $productId;

	public ?Product $product;
	
	#[Validate('required|min:3', as: 'name')]
	public string $name = '';

	#[Validate('required|min:3', as: 'description')]
	public string $description = '';

	#[Validate('required|exists:categories,id', as: 'category', message: 'you must choose the :attribute')]
	public int $category_id;

	public function setProduct($product)
	{
		$this->product 		 = $product->product;
		$this->name    		 = $product->name;
		$this->description = $product->description;
		$this->category_id = $product->category_id;
	}

	public function save()
	{
		$this->validate();

		Product::create($this->only(['name', 'description', 'category_id']));
	}

	public function update()
	{
		$this->validate();

		Product::where('id', $this->productId)->update($this->only(['name', 'description', 'category_id']));
	}
}
