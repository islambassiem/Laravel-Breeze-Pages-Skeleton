<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShowPost extends Component
{

	#[Locked]
	public Post $post;
	
	public function mount(Post $post)
	{
		$this->post = $post;
	}

	#[Title('Show Post')]
	public function render()
	{
		return view('livewire.show-post');
	}
}
