<div class="space-y-6">
    <div class="space-x-8">
        <input type="search" wire:model.live="searchQuery" id="search" placeholder="Search...">

        <select name="category" wire:model.live="searchCategory">
            <option value="0">-- CHOOSE CATEGORY --</option>
            @foreach ($categories as $id => $category)
                <option value="{{ $id }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>
    <div class="text-red-600" wire:loading>Loading...</div>
    <div class="min-w-full align-middle" wire:loading.class="opacity-50">
        <table class="min-w-full divide-y divide-gray-200 border">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span
                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span
                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</span>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                @forelse($products as $product)
                    <tr class="bg-white">
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ $product->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ $product->category->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                            {{ $product->description }}
                        </td>
                        <td>
                            <a href="#"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                Edit
                            </a>
                            <a href="#" wire:click="deleteProduct({{ $product->id }})"
                                {{-- onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()" --}}
                                wire:confirm="Are you sure you want to delete this post?"
                                class="inline-flex items-center px-4 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 text-sm" colspan="3">
                            No products were found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
