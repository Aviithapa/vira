@extends('admin.layout.app')

@section('content')

  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box">
              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Vira</a></li>
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Student</a></li>
                      <li class="breadcrumb-item active">View Student</li>
                  </ol>
              </div>
              <h4 class="page-title">Student Details</h4>
          </div>
      </div>
  </div>
  <!-- end page title -->

  <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title mb-4">Student Admission Details</h5>

                  <!-- Student Photo Section -->
                  <div class="row mb-4">
                      <div class="col-md-12 text-center">
                          <strong>Student Photo</strong>
                          <br>
                          @if($student->photo)
                              <img src="{{ asset('storage/'.$student->photo) }}" alt="Student Photo" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                          @else
                              <p>No photo uploaded</p>
                          @endif
                      </div>
                  </div>

                  <!-- Student Information Section -->
                  <div class="row mb-3">
                      <div class="col-md-4">
                          <strong>Full Name:</strong>
                          <p>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</p>
                      </div>
                      <div class="col-md-4">
                          <strong>Gender:</strong>
                          <p>{{ $student->gender }}</p>
                      </div>
                      <div class="col-md-4">
                          <strong>Mobile Number:</strong>
                          <p>{{ $student->mobile_number }}</p>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-4">
                          <strong>Email:</strong>
                          <p>{{ $student->email }}</p>
                      </div>
                      <div class="col-md-4">
                          <strong>Program:</strong>
                          <p>{{ $student->program }}</p>
                      </div>
                      <div class="col-md-4">
                          <strong>Shift:</strong>
                          <p>{{ $student->shift }}</p>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-4">
                          <strong>College Name:</strong>
                          <p>{{ $student->college_name }}</p>
                      </div>
                      <div class="col-md-4">
                          <strong>District:</strong>
                          <p>{{ $student->district }}</p>
                      </div>
                      <div class="col-md-4">
                          <strong>School Type:</strong>
                          <p>{{ $student->school_type }}</p>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-4">
                          <strong>Father's Name:</strong>
                          <p>{{ $student->father_name }}</p>
                      </div>
                      <div class="col-md-4">
                          <strong>Father's Contact:</strong>
                          <p>{{ $student->father_contact }}</p>
                      </div>
                      <div class="col-md-4">
                          <strong>Notes:</strong>
                          <p>{{ $student->notes }}</p>
                      </div>
                  </div>

                  <div class="row mb-3">
                      <div class="col-md-4">
                          <strong>Terms Accepted:</strong>
                          <p>{{ $student->terms_accepted ? 'Yes' : 'No' }}</p>
                      </div>
                      <div class="col-md-4">
                          <strong>Login Credentials Generated:</strong>
                          <p>{{ $student->login_credentials_generated ? 'Yes' : 'No' }}</p>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>


  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Student Creditails  Details</h5>

              

                <!-- Student Information Section -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <strong>User Name:</strong>
                        <p>{{ isset($student->user) ? $student->user->username : ''}} </p>
                    </div>
                    <div class="col-md-4">
                        <strong>Password:</strong>
                        <p>{{ isset($student->user) ? $student->user->reference : '' }}</p>
                    </div>
                    <div class="col-md-4">
                        <strong>Email:</strong>
                        <p>{{ isset($student->user) ? $student->user->email : ''}}</p>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

@endsection
