<x-app-layout>
    <div class="container mx-auto sm:py-32">
        <div>
            <div class="bg-white relative shadow-lg rounded-lg mx-2 sm:w-5/6 lg:w-4/6 sm:mx-auto">
                <div class="">
                    <h1 class="font-bold text-center text-base lg:text-2xl text-gray-900">
                    </h1>
                    <p class="text-center text-xs sm:text-sm text-gray-400 font-normal mt-2">
                        </p>
                    <p><span></span></p>

                    <div class="flex flex-wrap justify-around items-center my-3 sm:my-5 px-6">
                        <p
                            class="text-gray-500 border-b-2 sm:border-b-4 rounded transition duration-150 ease-in font-medium text-xs sm:text-sm text-center w-1/2 sm:w-1/4 py-3">
                            Your Detail</p>
                        <a href="{{ route('staff-user.create') }}"
                            class="text-gray-500 hover:text-gray-900 hover:bg-blue-100 rounded transition duration-150 ease-in font-medium text-xs sm:text-sm text-center w-1/2 sm:w-1/4 py-3">Ask
                            Car Permission</a>
                    </div>

                    <div class="w-full">
                        <h3 class="text-sm sm:text-lg font-medium text-gray-900 text-left px-6">{{$data->name}} - Staff Detail</h3>
                        <div class="mt-5 w-full flex flex-col items-center overflow-hidden text-xs sm:text-sm">
                            <p
                                class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                <img src="" alt=""
                                    class="rounded-full h-6 shadow-md inline-block mr-2" />
                                Email:
                                <span class="text-gray-500 text-xs">{{$data->email}}</span>
                            </p>

                            <p
                                class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                <img src="" alt=""
                                    class="rounded-full h-6 shadow-md inline-block mr-2" />
                                Role:
                                <span class="text-gray-500 text-xs">{{$data->role}}</span>
                            </p>


                            <p
                                class="w-full border-t font-semibold border-gray-100 text-gray-700 py-4 pl-6 pr-3 w-full block hover:bg-gray-100 transition duration-150">
                                <img src="" alt=""
                                    class="rounded-full h-6 shadow-md inline-block mr-2" />
                                Office:
                                <span class="text-gray-500 text-xs">{{$data->office->name}}</span>
                            </p>


                            <a href="{{ route('staff-user.show') }}"
                                class="bg-blue-100 py-1 sm:py-2 px-2 sm:px-3 rounded text-xs sm:text-sm text-blue-600 my-5">See
                                all my car permission</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
