<x-app-layout>
  <div class="w-5/6 sm:w-4/5 mx-auto mt-4">
    <a href="{{ route('staff-user.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="22" width="20.5" class="mt-4" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        </a>
    <div
      class="bg-white shadow-md rounded-md overflow-hidden mx-auto mt-3"
    >
      <div class="bg-violet-200 opacity-90 py-2 px-4">
        <h2 class="text-base sm:text-xl font-light text-violet-700">Your All <span class="font-semibold">Car Permissions ({{ $permissions->count() }})</span></h2>
      </div>

      <ul class="divide-y divide-gray-200">
        @php($number = 1)
        @foreach ($permissions->reverse() as $item)
        <li class="flex lg:flex-row flex-col sm:items-center py-4 px-6">
          <span class="text-gray-700 text-sm sm:text-lg font-medium mr-4">{{ $number }}</span>
          <div class="flex-1">
            <h4 class="text-xs sm:text xl font-semibold text-gray-500 uppercase">{{ $item->status }}</h4>
            <p class="text-gray-600 text-xs sm:text-base font-bold">{{ $item->vehicle->name }}</p>
            <h3 class="text-xs sm:text-sm font-small text-gray-800">{{ $item->created_at->format('D/M/Y') }}</h3>
            <p class="text-blue-600 text-sm sm:text-base">Borrowing for {{ $item->reason }}</p>
          </div>
        </li>
        @php($number++)
        @endforeach
      </ul>
    </div>
  </div>

</x-app-layout>
