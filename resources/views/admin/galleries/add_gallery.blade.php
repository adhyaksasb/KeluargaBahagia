@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Relationships Management</h3>
                        <a href="{{ url('admin/relationships') }}">Relationships</a> / Add Relationship
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Relationship</h4>
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
                        <form method="post" class="forms-sample" action="{{ url('admin/add-relationship') }}" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="parent_id">Select Male</label>
                                <br>
                                <select class="select2male" style="width:100%" name="male_id" id="male_id" required>
                                    <option value="" selected disabled>-- Select Male --</option>
                                    @if(!empty($males))
                                    @foreach($males as $male)
                                        <option value="{{ $male['id'] }}">[{{$male['id']}}] {{ $male['name'] }}</option>
                                    @endforeach
                                    @else
                                        <option value="0">There's no male with no relationship</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Select Female</label>
                                <br>
                                <select class="select2female" style="width:100%" name="female_id" id="female_id" required>
                                    <option value="" selected disabled>-- Select Female --</option>
                                    @if(!empty($females))
                                    @foreach($females as $female)
                                        <option value="{{ $female['id'] }}">[{{$female['id']}}] {{ $female['name'] }}</option>
                                    @endforeach
                                    @else
                                        <option value="0">There's no female with no relationship</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Family Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="family_name"
                                    name="family_name"
                                    placeholder="Enter Full Name"
                                    required
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