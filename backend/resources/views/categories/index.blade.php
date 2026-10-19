<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Validation errors (shown for the add form and the edit forms) --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- 1. ADD FORM --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-semibold text-gray-800 mb-4">Add a category</h3>

                <form method="POST" action="{{ route('categories.store') }}" class="flex flex-col gap-3 sm:flex-row">
                    @csrf

                    <input type="text" name="category_name" value="{{ old('category_name') }}"
                           placeholder="Category name" required
                           class="flex-1 rounded-md border-gray-300 shadow-sm">

                    <input type="text" name="colour" value="{{ old('colour') }}"
                           placeholder="Colour (optional)"
                           class="sm:w-44 rounded-md border-gray-300 shadow-sm">

                    <button type="submit"
                            class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                        Add
                    </button>
                </form>
            </div>

            {{-- 2. LIST --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="font-semibold text-gray-800 mb-4">Your categories</h3>

                @forelse ($categories as $category)
                    <div class="border-b last:border-b-0 py-3">

                        {{-- Name, colour swatch and the two buttons --}}
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                @if ($category->colour)
                                    <span class="inline-block w-4 h-4 rounded-full border"
                                          style="background-color: {{ $category->colour }}"></span>
                                @endif
                                <span class="text-gray-800">{{ $category->category_name }}</span>
                            </div>

                            <div class="flex items-center gap-4">
                                {{-- DELETE FORM --}}
                                <form method="POST" action="{{ route('categories.destroy', $category) }}"
                                      onsubmit="return confirm('Delete this category and all its tasks?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- EDIT FORM (click "Edit" to open it) --}}
                        <details class="mt-2">
                            <summary class="text-sm text-blue-600 cursor-pointer">Edit</summary>

                            <form method="POST" action="{{ route('categories.update', $category) }}"
                                  class="mt-3 flex flex-col gap-3 sm:flex-row">
                                @csrf
                                @method('PUT')

                                <input type="text" name="category_name"
                                       value="{{ $category->category_name }}" required
                                       class="flex-1 rounded-md border-gray-300 shadow-sm">

                                <input type="text" name="colour"
                                       value="{{ $category->colour }}"
                                       placeholder="Colour (optional)"
                                       class="sm:w-44 rounded-md border-gray-300 shadow-sm">

                                <button type="submit"
                                        class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                                    Save
                                </button>
                            </form>
                        </details>
                    </div>
                @empty
                    <p class="text-gray-500">No categories yet. Add your first one above.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>