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
                  </ol>
              </div>
              <h4 class="page-title">Student List</h4>
          </div>
      </div>
  </div>
  <!-- end page title --> 

  <div class="row">
      <div class="col-xl-12">
          <!-- Todo-->
          <div class="card">
              <div class="card-body p-0">
                  <div class="p-3">
                      <h5 class="header-title mb-0">Student Information</h5>
                  </div>

                  <div id="yearly-sales-collapse" class="collapse show">
                      <div class="table-responsive">
                          <table class="table table-nowrap table-hover mb-0">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Full Name</th>
                                      <th>Email</th>
                                      <th>Mobile Number</th>
                                      <th>Program</th>
                                      <th>Gender</th>
                                      
                                      <th>Edit</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($students as $user)
                                  <tr>
                                      <td>{{ $user->id }}</td>
                                      <td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                                      <td>{{ $user->email }}</td>
                                      <td>{{ $user->mobile_number }}</td>
                                      <td>{{ $user->program }}</td>
                                      <td>{{ ucfirst($user->gender) }}</td>
                                    
                                      <td>
                                          <a href="{{ route('student.edit', ['student' => $user->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                          <a href="{{ route('student.show', ['student' => $user->id]) }}"><span class="badge bg-success-subtle text-success">View</span></a>
                                          @if(!$user->login_credentials_generated)
                                                <a href="{{ route('student.generateLoginCredentials', ['id' => $user->id]) }}" class="badge bg-success-subtle text-success">Generate Login Credentials</a>
                                            @endif
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>

                          <div style="padding: 10px; float:right;">
                              {{  $students->appends(request()->query())->links('admin.layout.pagination') }}
                          </div>
                      </div>        
                  </div>
              </div>                           
          </div> <!-- end card-->
      </div> <!-- end col-->
  </div>

@endsection
