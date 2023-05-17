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
                            <a href="{{ url('admin/add-member') }}" class="btn btn-primary btn-sm font-weight-medium right">Add a family member</a>
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
                                            Name
                                        </th>
                                        <th class="text-center">
                                            Gender
                                        </th>
                                        <th class="text-center">
                                            Generation
                                        </th>
                                        <th class="text-center">
                                            Status
                                        </th>
                                        <th class="text-center">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                    <tr>
                                        <td class="text-center">
                                            {{ $member['id']}}
                                        </td>
                                        <td class="text-center">
                                            @if(!empty($member['image']))
                                            <img style="height: 75px; width: 75px;" src="{{asset('admin/images/members/'.$member['image'])}}" alt="member">
                                            @else
                                            <img style="height: 75px; width: 75px;" src="{{asset('admin/images/profiles/dummy.jpg')}}" alt="member">
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ $member['name']}}
                                        </td>
                                        <td class="text-center">
                                            {{ $member['gender']}}
                                        </td>
                                        <td class="text-center">
                                            @if($member['generation'] < 0)
                                            Non-Relatives
                                            @else
                                            {{ $member['generation']}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($member['status'] == 1)
                                                <a href="javascript:void(0)" class="updateMemberStatus" id="member-{{$member['id']}}" member_id="{{$member['id']}}"><i style="font-size: 25px; color: #5168f4" class="mdi mdi-check-circle" status="Active"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="updateMemberStatus" id="member-{{$member['id']}}" member_id="{{$member['id']}}"><i style="font-size: 25px; color: #5168f4" class="mdi mdi-close-circle-outline" status="Inactive"></i></a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a title="Edit Member" id="editMember" href="{{ url('admin/edit-member/'.$member['id']) }}"><i style="font-size: 25px; color: #5168f4" class="mdi mdi-pencil-box"></i></a>
                                            @if($member['id']>2)
                                            <a title="Delete Member" class="confirmDelete" href="javascript:void(0)" module="member" moduleid="{{$member['id']}}"><i style="font-size: 25px; color: #5168f4" class="mdi mdi-file-excel-box"></i></a>
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