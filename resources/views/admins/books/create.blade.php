<!-- resources/views/create_book.blade.php -->

<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Book') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form class="space-y-4" action="{{ route('books.store') }}" enctype="multipart/form-data">
                        <x-splade-input name="title" placeholder="Title" label="Title" />
                        <x-splade-input name="author" placeholder="Author" label="Author" />
                        <x-splade-textarea name="synopsis" placeholder="Synopsis" label="Synopsis" />
                        <x-splade-input name="publisher" placeholder="Publisher" label="Publisher" />
                        <x-splade-input name="publication_year" type="number" placeholder="Publication Year" label="Publication Year" min="1900" max="2099" />
                        <x-splade-input name="isbn" placeholder="ISBN" label="ISBN" />

                        <div>
                            <label for="categories">Categories:</label>                        
                            <x-splade-group id="category_id" name="category_id" label="Pick one or more interests">
                                @foreach ($categories as $category)
                                    <x-splade-checkbox id="{{ $category->id }}" label="Pick some Category" name="category_id[]" :show-errors="false" value="{{ $category->id }}" label="{{ $category->name }}" />
                                @endforeach
                            </x-splade-group>
                        </div>

                        <div>
                            <label for="thumbnail">Thumbnail:</label>
                            <x-splade-file name="image" filepond accept="image/png" />
                        </div>

                        <div>
                            <label for="pdf">PDF:</label>
                            <x-splade-file name="pdf" filepond accept="application/pdf" />
                        </div>

                        <x-splade-submit label="Save" :spinner="false" />
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
