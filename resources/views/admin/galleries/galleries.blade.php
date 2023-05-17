@extends('admin.layout.layout')
@section('content')
@php
Use Carbon\Carbon;
@endphp
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Galleries Management</h4>
                        <div class="nowrapping">
                            <h6 class="left">Galleries Management</h6>
                            <a href="{{ url('admin/galleries/add-image') }}" class="btn btn-primary btn-sm font-weight-medium right">Add an image</a>
                        </div>
                        @if(Session::has('error_message'))
                        <br><br>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> {{ Session::get('error_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @if(Session::has('success_message'))
                        <br><br>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ Session::get('success_message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered" id="members">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            ID
                                        </th>
                                        <th class="text-center">
                                            Image
                                        </th>
                                        <th class="text-center">
                                            Uploaded By
                                        </th>
                                        <th class="text-center">
                                            Created At
                                        </th>
                                        <th class="text-center">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($galleries as $gallery)
                                    <tr>
                                        <td class="text-center">
                                            {{ $gallery['id']}}
                                        </td>
                                        <td class="text-center">
                                            {{ $gallery['image']}}
                                        </td>
                                        <td class="text-center">
                                            {{ $gallery['user']['name']}}
                                        </td>
                                        <td class="text-center">
                                            {{ Carbon::create($gallery['created_at'])->toDateTimeString()}}
                                        </td>
                                        <td class="text-center">
                                            <a title="Edit " id="editGallery" href="{{ url('admin/galleries/edit-image/'.$gallery['id']) }}"><i style="font-size: 25px; color: #5168f4" class="mdi mdi-pencil-box"></i></a>
                                            <a title="Delete Gallery" class="confirmDelete" href="javascript:void(0)" module="gallery" moduleid="{{$gallery['id']}}"><i style="font-size: 25px; color: #5168f4" class="mdi mdi-file-excel-box"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('admin.layout.footer')
    </div>
</div>
@endsection