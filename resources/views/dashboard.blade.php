<x-app-layout>

    <div class="py-1 md:px-10 md:mx-3">
        <div class="p-1 sm:p-4 bg-gray-100">
            <div class="container mx-auto p-2 sm:p-4">
                <div
                    class="dashboard-title mb-5 md:pb-4 flex flex-col items-start md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-gray-700 text-2xl sm:text-4xl font-bold">Welcome, <span
                                class="text-xl sm:text-3xl">{{ Auth::user()->name }} !</span></h1>
                        <p class="text-sm sm:text-base text-gray-700">
                            Welcome to Vehicle Rental Dashboard for admin
                        </p>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm text-gray-700 bg-gray-200 rounded-md px-3 py-1 mt-4 shadow">
                            Administrator
                        </p>
                    </div>
                </div>
                {{-- Dasboard --}}
                <div class="dashboard content mt-5 flex flex-col md:flex-row justify-start gap-4">
                    <div class="flex w-full flex-col gap-3">
                        <!-- stats section -->
                        <div class="grid lg:grid-cols md:grid-cols-1 gap-6 w-full max-w-6xl">
                            <div class="card w-auto md:w-auto h-fit bg-white p-4 rounded-lg shadow-md">
                                <h2 class="text-base md:text-xl font-semibold">
                                    Cars available in {{$currentOffice}} office
                                </h2>
                                @if ($vehicles->count() == 0)
                                <h3 class="text-sm font-normal my-3 mx-3">
                                    No cars available at the moment
                                </h3>
                                @endif
                                <div class="mx-3 my-5">
                                    @php($number = 1)
                                    @foreach ($vehicles as $vehicle)
                                    <div class="mt-1 flex items-center gap-x-1.5">
                                        <p class="text-gray-600 text-center sm:text-start text-xs sm:text-base">
                                            {{$number}}. {{$vehicle->name}} |
                                        </p>

                                        <div class="flex-none rounded-full bg-green-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-green-500"></div>
                                        </div>
                                        <p class="text-xs leading-5 text-gray-500">Car is available</p>

                                    </div>
                                    @php($number++)
                                    @endforeach
                                    <p class="text-xs text-gray-500 border-l-2 p-2 mt-10">
                                        {{$vehicles->count()}} Total Cars Available
                                    </p>
                                </div>
                                <div class="mt-4">
                                    <img src="" alt="" class="mb-3 w-32 md:w-40" />
                                    <hr />
                                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-3">
                                        <a href="{{ route('vehicle.index') }}">
                                            <button
                                                class="btn bg-red-600 hover:bg-red-800 flex items-center gap-2 text-white px-4 py-2 rounded-md mt-4 text-xs sm:text-sm transition-all ease-in-out">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="17" width="17"
                                                    viewBox="0 0 512 512">
                                                    <path fill="#ffffff"
                                                        d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z" />
                                                </svg>
                                                See cars from all branches
                                            </button>
                                        </a>
                                        <a href="{{ route('permission.create') }}">
                                            <button
                                                class="btn bg-blue-600 hover:bg-blue-700 flex items-center gap-2 text-white px-4 py-2 rounded-md sm:mt-4 text-xs sm:text-sm transition-all ease-in-out">
                                                + Borrow Car
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card w-auto md:w-auto h-fit bg-white p-4 rounded-lg shadow-md">
                            @if (isset($history))
                            <h4 class="text-xl text-black font-bold">Permission History:</h4>
                            <ul>
                                @foreach ($history as $item)
                                <li>
                                    <span class="font-bold">- {{$item->vehicle->name}}</span>, borrowed by <span
                                        class="font-bold">{{$item->permission->user->name}}, </span>
                                    <span class="font-bold">{{$item->status}}</span>
                                    <span>({{ $item->created_at->format('Y-m-d H:i') }})</span>
                                    <a href="{{route('permission.index')}}">
                                        <i class="fa-solid fa-square-arrow-up-right" style="color: blue;"></i>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            @if (!isset($history))
                            <p>No permission history at the moment.</p>
                            @endif

                        </div>
                    </div>
                    <div class="flex flex-col w-full gap-y-3">
                        <!-- Permission Section -->
                        <div class="card w-full bg-white p-4 rounded-lg border-b-1 shadow-md">
                            <h2 class="text-base sm:text-xl font-semibold mb-1">
                                Pending Car Permission
                            </h2>
                            <h5 class="text-sm sm:text-base text-gray-600 font-light">Pending Request
                                Permission({{ $pendingPermissions->count()}})</h5>
                            <div class="mt-2">
                                <div class="mt-1 flex items-center gap-x-1.5 p-5">
                                    @php($number = 1)
                                    @foreach ($pendingPermissions as $pendingPermission)
                                    <p class="text-gray-600 text-center sm:text-start text-xs sm:text-base">
                                        {{$number}}. {{$pendingPermission->vehicle->name}} |
                                    </p>

                                    <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                        <div class="h-1.5 w-1.5 rounded-full bg-yellow-500"></div>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-500">Pending</p>
                                    @php($number++)
                                    @endforeach
                                </div>
                                <hr />
                                <a href="{{ route('permission.index') }}"
                                    class="text-sm sm:text-base text-blue-700 p-1 text-center">
                                    <p>See all permissions ></p>
                                </a>
                            </div>
                        </div>
                        {{-- Permission section --}}
                        <div class="card w-full bg-white p-4 rounded-lg border-b-1 shadow-md">
                            {!! $chart->container() !!}

                            <a href="{{ route('dashboard.export') }}"
                                class="text-sm sm:text-base text-violet-700 p-1 text-center">
                                <p><i class="fa-solid fa-file-arrow-down"></i> Download in Excel</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

</x-app-layout>
