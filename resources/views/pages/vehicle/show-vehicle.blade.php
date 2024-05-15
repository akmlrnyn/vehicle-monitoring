<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-3 sm:p-12">
        <div class="mx-auto max-w-lg px-6 py-12 bg-white border-0 shadow-lg rounded sm:rounded-2xl">
            <div class="mx-auto mb-4">
                <h2 class="text-gray-700 text-xl sm:text-3xl font-bold">Car details</h2>
                <p class="text-sm sm:text-base text-gray-500"></p>
            </div>
            <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm mb-5">
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Car Name :
                    <span class="text-gray-500 text-xs">{{$data->name}} </span>
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Office owner :
                    <span class="text-gray-500 text-xs">{{$data->office->name}}</span>
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Gas consumption :
                    <span class="text-gray-500 text-xs">{{$data->gas_consumption}} Litres</span>
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Total gas price : Rp. {{$data->total_gas_price}},00
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Owner :
                    <span class="text-gray-500 text-xs">{{$data->owner}} </span>
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Availability :
                    @if ($data->is_taken == 'true')
                    <span class="text-gray-500 text-xs">Car is being used currently </span>
                    @endif

                    @if ($data->is_taken == 'false')
                    <span class="text-gray-500 text-xs">Car is available </span>
                    @endif
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Next car service :
                    <span class="text-gray-500 text-xs">{{$data->next_car_service}} </span>
                </p>
            </div>
            <a href="{{ route('vehicle.index') }}"
                class="text-xs bg-red-500 hover:bg-red-700 text-white py-2  px-4 rounded">Back</a>
        </div>
    </div>
</x-app-layout>
