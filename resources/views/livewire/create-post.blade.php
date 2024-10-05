<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div>
                    @if ($success)
                        <span class="block mb-4 text-green-500">Post saved successfully.</span>
                    @endif
                    <form method="POST" wire:submit="save">
                        <div>
                            <label for="title" class="block font-medium text-sm">Title</label>
                            <input id="title" wire:model.blur="form.title" {{-- wire:keydown="validateTitle" --}}
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm text-black"
                                type="text" />
                            <button type="button" wire:click="validateTitle"
                                class="block mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Validate title
                            </button>
                            @error('form.title')
                                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="body" class="block font-medium text-sm">Body</label>
                            <textarea id="body" wire:model.blur="form.body"
                                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm text-black"></textarea>
                            @error('form.body')
                                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <button
                            class="mt-4 px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
