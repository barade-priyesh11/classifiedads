<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Advertisements') }}
            </h2>
            <a href="{{ route('ads.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded-md border">
                {{ __('Upload Advertisement') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-700">{{ __("All Advertisements") }}</h3>

                    <!-- Search Form -->
                    <form action="{{ route('ads.index') }}" method="GET" class="mb-6">
                        <div class="flex space-x-4">
                            <div>
                                <label for="category" class="block text-gray-700">{{ __('Category') }}</label>
                                <select name="category" id="category" class="w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">{{ __('All Categories') }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="self-end">
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">
                                    {{ __('Search') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                        @forelse($ads as $ad)
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                @if($ad->video)
                                    <video controls class="w-full h-48 object-cover">
                                        <source src="{{ asset('storage/' . $ad->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                                <div class="p-4">
                                    <h4 class="font-semibold text-lg text-gray-800">{{ $ad->title }}</h4>
                                    <p class="text-gray-600 mt-2">{{ $ad->description }}</p>
                                    <p class="text-gray-600 mt-2"><strong>Location:</strong> {{ $ad->location }}</p>
                                    <p class="text-gray-600 mt-2"><strong>Category:</strong> {{ $ad->category->name }}</p>
                                    @if($ad->is_featured)
                                        <p class="text-green-600 mt-2 font-bold">Featured</p>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600">No advertisements found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
