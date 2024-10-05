<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class CreatePost extends Component
{

	public PostForm $form;

	public bool $success = false;

	// public function updated($property): void
	// {
	// 	if ($property == 'form.title') {
	// 		$this->form->title = Str::headline($this->form->title);
	// 	}
	// }

	public function updatedFormTitle()
	{
		$this->form->title = Str::headline($this->form->title);
	}

	public function save()
	{
		$this->form->save();
		$this->success = true;
	}

	public function validateTitle()
	{
		$this->validateOnly('form.title');
	}

	// #[Title('Create Post')] 
	public function render()
	{
		return view('livewire.create-post')->title('Create Post');
	}
}
