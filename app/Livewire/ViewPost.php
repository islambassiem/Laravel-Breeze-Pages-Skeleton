<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewPost extends Component
{

	public Post $post;

	public int $commentsCount = 0;

	#[On('comment_added')]
	public function commentAdded()
	{
		$this->commentsCount++;
	}

	public function mount(Post $post): void
	{
		$this->post = $post;
		$this->post->loadCount('Comments');
		$this->commentsCount = $this->post->comments_count;
	}

	public function render()
	{
		return view('livewire.view-post');
	}
}
