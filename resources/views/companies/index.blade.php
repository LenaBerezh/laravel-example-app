<x-layout>
        <div class="my-5">
            <a class="my-5 bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('companies.create') }}">Create new Company</a>
        </div>
            <ul class="list-disc">
                @foreach($companies as $company)
                    <li><a class="font-medium text-blue-800 dark:text-blue-900 hover:underline" href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a></li>
                @endforeach
            </ul>
            {{ $companies->links() }}
</x-layout>
