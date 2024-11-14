@extends('admin.layout.app')

@section('content')


  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ getSiteSetting('site_title') }}</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->




                    <div class="row">
                            <div class="col-xxl-12 col-sm-12">
                                <div class="card widget-flat text-white">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="header-title">
                                                    Message From 
                                                </h4>
                                                <p class="text-muted mb-0">
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('update.message', ['post' => $registrar->id]) }}" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label class="form-label" for="validationCustom01"> Name </label>
                                                            <input type="text" class="form-control" placeholder="Name" name="title" required value="{{ isset($registrar) ? $registrar->title : old('title') }}">
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="validationCustom01"> Post </label>
                                                            <input type="text" class="form-control" placeholder="Name" name="excerpt" required value="{{ isset($registrar) ? $registrar->excerpt : old('excerpt') }}">
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label class="form-label" for="validationCustom01"> Message </label>
                                                            <textarea class="form-control" id="content" placeholder="Enter the Message" rows="10" name="content">{{ isset($registrar) ? $registrar->content : old('content') }}</textarea>
                                                        </div>
                                                        <div class="row mt-2">
                                                            @if ($registrar)
                                                                    <div class="col-xl-4" style="position: relative; margin-top: 2px;">
                                                                            <img src="{{ $registrar->getImageUrlAttribute() }}" alt="{{ $registrar->title }}" style="object-fit: cover; width:100%; height: 200px;"/>
                                                                    </div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group mb-3">
                                                                    <label class="form-label" for="inputFile">Select Image:</label>
                                                                    <input
                                                                    type="file"
                                                                    name="file"
                                                                    accept="image/*"
                                                                    id="inputFile"
                                                                    class="form-control @error('file') is-invalid @enderror"/>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary mt-2" type="submit">Submit form</button>
                                                </form>
                                
                                            </div> <!-- end card-body-->
                                        </div> <!-- end card-->
                                    </div>
                                </div>
                            </div> 

                           
                        </div>

                        
                        </div>

                        

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to handle the blur event and send the AJAX request
        function sendData(fieldId, fieldName) {
            let value = $('#' + fieldId).val();
            
            $.ajax({
                url: 'https://nepalpharmacycouncil.org.np/cms/count', // Update this to the correct route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    field: fieldName,
                    value: value
                },
                success: function(response) {
                    console.log('Field saved successfully:', response);
                },
                error: function(xhr) {
                    console.error('Error saving field:', xhr.responseText);
                }
            });
        }

        // Attach the blur event to the input fields
        $('#totalPharmacists').blur(function() {
            sendData('totalPharmacists', 'total_number_of_pharmacist');
        });

        $('#totalPharmacyAssistants').blur(function() {
            sendData('totalPharmacyAssistants', 'total_number_of_pharmacy_assistant');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.toggle-checkbox').change(function() {
            var id = $(this).data('id');
            var checked = $(this).prop('checked');

            $.ajax({
                url: 'https://nepalpharmacycouncil.org.np/cms/setting',
                method: 'POST', // Use POST method
                data: {
                    _token: '{{ csrf_token() }}', // Include CSRF token for security
                    id: id,
                    checked: checked ? 1 : 0,
                },
                success: function(response) {
                    console.log(response); // Handle success response
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Handle error response
                }
            });
        });
    });
</script>
@endpush