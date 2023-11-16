<x-layout>
        <h1 class="text-gray-900">{{ $company->name }}</h1>
        <p>{{ $company->description }}</p>
        <div class="my-5">
            <a class="my-5 bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('jobs.create', ['company' => $company->id]) }}">Add new Job</a>
        </div>
        @if (count($jobs) > 0)
            <h2 class="mt-5 text-gray-900">Jobs</h2>
            <ul>
                @foreach ($jobs as $job)
                    <article class="mb-4 border rounded-md border-gray-2">
                        <div class="p-4">
                            <div class="grid items-center grid-cols-12">
                                <div class="col-span-12 lg:col-span-4">
                                    <h1 class="text-gray-900"><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a></h1>
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
                            <div class="flex justify-between">
                                <div class="">
                                    <span class="font-medium text-gray-900">Categories:</span>
                                    @foreach($job->categories as $category)
                                        <span class="bg-green-600/20 text-green-600 px-2 py-0.5 mx-1 rounded">{{ $category->name }}</span>
                                    @endforeach
                                </div>
                                <div class="justify-end">
                                    <form action="{{ route('jobs.destroy', ['company' => $company->id, 'job' => $job->id]) }}" method="POST">
                                        <a class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('jobs.edit', ['company' => $company->id, 'job' => $job->id]) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-800 hover:bg-red-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </ul>
        @endif
</x-layout>
