<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Category;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc');

        if (request('category')) {
            $jobs->whereHas('categories', function ($query) {
                $query->where('category_id', request('category'));
            });
        }

        if (request('city')) {
            $jobs->where('city', request('city'));
        }

        return view('jobs.index', [
            'jobs' => $jobs->cursorPaginate(10),
            'cities' => Job::select('city')->distinct()->get()->pluck('city'),
            'categories' => Category::all(),
            'selectedCategory' => request('category'),
            'selectedCity' => request('city'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create', [
            'company' => request('company'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $validated = $request->validated();

        $categories = explode(',', $validated['category']);
        $categories = array_map('trim', $categories);

        Category::insertOrIgnore(array_map(function ($category) {
            return ['name' => $category];
        }, $categories));

        $categories = Category::whereIn('name', $categories)->get();

        $job = Job::create($validated);
        $job->categories()->attach($categories);

        return redirect()->route('jobs.show', $job);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job,
            'categories' => $job->categories->pluck('name')->implode(', '),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $validated = $request->validated();

        $categories = explode(',', $validated['category']);
        $categories = array_map('trim', $categories);

        Category::insertOrIgnore(array_map(function ($category) {
            return ['name' => $category];
        }, $categories));

        $categories = Category::whereIn('name', $categories)->get();

        $job->update($validated);
        $job->categories()->sync($categories);

        return redirect()->route('jobs.show', $job);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $company = $job->company;
        Job::destroy($job->id);

        return redirect()->route('companies.show', $company);
    }
}
