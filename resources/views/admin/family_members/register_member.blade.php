@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Family Members Management</h3>
                        <h5>Family Member Register</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Family Member Register</h4>
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
                        <form method="post" class="forms-sample" action="{{ url('admin/register-member') }}" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="member_id">Select Existing Member (If there's any)</label>
                                <br>
                                <select class="select2member" style="width:100%" name="member_id" id="member_id">
                                    <option value="" selected disabled>-- Select Member --</option>
                                    @foreach($members as $member)
                                        <option value="{{ $member['id'] }}">{{ $member['name'] }} (Gen {{$member['generation']}})</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label for="product_image">Product Image (Recommended Size: 1000x1000 px)</label>
                                <input
                                  type="file"
                                  class="file-upload-default"
                                  id="product_image"
                                  name="product_image"
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
                                @if(!empty($product['product_image']))
                                    <a target="_blank" href="{{ url('front/images/product_images/large/'.$product['product_image']) }}">View Image</a>&nbsp;|&nbsp;
                                    <a href="javascript:void(0)" class="confirmDelete" module="product-image" moduleid="{{$product['id'] }}">Delete Image</a>
                                    <input type="hidden" name="current_product_image" value="{{ $product['product_image'] }}">
                                @endif
                            </div> --}}
                            <button type="submit" class="btn btn-primary mr-2">
                            Submit
                            </button>
                        </form>
                        <hr>
                        <div class="form-group">
                            <label for="member_id">If you're not included as existing member, please register as a new member!</label>
                            <br>
                            <a href="{{url('admin/add-member')}}" class="btn btn-primary mr-2">Register as new member</a>
                        </div>
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