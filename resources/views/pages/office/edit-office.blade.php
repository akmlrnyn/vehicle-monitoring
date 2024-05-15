<x-app-layout>
    <div class="min-h-screen bg-gray-100 p-3 sm:p-12">
        <div class="mx-auto max-w-lg px-6 py-12 bg-white border-0 shadow-lg rounded sm:rounded-2xl">
            <div class="mx-auto mb-4">
                <h2 class="text-gray-700 text-xl sm:text-3xl font-bold">edit office data</h2>
            </div>
            <form id="form" method="POST" action="{{ route('office.update', $office->id) }}">
            @method('PATCH')
                @csrf
                <div class="relative z-0 w-full mb-2">
                    <label class="text-gray-500 text-xs sm:text-sm" for="name">Office name</label>
                    <input id="name" value="{{ old('name') ?? $office->name }}" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1">
                    </input>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <label class="text-gray-500 text-xs sm:text-sm" for="office_grade">Office grade</label>
                    <select id="office_grade" type="text" name="office_grade" value="{{ old('office_grade') ?? $office->office_grade }}"
                        class="pb-2 block text-sm sm:text-base w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-blue border-gray-200">
                        <option value="main">Main Office</option>
                        <option value="branch">Branch Office</option>
                    </select>
                </div>


                <button type="submit"
                    class="px-4 py-2 mt-3 text-xs text-lg text-white transition-all duration-150 ease-linear rounded shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none">
                    Update office data
                </button>
                <a href="{{ route('office.index') }}"
                    class="text-xs bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
