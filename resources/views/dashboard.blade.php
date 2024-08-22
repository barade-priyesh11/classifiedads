<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex space-x-8"> <!-- Increased space between buttons -->
                <a href="{{ route('ads.index') }}" class="bg-green-500 text-black px-4 py-2 rounded-md border">
                    {{ __('See Advertisements') }}
                </a>
                <a href="{{ route('ads.create') }}" class="bg-blue-500 text-black px-4 py-2 rounded-md border">
                    {{ __('Upload Advertise') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold text-gray-800">{{ __("All Advertisements") }}</h3>
                    <p class="mt-2 text-gray-600">Click on the 'See Advertisements' button to view all listings.</p>
                </div>
            </div>

            <!-- New Section: Overview -->
            <div class="mt-8 bg-white shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __("Overview") }}</h3>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 p-4 rounded-lg shadow">
                            <h4 class="text-lg font-semibold text-blue-600">{{ __('Total Advertisements') }}</h4>
                            <p class="mt-2 text-gray-600">Manage and review all your advertisements in one place.</p>
                            <div class="mt-4 text-2xl font-bold">125</div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg shadow">
                            <h4 class="text-lg font-semibold text-green-600">{{ __('New Uploads This Week') }}</h4>
                            <p class="mt-2 text-gray-600">Keep track of recent advertisements added by users.</p>
                            <div class="mt-4 text-2xl font-bold">32</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- New Section: Latest Advertisements -->
            <div class="mt-8 bg-white shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __("Latest Advertisements") }}</h3>
                    <div class="mt-4">
                        <ul class="space-y-4">
                            <li class="bg-gray-50 p-4 rounded-lg shadow">
                                <h4 class="text-lg font-semibold text-gray-800">{{ __('Luxury Car for Sale') }}</h4>
                                <p class="text-gray-600">A premium luxury car in excellent condition. Contact us for more details.</p>
                                <a href="#" class="text-blue-600 hover:underline mt-2 block">{{ __('View Details') }}</a>
                            </li>
                            <li class="bg-gray-50 p-4 rounded-lg shadow">
                                <h4 class="text-lg font-semibold text-gray-800">{{ __('Spacious Apartment for Rent') }}</h4>
                                <p class="text-gray-600">Modern apartment with great amenities. Available for immediate move-in.</p>
                                <a href="#" class="text-blue-600 hover:underline mt-2 block">{{ __('View Details') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
