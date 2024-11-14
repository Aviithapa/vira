@extends('website.layout.app')

@section('content')

<div class="container mx-auto p-6">
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold mb-6">Course Categories</h1>

        <!-- Tab Navigation -->
        <div class="flex mb-6 space-x-5">
            <!-- "All Courses" Button -->
            <button id="all-courses-btn"
                    class="px-2 py-1 text-[#102c52] text-sm bg-white border border-[#ddd] hover:bg-[#102c52] hover:text-white transition-all duration-300 min-w-[100px]"
                    onclick="showAllCourses()">
                All Courses
            </button>
            @foreach($categories as $category)
                <button id="tab-{{ $category->id }}"
                        class="px-2 py-1 text-[#102c52] text-sm bg-white border border-[#ddd] hover:bg-[#102c52] hover:text-white transition-all duration-300 min-w-[100px]"
                        onclick="showCourses({{ $category->id }})">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    </div>
    
    <!-- Tab Content -->
    <div id="tab-content" class="mt-6 space-y-8">
        <!-- All Courses Content (Initially Visible) -->
        <div id="all-courses">
            <div class="bg-white">
                <!-- All Courses Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($categories as $category)
                        @foreach($category->courses as $course)
                            <div class="border border-gray-300 p-6 shadow-sm hover:shadow-lg transition-shadow duration-200 rounded-lg">
                                <img src="{{ $course->image_url }}" alt="{{ $course->title }} image" class="w-full h-48 object-cover rounded-t-lg mb-4">
                                
                                <!-- Category Tag Below Image -->
                                <div class="mt-2">
                                    <span class="bg-[#102c52] text-white text-sm px-3 py-1">
                                        {{ $category->name }}
                                    </span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-2">{{ $course->title }}</h3>
                                    <p class="text-gray-500 mb-4">{!! Str::limit($course->description, 120) !!}</p>
                                </div>

                                <!-- Learn More Button -->
                                <a href="{{ route('course-details', ['id' => $course->id]) }}" 
                                   class="mt-3 inline-block px-4 py-2 bg-[#102c52] text-white text-sm rounded-lg hover:bg-[#1e4879]">
                                    Learn More
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Category-Specific Courses Content -->
        @foreach($categories as $category)
            <div id="category-{{ $category->id }}" class="hidden">
                <div class="bg-white">
                    <!-- Course Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($category->courses as $course)
                            <div class="border border-gray-300 p-6 shadow-sm hover:shadow-lg transition-shadow duration-200 rounded-lg">
                                <img src="{{ $course->image_url }}" alt="{{ $course->title }} image" class="w-full h-48 object-cover rounded-t-lg mb-4">
                                
                                <!-- Category Tag Below Image -->
                                <div class="mt-2">
                                    <span class="bg-[#102c52] text-white text-sm px-3 py-1">
                                        {{ $category->name }}
                                    </span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-3 mt-2">{{ $course->title }}</h3>
                                    <p class="text-gray-500 mb-4">{!! Str::limit($course->description, 120) !!}</p>
                                </div>

                                <!-- Learn More Button -->
                                <a href="{{ route('course-details', ['id' => $course->id]) }}" 
                                   class="mt-3 inline-block px-4 py-2 bg-[#102c52] text-white text-sm rounded-lg hover:bg-[#1e4879]">
                                    Learn More
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.tailwindcss.com"></script>
<script>
    // Function to show courses based on tab clicked
    function showCourses(categoryId) {
        // Hide all category content
        const allCategories = document.querySelectorAll('#tab-content > div');
        allCategories.forEach(category => {
            category.classList.add('hidden');
        });

        // Hide "All Courses" view
        document.getElementById('all-courses').classList.add('hidden');

        // Remove active class from all tabs
        const allTabs = document.querySelectorAll('button');
        allTabs.forEach(tab => {
            tab.classList.remove('bg-[#102c52]', 'text-white');
            tab.classList.add('bg-white', 'text-[#102c52]');
        });

        // Show the selected category content
        const selectedCategory = document.getElementById('category-' + categoryId);
        selectedCategory.classList.remove('hidden');

        // Add active class to the selected tab
        const selectedTab = document.getElementById('tab-' + categoryId);
        selectedTab.classList.add('bg-[#102c52]', 'text-white');
        selectedTab.classList.remove('bg-white', 'text-[#102c52]');
    }

    // Function to show all courses
    function showAllCourses() {
        // Hide all category content
        const allCategories = document.querySelectorAll('#tab-content > div');
        allCategories.forEach(category => {
            category.classList.add('hidden');
        });

        // Show the "All Courses" view
        document.getElementById('all-courses').classList.remove('hidden');

        // Remove active class from all tabs
        const allTabs = document.querySelectorAll('button');
        allTabs.forEach(tab => {
            tab.classList.remove('bg-[#102c52]', 'text-white');
            tab.classList.add('bg-white', 'text-[#102c52]');
        });

        // Keep the "All Courses" button active
        const allCoursesTab = document.getElementById('all-courses-btn');
        allCoursesTab.classList.add('bg-[#102c52]', 'text-white');
        allCoursesTab.classList.remove('bg-white', 'text-[#102c52]');
    }

    // By default, show the "All Courses" view and highlight the "All Courses" button
    document.addEventListener('DOMContentLoaded', function() {
        showAllCourses();  // Show "All Courses" on page load
    });
</script>
@endpush
