@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Family Members Management</h4>
                        <div class="nowrapping">
                            <h6 class="left">Family Members Management</h6>
                            <a href="{{ url('admin/add-relationship') }}" class="btn btn-primary btn-sm font-weight-medium right">Add a relationship</a>
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
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Male
                                        </th>
                                        <th class="text-center">
                                            Female
                                        </th>
                                        <th class="text-center">
                                            Number of Children
                                        </th>
                                        <th class="text-center">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($relationships as $relationship)
                                    <tr>
                                        <td class="text-center">
                                            {{ $relationship['id']}}
                                        </td>
                                        <td class="text-center">
                                            {{ $relationship['family_name']}}
                                        </td>
                                        <td class="text-center">
                                            @if(!empty($relationship['male']['name']))
                                            {{ $relationship['male']['name']}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if(!empty($relationship['female']['name']))
                                            {{ $relationship['female']['name']}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ $relationship['number_of_children']}}
                                        </td>
                                        <td class="text-center">
                                            <a title="Edit " id="editRelationship" href="{{ url('admin/edit-relationship/'.$relationship['id']) }}"><i style="font-size: 25px; color: #5168f4" class="mdi mdi-pencil-box"></i></a>
                                            @if($relationship['id']>1)
                                            <a title="Delete Relationship" class="confirmDelete" href="javascript:void(0)" module="relationship" moduleid="{{$relationship['id']}}"><i style="font-size: 25px; color: #5168f4" class="mdi mdi-file-excel-box"></i></a>
                                            @endif
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