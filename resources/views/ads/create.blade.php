<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Advertisement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-700">{{ __("Upload Advertisement") }}</h3>
                    <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data" class="mt-6">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">{{ __("Title") }}</label>
                            <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">{{ __("Description") }}</label>
                            <textarea name="description" id="description" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-gray-700">{{ __("Location") }}</label>
                            <input type="text" name="location" id="location" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('location') }}">
                            @error('location')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700">{{ __("Category") }}</label>
                            <select name="category_id" id="category_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="video" class="block text-gray-700">{{ __("Video") }}</label>
                            <input type="file" name="video" id="video" class="w-full border-gray-300 rounded-md shadow-sm">
                            @error('video')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="is_featured" class="block text-gray-700">{{ __("Featured") }}</label>
                            <input type="checkbox" name="is_featured" id="is_featured" class="rounded-md shadow-sm" {{ old('is_featured') ? 'checked' : '' }}>
                        </div>
                        <button type="submit" class="bg-blue-500 text-black px-4 py-2 rounded-md border">{{ __("Submit") }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toaster Notification Script -->
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
</x-app-layout>
