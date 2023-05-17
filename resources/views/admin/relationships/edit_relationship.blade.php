@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Relationships Management</h3>
                        <a href="{{ url('admin/members') }}">Relationships</a> / Edit Relationship
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Relationship</h4>
                        @if(Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ Session::get('error_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <form method="post" class="forms-sample" action="{{ url('admin/edit-relationship/'.$relationshipInfo['id']) }}" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="name">Family Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="family_name"
                                    name="family_name"
                                    placeholder="Enter Full Name"
                                    value="{{$relationshipInfo['family_name']}}"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="name">Male</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Full Name"
                                    value="{{ $maleInfo[0]['name'] }} "
                                    readonly
                                />
                            </div>
                            <div class="form-group">
                                <label for="name">Female</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter Full Name"
                                    value="{{ $femaleInfo[0]['name'] }} "
                                    readonly
                                />
                            </div>
                            <div class="form-group born_order">
                                <label for="number_of_children">Number of Children</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="number_of_children"
                                    name="number_of_children"
                                    placeholder="Enter Born Order"
                                    max="9"
                                    value="{{$relationshipInfo['number_of_children']}}"
                                    required
                                />
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary mr-2">
                            Submit
                            </button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
@endsection