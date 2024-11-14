@extends('admin.layout.app')

@section('content')



                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">
                                        @if(isset($model))
                                        Edit
                                        @else
                                        Create 
                                        @endif
                                        News</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                    @if(isset($model))
                                        <form method="POST" action="{{ route('course_categories.update', ["course_category" => $model->id]) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                    @else
                                        <form method="POST" action="{{ route('course_categories.store') }}" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                            
                                        <div class="row"> 
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Name</label>
                                                    <input type="text" class="form-control" placeholder="name" name="name"  required value="{{ isset($model) ? $model->name :old('name') }}">
                                                        @if($errors->any())
                                                            {{ $errors->first('name') }}
                                                        @endif
                                                </div>
                                            </div>
                                            

                                            <div class="form-group mb-3">
                                                <label> Description </label>
                                                <textarea class="form-control" id="content" placeholder="Enter the Description" rows="10" name="description">{{ isset($model) ? $model->description :old('description') }}</textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="is_show_to_tab" class="block">Show to Tab</label>
                                                    <input type="checkbox" name="is_show_to_tab" id="is_show_to_tab" value="1" {{ isset($model) ? $model->is_show_to_tab ? 'checked' : '' : '' }}>
                                                </div>
                                            </div>
                                            
                                        </div>
                                            
                                        <button class="btn btn-primary mt-5" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

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
            ClassicEditor.create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
        <script> 
            const exampleModal = document.getElementById('exampleModal')
            exampleModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const recipient = button.getAttribute('data-attr')
             document.getElementById('deleteForm').action = recipient; 
            })
       </script>
@endpush
