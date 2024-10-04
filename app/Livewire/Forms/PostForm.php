<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{

	public ?Post $post;

	#[Validate('required|min:5')]
	public $title = '';

	#[Validate('required|min:5')]
	public $body = '';


	public function setPost(Post $post)
	{
		$this->post = $post;
		$this->title = $post->title;
		$this->body = $post->body;
	}

	public function update()
	{
		dd($this->all());
		$this->post->update($this->all());
		$this->reset('title', 'body');
	}

	public function save()
	{
		$this->validate();
		Post::create([
			'title' => $this->title,
			'body' => $this->body,
		]);
		$this->reset('title', 'body');
	}
}
