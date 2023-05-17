@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Family Members Management</h3>
                        @if(!empty(Auth::user()->member_id))
                        <a href="{{ url('admin/members') }}">Family Members</a> / Edit Member
                        @else
                        Edit Member
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Member</h4>
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
                        <form method="post" class="forms-sample" action="{{ url('admin/edit-member/'.$memberInfo['id']) }}" enctype="multipart/form-data">@csrf
                            @if($memberInfo['genealogy'] == "production")
                            <div class="col" style="padding: unset;">
                                <label for="genealogy">Genealogy</label>
                                <div class="form-group row">
                                  <div class="col-sm-4">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input
                                          type="radio"
                                          class="form-check-input"
                                          name="genealogy"
                                          id="genealogy1"
                                          value="Biological"
                                          checked
                                        />
                                        Biological
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input
                                          type="radio"
                                          class="form-check-input"
                                          name="genealogy"
                                          id="genealogy2"
                                          value="Legal"
                                        />
                                        Legal
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input
                                          type="radio"
                                          class="form-check-input"
                                          name="genealogy"
                                          id="genealogy3"
                                          value="Other"
                                        />
                                        Other
                                      </label>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Select Parent</label>
                                <br>
                                <select class="select2member" style="width:100%" name="parent_id" id="parent_id" required>
                                    <option value="" selected disabled>-- Select Parent --</option>
                                    @foreach($relationships as $relationship)
                                        <option value="{{ $relationship['id'] }}" @if(!empty($memberInfo['parent_id']) && $relationship['id']==$memberInfo['parent_id']) selected @endif>{{ $relationship['family_name'] }} (Gen {{$relationship['male']['generation']}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group born_order">
                                <label for="child_level">Born Order</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="child_level"
                                    name="child_level"
                                    placeholder="Enter Born Order"
                                    max="9"
                                    required
                                    @if(!empty($memberInfo['id'])) value="{{ $memberInfo['child_level'] }}" @else value="{{ old('child_level') }}" @endif
                                />
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Enter Full Name"
                                    required
                                    @if(!empty($memberInfo['id'])) value="{{ $memberInfo['name'] }}" @else value="{{ old('name') }}" @endif
                                />
                            </div>
                            <div class="col" style="padding: unset;">
                                <label for="gender">Gender</label>
                                <div class="form-group row">
                                  <div class="col-sm-4">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input
                                          type="radio"
                                          class="form-check-input"
                                          name="gender"
                                          id="gender1"
                                          value="Male"
                                          checked
                                        />
                                        Male
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-sm-4">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input
                                          type="radio"
                                          class="form-check-input"
                                          name="gender"
                                          id="gender2"
                                          value="Female"
                                        />
                                        Female
                                      </label>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="born_date">Born Date</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="born_date"
                                    name="born_date"
                                    required
                                    @if(!empty($memberInfo['born_date'])) value="{{ $memberInfo['born_date'] }}" @else value="{{ old('born_date') }}" @endif
                                />
                            </div>
                            <div class="form-group">
                                <label for="born_city">Born City</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="born_city"
                                    name="born_city"
                                    placeholder="Enter Born City"
                                    required
                                    @if(!empty($memberInfo['born_city'])) value="{{ $memberInfo['born_city'] }}" @else value="{{ old('born_city') }}" @endif
                                />
                            </div>
                            @if(!empty(Auth::user()->member_id))
                            <div class="form-group">
                                <label for="died">Died Date (For late family members)</label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="died"
                                    name="died"
                                    @if(!empty($memberInfo['died'])) value="{{ $memberInfo['died'] }}" @else value="{{ old('died') }}" @endif
                                />
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="blood_type">Blood Type</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="blood_type"
                                    name="blood_type"
                                    placeholder="Enter Blood Type"
                                    @if(!empty($memberInfo['blood_type'])) value="{{ $memberInfo['blood_type'] }}" @else value="{{ old('blood_type') }}" @endif
                                />
                            </div>
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="occupation"
                                    name="occupation"
                                    placeholder="Enter Occupation"
                                    @if(!empty($memberInfo['occupation'])) value="{{ $memberInfo['occupation'] }}" @else value="{{ old('occupation') }}" @endif
                                />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Enter Email"
                                    @if(!empty($memberInfo['email'])) value="{{ $memberInfo['email'] }}" @else value="{{ old('email') }}" @endif
                                />
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile Number</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="mobile"
                                    name="mobile"
                                    placeholder="Enter Mobile Number"
                                    @if(!empty($memberInfo['mobile'])) value="{{ $memberInfo['mobile'] }}" @else value="{{ old('mobile') }}" @endif
                                />
                            </div>
                            <div class="form-group">
                                <label for="image">Profile Image (Recommended Size: 280x250 px)</label>
                                <input
                                  type="file"
                                  class="file-upload-default"
                                  id="image"
                                  name="image"
                                />
                                <div class="input-group col-xs-12">
                                  <input
                                    type="text"
                                    class="form-control file-upload-info"
                                    disabled
                                    placeholder="Upload Image"
                                  />
                                  <span class="input-group-append">
                                    <button
                                      class="file-upload-browse btn btn-primary"
                                      type="button"
                                    >
                                      Upload
                                    </button>
                                  </span>
                                </div>
                                @if(!empty($memberInfo['image']))
                                    <a target="_blank" href="{{ url('admin/images/profiles/'.$memberInfo['image']) }}">View Image</a>
                                    <input type="hidden" name="current_profile_image" value="{{ $memberInfo['image'] }}">
                                @endif
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