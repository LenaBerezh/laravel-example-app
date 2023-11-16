<x-layout>
            <form class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4" action="{{ route('companies.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="name">Name</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="description">Description</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <button class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Create</button>
            </form>
</x-layout>
