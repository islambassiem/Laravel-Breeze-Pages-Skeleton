<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePost extends Component
{

	#[Validate('required|min:5')]
	public $title = '';

	#[Validate('required|min:5')]
	public $body = '';

	public bool $success = false;

	public function save()
	{
		$this->validate();
		Post::create([
			'title' => $this->title,
			'body' => $this->body,
		]);
		$this->success = true;
		$this->reset('title', 'body');
	}

	public function render()
	{
		return view('livewire.create-post');
	}
}
