<x-layout>
    <div class="grid grid-cols-12 gap-y-10 lg:gap-10">
        <div class="col-span-12 lg:col-span-3">
            <div class="p-4 border rounded">
            <form action="{{ route('jobs.index') }}" method="GET">
                <div class="my-4">
                <select class="shadow  border rounded w-full py-2 px-3" name="category">
                    <option value="">All categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $selectedCategory ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="my-4">
                <select class="shadow  border rounded w-full py-2 px-3" name="city">
                    <option value="">All cities</option>
                    @foreach($cities as $city)
                        <option value="{{ $city }}" {{ $city == $selectedCity ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
                </div>
                <button class="w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Search</button>
            </form>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-9">
            @foreach($jobs as $job)
                <article class="mb-4 border rounded-md border-gray-2">
                    <div class="p-4">
                        <div class="grid items-center grid-cols-12">
                            <div class="col-span-12 lg:col-span-4">
                                <h1 class="text-gray-900"><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a></h1>
                                <p class="text-gray-400">Company: <a class="font-medium text-blue-800 dark:text-blue-900 hover:underline" href="{{ route('companies.show', $job->company->id) }}">{{ $job->company->name }}</a></p>
                                @if ($job->salary > 0)
                                    <p class="text-gray-400">Salary: {{ $job->salary }}$</p>
                                @endif
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <p class="text-gray-400">City: {{ $job->city }}</p>
                            </div>
                            <div class="col-span-12 lg:col-span-4">
                                <p class="text-gray-400">{{ $job->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50">
                        <span class="font-medium text-gray-900">Categories:</span>
                        @foreach($job->categories as $category)
                            <span class="bg-green-600/20 text-green-600 px-2 py-0.5 rounded">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </article>
            @endforeach
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
