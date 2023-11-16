<html>
    <head>
        <title>New Jobber Job</title>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="/">Jobs</a></li>
                    <li><a href="/companies">Companies</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <form action="{{ route('jobs.store') }}" method="POST">
                @csrf
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}">
                    @error('title')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description">{{ old('description') }}</textarea>
                    @error('description')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}">
                    @error('city')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" id="salary" value="{{ old('salary') }}">
                    @error('salary')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="category">Category (comma-separated)</label>
                    <input type="text" name="category" id="category" value="{{ old('category') }}">
                    @error('category')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="company_id" value="{{ $company }}">
                <button type="submit">Create</button>
        </section>
    </body>
</html>
