<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowPosts extends Component
{
	#[Url(as: 'q')]
	public $search = '';

	#[Title('All posts')]
	public function render()
	{
		return view('livewire.show-posts', [
			'posts' => Post::where('title', 'LIKE' , '%' . $this->search . '%')->get()
		]);
	}
}
