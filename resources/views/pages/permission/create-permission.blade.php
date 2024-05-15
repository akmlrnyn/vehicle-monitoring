<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-3 sm:p-12">
        <div class="mx-auto max-w-lg px-6 py-12 bg-white border-0 shadow-lg rounded sm:rounded-2xl">
            <div class="mx-auto mb-4">
                <h2 class="text-gray-700 text-xl sm:text-3xl font-bold">Permit Car Borrowing</h2>
                <p class="text-sm sm:text-base text-gray-500">Submitted permission will be evaluated by admins</p>
            </div>
            <form id="form" method="POST" action="{{ route('permission.store') }}">
                @csrf
                <div class="relative z-0 w-full mb-2">
                    <label class="text-gray-500 text-xs sm:text-sm" for="name">Staff name</label>
                    <select id="name" name="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1">
                        <option disabled>
                            <-------->
                        </option>
                        @if (Auth::user()->role == 'admin')
                        @foreach ($users as $user)
                        <option value="{{$user->id}}">
                            {{$user->name}}
                        </option>
                        @endforeach
                        @else
                        <option value="{{Auth::user()->id}}">
                            {{Auth::user()->name}}
                        </option>
                        @endif
                    </select>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="reason">Reason</label>
                    <input id="reason" type="text" name="reason" value=""
                        class="pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200" />
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="month">Choose Month</label>
                    <select id="month" name="month"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1">
                        <option disabled>
                            <--------->
                        </option>
                        <option value="january" {{ $currentMonth == 'January' ? 'selected' : '' }}>January</option>
                        <option value="february" {{ $currentMonth == 'February' ? 'selected' : '' }}>February</option>
                        <option value="march" {{ $currentMonth == 'March' ? 'selected' : '' }}>March</option>
                        <option value="april" {{ $currentMonth == 'April' ? 'selected' : '' }}>April</option>
                        <option value="may" {{ $currentMonth == 'May' ? 'selected' : '' }}>May</option>
                        <option value="june" {{ $currentMonth == 'June' ? 'selected' : '' }}>June</option>
                        <option value="july" {{ $currentMonth == 'July' ? 'selected' : '' }}>July</option>
                        <option value="august" {{ $currentMonth == 'August' ? 'selected' : '' }}>August</option>
                        <option value="september" {{ $currentMonth == 'September' ? 'selected' : '' }}>September
                        </option>
                        <option value="october" {{ $currentMonth == 'October' ? 'selected' : '' }}>October</option>
                        <option value="november" {{ $currentMonth == 'November' ? 'selected' : '' }}>November</option>
                        <option value="december" {{ $currentMonth == 'December' ? 'selected' : '' }}>December</option>
                    </select>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="leave_request">Choose car</label>
                    <select id="vehicle" name="vehicle_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1">
                        <option disabled>
                            <-------->
                        </option>
                        @foreach ($vehicles as $vehicle)
                        <option value="{{$vehicle->id}}">
                            {{$vehicle->name}}
                        </option>
                        @endforeach
                    </select>
                </div>


                <button type="submit"
                    class="px-4 py-2 mt-3 text-xs text-lg text-white transition-all duration-150 ease-linear rounded shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none">
                    Create New Permission
                </button>
                <a href="{{ route('dashboard') }}"
                    class="text-xs bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
