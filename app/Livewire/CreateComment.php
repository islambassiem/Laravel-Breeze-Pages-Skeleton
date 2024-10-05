<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateComment extends Component
{

	public Post $post;

	#[Validate('required')]
	public $body = '';


	public function save()
	{
		$this->validate();
		$this->post->comments()->create(['body' => $this->body]);
		$this->dispatch('comment_added');
		$this->reset('body');
	}

	public function render()
	{
		return view('livewire.create-comment');
	}
}
