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
                                <h5 class="card-title">Blog List</h5>
                                <p class="float-right text-primary">@can('isAdmin')<a href="{{route('create')}}">Create</a>@endcan</p>
                                <div class="table-responsive">
                                    @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Title</th>
                                                <th>Discripttion</th>
                                                <th>Status</th>
                                                <th>Create date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($blog as $key =>$row)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$row->title}}</td>
                                                <td>{{$row->description}}</td>
                                                <td>{{$row->status?'Active':'Inactive'}}</td>
                                                <td>{{$row->created_at}}</td>
                                                <td><a href="<a href="{{ route('admin.delete', ['id' => $row->id]) }}">Delete</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
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
    