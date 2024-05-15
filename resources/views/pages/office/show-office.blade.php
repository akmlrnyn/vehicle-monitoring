<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-3 sm:p-12">
        <div class="mx-auto max-w-lg px-6 py-12 bg-white border-0 shadow-lg rounded sm:rounded-2xl">
            <div class="mx-auto mb-4">
                <h2 class="text-gray-700 text-xl sm:text-3xl font-bold">Available Vehicles in {{$data->name}}</h2>
                <p class="text-sm sm:text-base text-gray-500"></p>
            </div>
            <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm mb-5">
                @if ($data->count() > 0)
                @foreach ($dataVehicle as $item)
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    - Car Type :
                    <span class="text-gray-500 text-xs mr-5">{{$item->name}}</span>
                    - Owner :
                    <span class="text-gray-500 text-xs">{{$item->owner}}</span>
                </p>
                @endforeach
                @endif
                @if ($dataVehicle->count() == null)
                <span class="text-gray-500 text-lg mr-5">This office has no cars</span>
                @endif
            </div>
            <a href="{{ route('office.index') }}"
                class="text-xs bg-red-500 hover:bg-red-700 text-white py-2  px-4 rounded">Back</a>
        </div>
    </div>
</x-app-layout>
