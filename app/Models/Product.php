<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'description', 'category_id', 'color', 'in_stock'];

	const COLOR_LIST = [ 
		'red' => 'Red',
		'green' => 'Green',
		'blue' => 'Blue',
];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
