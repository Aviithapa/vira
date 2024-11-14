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
                                         Client / Partner</h4>
                                    <p class="text-muted mb-0">
                                    </p>
                                </div>
                                <div class="card-body">
                                       @if(isset($model))
                                             <form method="POST" action="{{ route('client.update', ["client" => $model->id]) }}" enctype="multipart/form-data">
                                                 @method('PUT')
                                        @else
                                            <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
                                        @endif
                                        @csrf
                              
                                        <div class="row"> 
                                         
                                            <div class="col-lg-6 col-md-6 col-sm-12"> 
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Partner / Client Name</label>
                                                    <input type="text" class="form-control" placeholder="Title" name="title"  required value={{ isset($model) ? $model->title :old('title') }}>
                                                      @if($errors->any())
                                                         {{ $errors->first('name') }}
                                                      @endif
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="validationCustom01">Type </label>
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Type" name="type" value="Client Management" disabled>
                                                     @if($errors->any())
                                                         {{ $errors->first('type') }}
                                                      @endif
                                                </div>
                                            </div>

                                             

                                             <div class="form-group mb-3">
                                                <label> Excerpt </label>
                                                <textarea class="form-control"  placeholder="Enter the Description" rows="5" name="excerpt">{{ isset($model) ? $model->excerpt :old('excerpt') }}</textarea>
                                            </div>

                                             <div class="form-group mb-3">
                                                <label> Content </label>
                                                <textarea class="form-control" id="content" placeholder="Enter the Description" rows="10" name="content">{{ isset($model) ? $model->content :old('content') }}</textarea>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="inputFile">Client / Partner Logo:</label>
                                               <input 
                                                type="file" 
                                                name="files[]" 
                                                id="inputFile"
                                                multiple
                                                class="form-control @error('files') is-invalid @enderror">
                                            </div>  
                                            @if(isset($model->media))  
                                                @foreach ($model->media as $media)
                                                    
                                                    <div class="col-lg-3 col-md-3 col-sm-6" style="position: relative;"> 
                                                        <img src="{{ getImage($media->path) }}" style="height: 200px;"/>
                                                        <a href="#" class="close-icon" data-toggle="modal" data-target="#confirmationModal{{ $media->id }}">
                                                            <i class="bi-x-circle" style="color:red"></i>
                                                        </a>
                                                    </div>
                                             @endforeach  
                                            @endif             
                                        </div>
                                            
                                        <button class="btn btn-primary mt-5" type="submit">Submit form</button>
                                    </form>

                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->


@endsection


@push('scripts')
     <script>
            ClassicEditor.create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
@endpush
