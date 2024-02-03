    @extends('backend.layout')
    @section('content')
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Edit Blog</h5>
                                @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
                                    @csrf
                                    
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-3" for="oooo">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" value="{{ $blog->title }}" class="form-control  @error('title') is-invalid @enderror" placeholder="Enter Title">
                                        @if ($errors->has('title'))
                                       <span class="text-danger">{{ $errors->first('title') }}</span>
                                       @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3" for="oooo">Discription</label>
                                    <div class="col-md-9">
                                        <textarea name="discription" class="form-control @error('discription') is-invalid @enderror">{{ $blog->description }}</textarea>
                                        @if ($errors->has('discription'))
                                       <span class="text-danger">{{ $errors->first('discription') }}</span>
                                       @endif
                                    </div>
                                </div>
                                
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                    <a href="{{route('blogList')}}" class="btn btn-warning">Cancel</a>
                                        <input type="submit" class="btn btn-primary float-right" value ="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
    @endsection
    