<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $categories = CourseCategory::all();
        return view('admin.pages.cms.course_categories.index', compact('categories'));
    }

    // Show the form to create a new course category
    public function create()
    {
        return view('admin.pages.cms.course_categories.create');
    }

    // Store a newly created course category
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'is_show_to_tab' => 'required|boolean',
        ]);

        CourseCategory::create($validatedData);

        return redirect()->route('course_categories.index')->with('success', 'Course Category created successfully!');
    }

    // Show the form to edit an existing course category
    public function edit($id)
    {
        $category = CourseCategory::findOrFail($id);
        return view('admin.pages.cms.course_categories.edit', compact('category'));
    }

    // Update the course category
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'is_show_to_tab' => 'required|boolean',
        ]);

        $category = CourseCategory::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('course_categories.index')->with('success', 'Course Category updated successfully!');
    }

    // Delete the course category
    public function destroy($id)
    {
        $category = CourseCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('course_categories.index')->with('success', 'Course Category deleted successfully!');
    }
}
