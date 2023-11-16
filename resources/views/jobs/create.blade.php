<x-layout>
            <form class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4" action="{{ route('jobs.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="title">Title</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="title" id="title" value="{{ old('title') }}">
                    @error('title')
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
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="city">City</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="city" id="city" value="{{ old('city') }}">
                    @error('city')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="salary">Salary</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="salary" id="salary" value="{{ old('salary') }}">
                    @error('salary')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" for="category">Category (comma-separated)</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="category" id="category" value="{{ old('category') }}">
                    @error('category')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="company_id" value="{{ $company }}">
                <button class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Create</button>
        </x-layout>
