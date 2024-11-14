@extends('website.layout.app')

@section('content')

<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Student Registration Form</h2>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Start -->
    <form action="{{ route('student_forms.store') }}" method="POST" enctype="multipart/form-data" class="p-6 bg-white rounded-lg shadow-md">
        @csrf

        <!-- Name Fields -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div>
                <label for="first_name" class="block font-medium text-gray-700">First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('first_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="middle_name" class="block font-medium text-gray-700">Middle Name</label>
                <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('middle_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="last_name" class="block font-medium text-gray-700">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('last_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- District -->
        <div class="mt-4">
            <label for="district" class="block font-medium text-gray-700">District</label>
            <input type="text" name="district" value="{{ old('district') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            @error('district')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contact Information -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mt-4">
            <div>
                <label for="mobile_number" class="block font-medium text-gray-700">Mobile Number</label>
                <input type="text" name="mobile_number" value="{{ old('mobile_number') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('mobile_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Photo Upload -->
        <div class="mt-4">
            <label for="photo" class="block font-medium text-gray-700">Select Photo</label>
            <input type="file" name="photo" class="w-full mt-1" />
            @error('photo')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gender, Program, and Shift -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3 mt-4">
            <div>
                <label for="gender" class="block font-medium text-gray-700">Gender</label>
                <select name="gender" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="program" class="block font-medium text-gray-700">Programs</label>
                <input type="text" name="program" value="{{ old('program') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('program')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="shift" class="block font-medium text-gray-700">Shift</label>
                <input type="text" name="shift" value="{{ old('shift') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('shift')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Qualification Information -->
        <div class="mt-4">
            <label for="college_name" class="block font-medium text-gray-700">+2/Others Qualification - College Name</label>
            <input type="text" name="college_name" value="{{ old('college_name') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            @error('college_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2">
            <div>
                <label for="total_gpa" class="block font-medium text-gray-700">11/12 Total GPA/%</label>
                <input type="text" name="total_gpa" value="{{ old('total_gpa') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('total_gpa')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- School Type -->
        <div class="mt-4">
            <label for="school_type" class="block font-medium text-gray-700">SEE/SLC Qualification - School Type</label>
            <input type="text" name="school_type" value="{{ old('school_type') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
            @error('school_type')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Parent Details -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mt-4">
            <div>
                <label for="father_mother_name" class="block font-medium text-gray-700">Father/Mother Name</label>
                <input type="text" name="father_mother_name" value="{{ old('father_mother_name') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('father_mother_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="father_mother_contact" class="block font-medium text-gray-700">Father/Mother Contact No.</label>
                <input type="text" name="father_mother_contact" value="{{ old('father_mother_contact') }}" class="w-full mt-1 border-gray-300 rounded-md shadow-sm" />
                @error('father_mother_contact')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Notes -->
        <div class="mt-4">
            <label for="notes" class="block font-medium text-gray-700">Notes</label>
            <textarea name="notes" rows="4" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('notes') }}</textarea>
            @error('notes')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Terms and condition -->
        <div class="mt-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="terms_accepted" class="border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ old('accept_terms') ? 'checked' : '' }}>
                <span class="ml-2 text-gray-700">I accept the <a href="#" class="text-blue-600 underline" target="_blank">terms and conditions</a>.</span>
            </label>
            @error('terms_accepted')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Submit</button>
        </div>
    </form>
</div>
@endsection


@push('scripts')
<script src="https://cdn.tailwindcss.com"></script>
@endpush