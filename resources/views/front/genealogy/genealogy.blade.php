@php
foreach($members as $key => $member) {
    if($member['generation']==0) {
        $gen0[$key] = $member;
    }
    if($member['generation']==1) {
        $gen1[$key] = $member;
    }
    if($member['generation']==2) {
        $gen2[$key] = $member;
    }
    if($member['generation']==3) {
        $gen3[$key] = $member;
    }
    if($member['generation']==4) {
        $gen4[$key] = $member;
    }
    if($member['generation']==5) {
        $gen5[$key] = $member;
    }
}
@endphp
@extends('front.layout.layout')
@section('content')
<div class="container">
  <div class="generation-column">
    <div class="generation" id="gen0"><span>Generation </span>0</div>
    <div class="generation" id="gen1"><span>Generation </span>1</div>
    <div class="generation" id="gen2"><span>Generation </span>2</div>
    <div class="generation" id="gen3"><span>Generation </span>3</div>
  </div>
  <div class="body genealogy-body genealogy-scroll" id="items-container">
    <div class="genealogy-tree" style="scale:1">
      <!-- Generation 0 -->
      <ul>
        <li>
          <a href="javascript:void(0);" class="top-root">
            <div class="root">
              <div class="member-view-box connector-a">
                <div class="member-image">
                  <img src="{{asset('images/dummy/profile.png')}}" class="border-male" alt="Member" />
                  <div class="member-details">
                    <h3>{{$gen0['0']['name']}}</h3>
                  </div>
                </div>
              </div>
              <div class="member-view-box connector-b">
                <div class="member-image">
                  <img src="{{asset('images/dummy/profile.png')}}" class="border-female"  alt="Member" />
                  <div class="member-details">
                    <h3>{{$gen0['0']['partner']['name']}}</h3>
                  </div>
                </div>
              </div>
            </div>
          </a>
          @if(!empty($gen1))
          <!-- Generation 1 -->
          <ul class="active" id="generation-1">
          @foreach($gen1 as $genOne)
            <li>
              @if($genOne['relationship_id']>0)
              <a href="javascript:void(0);" class="relationship">
                <div class="married">
                  <div class="member-view-box connector-a">
                    <div class="member-image">
                      <img src="{{asset('images/dummy/profile.png')}}" @if($genOne['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
                      <div class="member-details">
                        <h3>{{$genOne['name']}}</h3>
                      </div>
                    </div>
                  </div>
                  <span class="love">❤</span>
                  <div class="member-view-box connector-b">
                    <div class="member-image">
                      <img src="{{asset('images/dummy/profile.png')}}" @if($genOne['partner']['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
                      <div class="member-details">
                        <h3>{{$genOne['partner']['name']}}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
                @else
              <a href="javascript:void(0)">
                  <div class="member-view-box">
                    <div class="member-image">
                      <img src="{{asset('images/dummy/profile.png')}}" @if($genOne['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
                      <div class="member-details">
                        <h3>{{$genOne['name']}}</h3>
                      </div>
                    </div>
                  </div>
              </a>
              @endif
              @if(!empty($gen2))
              <!-- Generation 2 -->
              <ul id="generation-2">
              @foreach($gen2 as $genTwo)
                @if($genTwo['parent_id']==$genOne['relationship_id'])
                <li class="generation-2">
                      @if($genTwo['relationship_id']>0)
                      <a href="javascript:void(0);" class="relationship">
                        <div class="married">
                          <div class="member-view-box connector-a">
                            <div class="member-image">
                              <img src="{{asset('images/dummy/profile.png')}}" @if($genTwo['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
                              <div class="member-details">
                                <h3>{{$genTwo['name']}}</h3>
                              </div>
                            </div>
                          </div>
                          <span class="love">❤</span>
                          <div class="member-view-box connector-b">
                            <div class="member-image">
                              <img src="{{asset('images/dummy/profile.png')}}" @if($genTwo['partner']['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
                              <div class="member-details">
                                <h3>{{$genTwo['partner']['name']}}</h3>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                        @else
                        <a href="javascript:void(0);">
                          <div class="member-view-box">
                            <div class="member-image">
                              <img src="{{asset('images/dummy/profile.png')}}" @if($genTwo['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
                              <div class="member-details">
                                <h3>{{$genTwo['name']}}</h3>
                              </div>
                            </div>
                          </div>
                        </a>
                      @endif
                  
                  @if(!empty($gen3))
                  <!-- Generation 3 -->
                  <ul id="generation-3">
                  @foreach($gen3 as $genThree)
                    @if($genThree['parent_id']==$genTwo['relationship_id'])
                    <li class="generation-3">
                      <a href="javascript:void(0);" class="relationship">
                          @if($genThree['relationship_id']>0)
                            <div class="married">
                              <div class="member-view-box connector-a">
                                <div class="member-image">
                                  <img src="{{asset('images/dummy/profile.png')}}" @if($genThree['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
                                  <div class="member-details">
                                    <h3>{{$genThree['name']}}</h3>
                                  </div>
                                </div>
                              </div>
                              <span class="love">❤</span>
                              <div class="member-view-box connector-b">
                                <div class="member-image">
                                  <img src="{{asset('images/dummy/profile.png')}}" @if($genThree['partner']['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
                                  <div class="member-details">
                                    <h3>{{$genThree['partner']['name']}}</h3>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @else
                            <a href="javascript:void(0);">
                              <div class="member-view-box">
                                <div class="member-image">
                                  <img src="{{asset('images/dummy/profile.png')}}" @if($genThree['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
                                  <div class="member-details">
                                    <h3>{{$genThree['name']}}</h3>
                                  </div>
                                </div>
                              </div>
                            </a>
                          @endif
                      </a>
                    </li>
                    @endif
                  @endforeach
                  </ul>
                  @endif
                </li>
                @endif
              @endforeach
              </ul>
              @endif
            </li>
          @endforeach 
          @endif
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <div class="gen-filter">
    <div class="generation-0 container flexwrap hidden">
      <div class="member-image">
        <a href="{{url('/')}}">
          <img src="{{asset('images/dummy/profile.png')}}" class="border-male" alt="Member" />
          <div class="member-details">
            <h3>{{$gen0['0']['name']}}</h3>
          </div>
        </a>
      </div>
      <div class="member-image">
        <img src="{{asset('images/dummy/profile.png')}}" class="border-female" alt="Member" />
        <div class="member-details">
          <h3>{{$gen0['0']['partner']['name']}}</h3>
        </div>
      </div>
    </div>
    @if(!empty($gen1))
      <div class="generation-1 container flexwrap hidden">
        @foreach($gen1 as $genOne)
        @if($genOne['relationship_id']>0)
        <div>
          <div class="member-image mb-20">
            <img src="{{asset('images/dummy/profile.png')}}" @if($genOne['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
            <div class="member-details">
              <h3>{{$genOne['name']}}</h3>
            </div>
          </div>
          <div class="member-image">
            <img src="{{asset('images/dummy/profile.png')}}" @if($genOne['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
            <div class="member-details">
              <h3>{{$genOne['partner']['name']}}</h3>
            </div>
          </div>
        </div>
        @else
        <div class="member-image">
          <img src="{{asset('images/dummy/profile.png')}}" @if($genOne['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
          <div class="member-details">
            <h3>{{$genOne['name']}}</h3>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    @endif
    @if(!empty($gen2))
    <div class="generation-2 container flexwrap hidden">
      @foreach($gen2 as $genTwo)
      @if($genTwo['relationship_id']>0)
      <div>
        <div class="member-image mb-20">
          <img src="{{asset('images/dummy/profile.png')}}" @if($genTwo['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
          <div class="member-details">
            <h3>{{$genTwo['name']}}</h3>
          </div>
        </div>
        <div class="member-image">
          <img src="{{asset('images/dummy/profile.png')}}" @if($genTwo['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
          <div class="member-details">
            <h3>{{$genTwo['partner']['name']}}</h3>
          </div>
        </div>
      </div>
      @else
      <div class="member-image">
        <img src="{{asset('images/dummy/profile.png')}}" @if($genTwo['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
        <div class="member-details">
          <h3>{{$genTwo['name']}}</h3>
        </div>
      </div>
      @endif
    @endforeach
    </div>
    @endif
    @if(!empty($gen3))
    <div class="generation-3 container flexwrap hidden">
      @foreach($gen3 as $genThree)
      @if($genThree['relationship_id']>0)
      <div>
        <div class="member-image mb-20">
          <img src="{{asset('images/dummy/profile.png')}}" @if($genThree['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
          <div class="member-details">
            <h3>{{$genThree['name']}}</h3>
          </div>
        </div>
        <div class="member-image">
          <img src="{{asset('images/dummy/profile.png')}}" @if($genThree['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
          <div class="member-details">
            <h3>{{$genThree['partner']['name']}}</h3>
          </div>
        </div>
      </div>
      @else
      <div class="member-image">
        <img src="{{asset('images/dummy/profile.png')}}" @if($genThree['gender']=="Male") class="border-male" @else class="border-female" @endif alt="Member" />
        <div class="member-details">
          <h3>{{$genThree['name']}}</h3>
        </div>
      </div>
      @endif
    @endforeach
    </div>
    @endif
  </div>
  <div class="actions-column">
    <div class="action"><a href="#" class="zoom-in"><i class='bx bxs-zoom-in icon-size'></i></a></div>
    <div class="action"><a href="#" class="zoom-out"><i class='bx bxs-zoom-out icon-size'></i></a></div>
    <div class="action"><a href="#" class="reset-zoom"><i class='bx bx-reset icon-size'></i></a></div>
    <div class="action"><a href="#" class="fullscreen"><i class='bx bx-fullscreen icon-size'></i></a></div>
  </div>
</div>
@endsection
