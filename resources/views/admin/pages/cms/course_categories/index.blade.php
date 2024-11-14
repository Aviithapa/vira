@extends('admin.layout.app')

@section('content')

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Vira</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Course Category</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
    
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('course_categories.create') }}" class="btn btn-primary" style="color: white;">Create New Category</a>
                                            </div>
                                            <h5 class="header-title mb-0">Course Category List</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Is Popup</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($categories as $indeyx => $data)
                                                        <tr>
                                                            <td></td>
                                                            <td>{{ $data->name }}</td>
                                                            {{-- <td>{{ $data->is_show_to_tab }}</td> --}}
                                                            <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_show_to_tab" {{ $data->is_show_to_tab ? 'checked' : '' }}>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('course_categories.edit', ['course_category' => $data->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                                <a  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"  data-attr="{{ route('course_categories.destroy', ['course_category' => $data->id]) }}" style="cursor: pointer;"><span class="badge bg-danger-subtle text-danger">Delete</span></a>                                                            
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="mySmallModalLabel">Delete Modal</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form  action="#" method="POST" id="deleteForm">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

@endsection

@push('scripts')
    <script>
            const exampleModal = document.getElementById('exampleModal')
            exampleModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const recipient = button.getAttribute('data-attr')
            document.getElementById('deleteForm').action = recipient; 
            })
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.toggle-checkbox').change(function() {
                var newsId = $(this).data('id');
                var attribute = $(this).data('attribute');
                var checked = $(this).prop('checked');

                $.ajax({
                    url: '/cms/news/' + newsId,
                    method: 'POST', // Use POST method
                    data: {
                        _method: 'PUT', // Use _method key to override method to PUT
                        _token: '{{ csrf_token() }}', // Include CSRF token for security
                        attribute: attribute,
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