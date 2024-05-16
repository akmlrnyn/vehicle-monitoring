<x-app-layout>
    <div class="w-5/6 sm:w-4/5 mx-auto mt-4 pb-7">
        <h2 class="text-gray-700 text-2xl sm:text-3xl font-bold">All Permissions </h2>
        <p>Your car borrowing permission might not been approved yet</p>
        <div class="bg-white shadow-md rounded-md overflow-hidden mx-auto mt-5">
            <div class="bg-gray-200 py-2 px-4">
                <h2 class="text-lg sm:text-xl font-bold text-gray-800">Permission list</h2>
                <a href="{{ route('permission.create') }}" class="text-sm sm:text-base text-blue-700">+ Make new
                    permission</a>
            </div>
        </div>


        <!-- Pending Permissions -->
        <div class="card w-full bg-yellow-100 p-4 mt-5 rounded-lg border-b-1 shadow-md">
            <h2 class="text-base sm:text-xl font-semibold mb-1">
                Pending Car Permission
            </h2>
            <h5 class="text-sm sm:text-base text-gray-600 font-light">Pending Request
                Permission({{collect($datas)->where('status', 'pending')?->count() ?? 0}})</h5>
            <div class="mt-2">
                <div class="mt-1 flex items-center gap-x-1.5 p-">
                    <ul class="divide-y divide-gray-200">
                        <li class="flex flex-col sm:flex-row items-center  py-4 px-6">
                            @if (collect($datas)->where('status', 'pending')?->count() == 0)
                            <h3 class="text-sm sm:text-lg font-medium text-gray-800">No pending vehicle at the
                                moment</h3>
                            @endif
                            @foreach ($datas as $data)
                            @if($data->status == 'pending')
                        <li>
                            <div class="flex justify-between p-5 mr-5 w-full">
                                <div class="flex-1 mb-2 sm:mb-0">
                                    <h3 class="text-sm sm:text-lg font-medium text-gray-800">{{$data->vehicle->name}}
                                    </h3>

                                    <div class="mt-1 flex items-center gap-x-1.5">
                                        <p class="text-gray-600 text-center sm:text-start text-xs sm:text-base">
                                            {{$data->user->name}} |
                                        </p>
                                        @if ($data->status == 'pending')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-yellow-500"></div>
                                        </div>

                                        @elseif ($data->status == 'rejected')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-red-500"></div>
                                        </div>

                                        @elseif ($data->status == 'admin-approved')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-green-500"></div>
                                        </div>

                                        @endif
                                        <p class="text-xs leading-5 text-gray-500">{{ $data->status }}</p>
                                    </div>

                                </div>
                                <div class="flex flex-row items-center sm:ml-auto gap-x-2">

                                    {{-- button trigger for delete-modal --}}
                                    <button data-modal-target="delete-modal-{{$data->id}}"
                                        data-modal-toggle="delete-modal-{{$data->id}}"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        type="button">
                                        Reject
                                    </button>
                                    {{-- detail employee --}}
                                    <form action="{{ route('permission.approve', $data->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Approve</button>
                                    </form>

                                    <a href="{{ route('permission.show', $data->id) }}" type="button"
                                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Detail</a>
                                </div>
                            </div>
                        </li>
                        @endif

                        {{-- modal for delete --}}
                        <form action="{{ route('permission.reject', $data->id) }}" method="post">
                            @method('PATCH')
                            @csrf
                            <div id="delete-modal-{{$data->id}}" tabindex="1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow ">
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Are you
                                                sure you want to delete this employee?</h3>
                                            {{-- button for delete --}}
                                            <button data-modal-hide="delete-modal-{{$data->id}}" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-xs inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Yes, I'm sure
                                            </button>
                                            <button type="button" data-modal-hide="delete-modal-{{$data->id}}"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-xs font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                                cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                        </li>

                    </ul>

                </div>
                <hr />
            </div>
        </div>
        <!-- End of Pending Permissions -->

        @if (Auth::user()->role == 'approver')
        <!-- approver -->
        <div class="card w-full bg-green-100 p-4 mt-5 rounded-lg border-b-1 shadow-md">
            <h2 class="text-base sm:text-xl font-semibold mb-1">
                Admin-Approved Car Permission
            </h2>
            <h5 class="text-sm sm:text-base text-gray-600 font-light">
                Permission({{collect($datas)->where('status', 'admin-approved')?->count() ?? 0}}) waiting for final approval
            </h5>
            <div class="mt-2">
                <div class="mt-1 flex items-center gap-x-1.5 p-">
                    <ul class="divide-y divide-gray-200">
                        <li class="flex flex-col sm:flex-row items-center  py-4 px-6">
                            @if (collect($datas)->where('status', 'admin-approved')?->count() == 0)
                            <h3 class="text-sm sm:text-lg font-medium text-gray-800">No approved vehicle at the
                                moment</h3>
                            @endif
                            @foreach ($datas as $data)
                            @if($data->status == 'admin-approved')
                        <li>
                            <div class="flex justify-between p-5 mr-5 w-full">
                                <div class="flex-1 mb-2 sm:mb-0">
                                    <h3 class="text-sm sm:text-lg font-medium text-gray-800">{{$data->vehicle->name}}
                                    </h3>

                                    <div class="mt-1 flex items-center gap-x-1.5">
                                        <p class="text-gray-600 text-center sm:text-start text-xs sm:text-base">
                                            {{$data->user->name}} |
                                        </p>
                                        @if ($data->status == 'pending')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-yellow-500"></div>
                                        </div>

                                        @elseif ($data->status == 'rejected')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-red-500"></div>
                                        </div>

                                        @elseif ($data->status == 'approved')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-green-500"></div>
                                        </div>

                                        @endif
                                        <p class="text-xs leading-5 text-gray-500">{{ $data->status }}</p>
                                    </div>

                                </div>
                                <div class="flex flex-row items-center sm:ml-auto gap-x-2">

                                    {{-- button trigger for delete-modal --}}
                                    <button data-modal-target="delete-modal-{{$data->id}}"
                                        data-modal-toggle="delete-modal-{{$data->id}}"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        type="button">
                                        Reject
                                    </button>

                                    <form action="{{ route('permission.final-approve', $data->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Approve</button>
                                    </form>
                                    {{-- detail employee --}}
                                    <a href="{{ route('permission.show', $data->id) }}" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Detail</a>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        </li>

                    </ul>

                </div>
                <hr />
            </div>
        </div>
        @endif
        <!-- approver ends -->

        <!-- Rejected permissions -->
        <div class="card w-full bg-red-100 p-4 mt-5 rounded-lg border-b-1 shadow-md">
            <h2 class="text-base sm:text-xl font-semibold mb-1">
                Rejected Car Permission
            </h2>
            <h5 class="text-sm sm:text-base text-gray-600 font-light">Rejected Request
                Permission({{collect($datas)->where('status', 'rejected')?->count() ?? 0}})</h5>
            <div class="mt-2">
                <div class="mt-1 flex items-center gap-x-1.5 p-">
                    <ul class="divide-y divide-gray-200">
                        <li class="flex flex-col sm:flex-row items-center  py-4 px-6">
                            @if (collect($datas)->where('status', 'rejected')?->count() == 0)
                            <h3 class="text-sm sm:text-lg font-medium text-gray-800">No rejected vehicle at the
                                moment</h3>
                            @endif
                            @foreach ($datas as $data)
                            @if($data->status == 'rejected')
                        <li>
                            <div class="flex justify-between p-5 mr-5 w-full">
                                <div class="flex-1 mb-2 sm:mb-0">
                                    <h3 class="text-sm sm:text-lg font-medium text-gray-800">{{$data->vehicle->name}}
                                    </h3>

                                    <div class="mt-1 flex items-center gap-x-1.5">
                                        <p class="text-gray-600 text-center sm:text-start text-xs sm:text-base">
                                            {{$data->user->name}} |
                                        </p>
                                        @if ($data->status == 'pending')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-yellow-500"></div>
                                        </div>

                                        @elseif ($data->status == 'rejected')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-red-500"></div>
                                        </div>

                                        @elseif ($data->status == 'admin-approved')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-green-500"></div>
                                        </div>

                                        @endif
                                        <p class="text-xs leading-5 text-gray-500">{{ $data->status }}</p>
                                    </div>

                                </div>
                                <div class="flex flex-row items-center sm:ml-auto gap-x-2">
                                    <a href="{{ route('permission.show', $data->id)  }}" type="button"
                                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Detail</a>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        </li>

                    </ul>

                </div>
                <hr />
            </div>
        </div>
        <!-- End of rejected permissions -->

        @if (Auth::user()->role == 'admin')
        <!-- Approved permissions -->
        <div class="card w-full bg-green-100 p-4 mt-5 rounded-lg border-b-1 shadow-md">
            <h2 class="text-base sm:text-xl font-semibold mb-1">
                Admin-approved Car Permission
            </h2>
            <h5 class="text-sm sm:text-base text-gray-600 font-light">Admin-approved Request
                Permission({{collect($datas)->where('status', 'admin-approved')?->count() ?? 0}}), The data(s) will be sent to
                approver's dashboard</h5>
            <div class="mt-2">
                <div class="mt-1 flex items-center gap-x-1.5 p-">
                    <ul class="divide-y divide-gray-200">
                        <li class="flex flex-col sm:flex-row items-center  py-4 px-6">
                            @if (collect($datas)->where('status', 'admin-approved')?->count() == 0)
                            <h3 class="text-sm sm:text-lg font-medium text-gray-800">No approved vehicle at the
                                moment</h3>
                            @endif
                            @foreach ($datas as $data)
                            @if($data->status == 'admin-approved')
                        <li>
                            <div class="flex justify-between p-5 mr-5 w-full">
                                <div class="flex-1 mb-2 sm:mb-0">
                                    <h3 class="text-sm sm:text-lg font-medium text-gray-800">{{$data->vehicle->name}}
                                    </h3>

                                    <div class="mt-1 flex items-center gap-x-1.5">
                                        <p class="text-gray-600 text-center sm:text-start text-xs sm:text-base">
                                            {{$data->user->name}} |
                                        </p>
                                        @if ($data->status == 'pending')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-yellow-500"></div>
                                        </div>

                                        @elseif ($data->status == 'rejected')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-red-500"></div>
                                        </div>

                                        @elseif ($data->status == 'admin-approved')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-green-500"></div>
                                        </div>

                                        @endif
                                        <p class="text-xs leading-5 text-gray-500">{{ $data->status }}</p>
                                    </div>

                                </div>
                                <div class="flex flex-row items-center sm:ml-auto gap-x-2">

                                    {{-- detail employee --}}
                                    <a href="{{ route('permission.show', $data->id) }}" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Detail</a>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        </li>

                    </ul>

                </div>
                <hr />
            </div>
        </div>
        <!-- End of approved permissions -->
        @endif

        <!-- Accepted -->
        <div class="card w-full bg-blue-100 p-4 mt-5 rounded-lg border-b-1 shadow-md">
            <h2 class="text-base sm:text-xl font-semibold mb-1">
                Accepted Car Permission
            </h2>
            <h5 class="text-sm sm:text-base text-gray-600 font-light">
                Permission({{collect($datas)->where('status', 'accepted')?->count() ?? 0}}) passed the 2-level approval
            </h5>
            <div class="mt-2">
                <div class="mt-1 flex items-center gap-x-1.5 p-">
                    <ul class="divide-y divide-gray-200">
                        <li class="flex flex-col sm:flex-row items-center  py-4 px-6">
                            @if (collect($datas)->where('status', 'accepted')?->count() == 0)
                            <h3 class="text-sm sm:text-lg font-medium text-gray-800">No approved vehicle at the
                                moment</h3>
                            @endif
                            @foreach ($datas as $data)
                            @if($data->status == 'accepted')
                        <li>
                            <div class="flex justify-between p-5 mr-5 w-full">
                                <div class="flex-1 mb-2 sm:mb-0">
                                    <h3 class="text-sm sm:text-lg font-medium text-gray-800">{{$data->vehicle->name}}
                                    </h3>

                                    <div class="mt-1 flex items-center gap-x-1.5">
                                        <p class="text-gray-600 text-center sm:text-start text-xs sm:text-base">
                                            {{$data->user->name}} |
                                        </p>
                                        @if ($data->status == 'pending')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-yellow-500"></div>
                                        </div>

                                        @elseif ($data->status == 'rejected')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-red-500"></div>
                                        </div>

                                        @elseif ($data->status == 'admin-approved')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-green-500"></div>
                                        </div>

                                        @elseif ($data->status == 'accepted')
                                        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
                                            <div class="h-1.5 w-1.5 rounded-full bg-blue-500"></div>
                                        </div>

                                        @endif
                                        <p class="text-xs leading-5 text-gray-500">{{ $data->status }}</p>
                                    </div>

                                </div>
                                <div class="flex flex-row items-center sm:ml-auto gap-x-2">
                                    {{-- detail employee --}}
                                    <a href="{{ route('permission.show', $data->id) }}" type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:font-medium rounded sm:rounded-lg text-xs px-3 sm:px-5 py-1 sm:py-2.5 sm:me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Detail</a>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        </li>

                    </ul>

                </div>
                <hr />
            </div>
        </div>
        <!-- End of Accepted -->
    </div>
</x-app-layout>
