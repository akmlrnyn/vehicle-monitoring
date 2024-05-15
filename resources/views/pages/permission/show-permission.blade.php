<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-3 sm:p-12">
        <div class="mx-auto max-w-lg px-6 py-12 bg-white border-0 shadow-lg rounded sm:rounded-2xl">
            <div class="mx-auto mb-4">
                <h2 class="text-gray-700 text-xl sm:text-3xl font-bold">Permission detail</h2>
                <p class="text-sm sm:text-base text-gray-500"></p>
            </div>
            <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-sm mb-5">
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Borrower Name :
                    <span class="text-gray-500 text-xs">{{$data->user->name}}</span>
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Car Type :
                    <span class="text-gray-500 text-xs">{{$data->vehicle->name}}</span>
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Reason For Borrowing :
                    <span class="text-gray-500 text-xs">{{$data->reason}}</span>
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Status :
                    @if ($data->status == 'pending')
                    <span class="text-gray-500 text-xs text-yellow-500">{{$data->status}}</span>

                    @elseif ($data->status == 'rejected')
                    <span class="text-gray-500 text-xs text-red-500">{{$data->status}}</span>

                    @elseif ($data->status == 'approved')
                    <span class="text-gray-500 text-xs text-green-500">{{$data->status}}</span>

                    @endif
                </p>
                <p
                    class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                    Month :
                    <span class="text-gray-500 text-xs">{{$data->month}}</span>
                </p>
            </div>
            <a href="{{ route('permission.index') }}"
                class="text-xs bg-red-500 hover:bg-red-700 text-white py-2  px-4 rounded">Back</a>
        </div>
    </div>
</x-app-layout>
