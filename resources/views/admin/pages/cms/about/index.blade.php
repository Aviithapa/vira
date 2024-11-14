@extends('admin.layout.app')

@section('content')

        <!-- start page title -->
                @include('admin.component.breadcrumb', ['title' => "About Management"])
        <!-- end page title -->


        <!-- Body -->
        <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-3">
                                <h5 class="header-title mb-0" style="text-transform: capitalize;">About List</h5>
                            </div>
                            <div id="yearly-sales-collapse" class="collapse show row">
                                <!-- List -->
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                                <div class="card-body p-3">
                                                        <form method="POST" action="{{ route('about.store') }}" enctype="multipart/form-data">
                                                            @csrf 
                                                                <div>
                                                                        <div class="mb-3">
                                                                                <input type="hidden" class="form-control" name="id" required value="{{ isset($about) ? $about->id : old('id') }}">
                                                                                <label class="form-label" for="name">Title</label>
                                                                                <input type="text" class="form-control" placeholder="Title" name="title" required value="{{ isset($about) ? $about->title : old('title') }}">
                                                                                @if($errors->any())
                                                                                    {{ $errors->first('title') }}
                                                                                @endif
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="name">Tag Line</label>
                                                                                <input type="text" class="form-control" placeholder="tag line" name="excerpt" required value="{{ isset($about) ? $about->excerpt : old('excerpt') }}">
                                                                                @if($errors->any())
                                                                                    {{ $errors->first('excerpt') }}
                                                                                @endif
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label class="form-label" for="name">Content</label>
                                                                                <textarea class="form-control ckeditor" placeholder="Experience" rows="5" name="content">{{ isset($about) ? $about->content : old('content') }}</textarea>
                                                                                @if($errors->any())
                                                                                    {{ $errors->first('content') }}
                                                                                @endif
                                                                            </div>
                                                                                <div class="row">
                                                                                    @if ($about)
                                                                                            <div class="col-xl-4" style="position: relative; margin-top: 2px;">
                                                                                                    <img src="{{ $about->getImageUrlAttribute() }}" alt="{{ $about->title }}" style="object-fit: cover; width:100%; height: 200px;"/>
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
                                                                </div>
                                                                <div class="col-4 ">

                                                                        <button class="btn btn-primary ml-4" type="submit" style="margin-left: 10px;">Create About</button>
                                                                </div>
                                                        </form>
                                                </div>
                                        </div>
                                </div>

                                
                                <!-- List -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
        <!-- End Body -->

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const textareas = document.querySelectorAll('.ckeditor');
        textareas.forEach(textarea => {
            ClassicEditor.create(textarea)
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>
@endpush
