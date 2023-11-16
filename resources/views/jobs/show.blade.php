<x-layout>
    <div class="grid grid-cols-12 gap-y-10 lg:gap-10">
        <div class="col-span-12 lg:col-span-9">
            <h1 class="text-gray-900">{{ $job->title }}</h1>
            <p>City: {{ $job->city }}</p>
            @if ($job->salary > 0)
                <p>Salary: {{ $job->salary }}$</p>
            @endif
            <h2 class="text-gray-900 mt-5">Job description</h2>
            <p>{{ $job->description }}</p>
            <div class="my-5">
                <h2 class="text-gray-900">Categories</h2>
                @foreach($job->categories as $category)
                    <span class="bg-green-600/20 text-green-600 px-2 py-0.5 rounded">{{ $category->name }}</span>
                @endforeach
            </div>
            <p>{{ $job->created_at->diffForHumans() }}</p>
        </div>
        <div class="col-span-12 lg:col-span-3">
            <div class="p-4 border rounded">
                <div class="mb-4">Company: {{ $job->company->name }}</div>
                <a class="block w-full bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('companies.show', $job->company->id) }}">View Profile</a></p>
            </div>
        </div>
    </div>
</x-layout>
