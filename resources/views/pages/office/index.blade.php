<x-app-layout>
    <div class="w-4/5 mx-auto mt-4">
        <h2 class="text-gray-700 text-2xl sm:text-3xl font-bold">All Offices </h2>
        <p>List of Offices</p>

        <div class="my-5 w-full bg-white border border-gray-200 rounded-lg shadow-lg p-8 border-gray-100">
            <div class="flex flex-col sm:flex-row items-center justify-between pb-4 border-b-2">
                <h5 class="text-lg sm:text-xl font-bold leading-none text-gray-900 ">Offices</h5>
                <a href="{{ route('office.create') }}" class="text-md sm:text-lg font-bold leading-none text-blue-500 "> + Add New Office</a>
            </div>

            <div class="flow-root">
                <ul role="list">
                    @php($number = 1)
                    @foreach ($datas as $data)
                    <li class="py-3 sm:py-4">
                        <div class="flex flex-col sm:flex-row items-center">
                            <div class="flex-shrink-0">
                                <span class="text-gray-800 text-sm sm:text-base sm:mr-4">{{ $number }}</span>
                            </div>
                            <div class="flex-1 min-w-0 sm:ms-4">
                                <p class="text-sm font-medium text-gray-900 text-center sm:text-start">
                                    {{$data->name}}
                                </p>
                                <p
                                    class="text-center sm:text-start text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                    {{$data->office_grade}} office
                                </p>
                            </div>
                            <div
                                class="flex flex-col sm:flex-row mt-2 sm:mt-0 gap-2 items-center text-xs sm:text-base font-semibold text-gray-900 ">
                                <div>{{$data->vehicle_owned}} vehicle exists </div>
                                <div>
                                    <a href="">
                                        <button type="button"
                                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:font-medium shadow-lg rounded-md sm:rounded-lg text-xs px-3 sm:px-5 py-2 sm:py-2.5 sm:me-2 dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-800">
                                            See Detail
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <hr>
                    @php($number++)
                    @endforeach
                </ul>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 justify-center pt-5">
                <p class="text-xs font-medium text-gray-600">All cars counted were rental and owned cars</p>
            </div>
        </div>
    </div>
</x-app-layout>
