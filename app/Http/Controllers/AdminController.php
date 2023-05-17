<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\FamilyMember;
use App\Models\Relationship;
use App\Models\Gallery;
use Carbon\Carbon;
use DB;
use Session;
use Image;

class AdminController extends Controller
{
    public function dashboard() {
        Session::put('page', 'dashboard');
        $memberCount = FamilyMember::count();
        $userCount = User::count();

        return view('admin.dashboard');
    }

    public function users() {
        Session::put('page', 'user');
        $users = User::get()->toArray();
        return view('admin.users.users', compact('users'));
    }

    public function familyMembers() {
        Session::put('page', 'member');
        $members = FamilyMember::get()->toArray();
        return view('admin.family_members.members', compact('members'));
    }

    public function galleries() {
        Session::put('page', 'gallery');
        $galleries = Gallery::with('user')->where('status',1)->get()->toArray();
        return view('admin.galleries.galleries', compact('galleries'));
    }

    public function updateUserStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            if($data['status'] == "Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            User::where('id', $data['user_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'user_id'=>$data['user_id']]);
        }
    }

    public function deleteUser($id) {
        User::where('id', $id)->delete();
        $message = "User has been deleted successfully!";
        
        return redirect()->back()->with('success_message', $message);
    }

    public function updateMemberStatus(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            if($data['status'] == "Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            FamilyMember::where('id', $data['member_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status, 'member_id'=>$data['member_id']]);
        }
    }

    public function deleteMember($id) {
        $image = FamilyMember::where('id',$id)->pluck('image')->first();
        $user_id = FamilyMember::where('id',$id)->pluck('user_id')->first();
        if(!empty($image)) {
            $image_path = 'admin/images/members/'.$image;

            if(file_exists($image_path)) {
                unlink($image_path);
            }
        }
        if($user_id > 0) {
            User::where('id',$id)->update(['member_id' => NULL]);
        }
        FamilyMember::where('id', $id)->delete();
        $message = "Family Member has been deleted successfully!";
        
        return redirect()->back()->with('success_message', $message);
    }

    public function addMember(Request $request) {
        Session::put('page', 'member');
        if(!empty(Auth::user()->member_id)) {
            $title = "Add Family Member";
            $user_id = 0;     
            $redirectTo = 'admin/members';
            $message = "You've successfully added a family member!";
        }else {
            $title = "Family Member Register";
            $user_id = Auth::user()->id;
            $redirectTo = 'admin/dashboard';
            $message = "You've successfully registered as family member!";
        }

        if($request->isMethod('post')) {
            $data = $request->all();
            if(!empty($data['parent_id'])) {
                $parentData = Relationship::with(['male' => function($query) {
                    $query->select('id', 'relationship_id', 'generation');
                }])->where('id', $data['parent_id'])->get()->toArray();
            }

            // Update Admin Photo
            if($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()) {
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = Str::random(40).'.'.$extension;
                    $memberPath = 'admin/images/members/'.$imageName;
                    $profilePath = 'admin/images/profiles/'.$imageName;
                    // Upload the Image
                    Image::make($image_tmp)->save($memberPath);
                    Image::make($image_tmp)->save($profilePath);
                }
            }else {
                $imageName = "";
            }

            DB::beginTransaction();
            $member = new FamilyMember;
            $member->user_id = $user_id;
            $member->partner_id = 0;
            if(!empty($data['parent_id'])) {
                $member->parent_id = $data['parent_id'];
                $member->father_id = $parentData[0]['male_id'];
                $member->mother_id = $parentData[0]['female_id'];
                $member->child_level = $data['child_level'];
            }
            $member->relationship_id = 0;
            $member->genealogy = $data['genealogy'];
            if($data['genealogy']=="Biological") {
                $member->generation = $parentData[0]['male']['generation']+1;
            } else {
                $member->generation = -11;
            }
            $member->name = $data['name'];
            $member->gender = $data['gender'];
            $member->born_date = $data['born_date'];
            $member->born_city = $data['born_city'];
            if(!empty($imageName)) {
                $member->image = $imageName;
            }
            if(!empty($data['died'])) {
                $member->died = $data['died'];
            }
            if(!empty($data['email'])) {
                $member->email = $data['email'];
            }
            if(!empty($data['mobile'])) {
                $member->mobile = $data['mobile'];
            }
            if(!empty($data['blood_type'])) {
                $member->blood_type = $data['blood_type'];
            }
            if(!empty($data['occupation'])) {
                $member->occupation = $data['occupation'];
            }
            $member->status = 1;
            $member->save();

            if(empty(Auth::user()->member_id)) {
                // Insert into Users Table
                $member_id = DB::getPdo()->lastInsertId();
                $user = User::find(Auth::user()->id);
                $user->member_id = $member_id;
                $user->image = $imageName;
                $user->save();
            }

            DB::commit();

            return redirect($redirectTo)->with('success_message', $message);
        }

        $relationships = Relationship::with(['male'=>function($query) {
            $query->select('id','relationship_id','generation');
        }])->get()->toArray();
        return view('admin.family_members.add_member', (compact('title','relationships')));
    }

    public function editMember(Request $request, $id) {
        Session::put('page', 'member');
        if($request->isMethod('post')) {
            $data = $request->all();

            // Update Admin Photo
            if($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()) {
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = Str::random(40).'.'.$extension;
                    $imagePath = 'admin/images/members/'.$imageName;
                    // Upload the Image
                    Image::make($image_tmp)->save($imagePath);

                    if(!empty($data['current_profile_image'])) {
                        $image_path = 'admin/images/members/'.$data['current_profile_image'];

                        if(file_exists($image_path)) {
                            unlink($image_path);
                        }
                    }
                }
            }else if(!empty($data['current_admin_image'])) {
                $imageName = $data['current_admin_image'];
            }else {
                $imageName = "";
            }

            $member = FamilyMember::find($id);
            $member->name = $data['name'];
            $member->gender = $data['gender'];
            $member->born_date = $data['born_date'];
            $member->born_city = $data['born_city'];
            if(!empty($imageName)) {
                $member->image = $imageName;
            }
            if(!empty($data['died'])) {
                $member->died = $data['died'];
            }
            if(!empty($data['email'])) {
                $member->email = $data['email'];
            }
            if(!empty($data['mobile'])) {
                $member->mobile = $data['mobile'];
            }
            if(!empty($data['blood_type'])) {
                $member->blood_type = $data['blood_type'];
            }
            if(!empty($data['occupation'])) {
                $member->occupation = $data['occupation'];
            }
            $member->save();

            return redirect('admin/members')->with('success_message', "You've successfully updated family members information!");
        }
        $memberInfo = FamilyMember::find($id);
        $relationships = Relationship::with(['male'=>function($query) {
            $query->select('id','relationship_id','generation');
        }])->get()->toArray();
        return view('admin.family_members.edit_member', (compact('relationships','memberInfo')));
    }

    public function registerMember(Request $request) {
        Session::put('page','member');
        if(empty(Auth::user()->member_id)) {
            if($request->isMethod('post')) {
                $data = $request->all();
    
                $user = User::find(Auth::user()->id);
                $user->member_id = $data['member_id'];
                $user->save();

                $member = FamilyMember::find($data['member_id']);
                $member->user_id = Auth::user()->id;
                $member->save();
                return redirect('admin/dashboard')->with('success_message', "You've successfully registered as family member!");
            }
        }else {
            return redirect('admin/dashboard');
        }
        $members = FamilyMember::where('user_id',0)->get()->toArray();
        return view('admin.family_members.register_member', compact('members'));
    }

    public function relationships() {
        Session::put('page', 'relationship');
        $relationships = Relationship::with('male','female')->get()->toArray();
        return view('admin.relationships.relationships', compact('relationships'));
    }

    public function addRelationship(Request $request) {
        Session::put('page', 'relationship');

        if($request->isMethod('post')) {
            $data = $request->all();
            DB::beginTransaction();
            $relationship = new Relationship;
            $relationship->family_name = $data['family_name'];
            $relationship->male_id = $data['male_id'];
            $relationship->female_id = $data['female_id'];
            $relationship->number_of_children = $data['number_of_children'];
            $relationship->save();

            // Insert into Male & Female Family Members Table
            $relationship_id = DB::getPdo()->lastInsertId();
            $male = FamilyMember::find($data['male_id']);
            $female = FamilyMember::find($data['female_id']);

            $male->relationship_id = $relationship_id;
            $male->partner_id = $data['female_id'];
            if($female['generation'] > $male['generation']) {
                $male->generation = $female['generation'];
            } else {
                $female->generation = $male['generation'];
            }
            $male->save();

            $female->relationship_id = $relationship_id;
            $female->partner_id = $data['male_id'];
            $female->save();

            DB::commit();

            return redirect('admin/relationships')->with('success_message', "You've successfully added a relationship!");
        }

        $males = FamilyMember::where('relationship_id', 0)->where('gender', "Male")->get()->toArray();
        $females = FamilyMember::where('relationship_id', 0)->where('gender', "Female")->get()->toArray();
        return view('admin.relationships.add_relationship', (compact('males','females')));
    }

    public function editRelationship(Request $request, $id) {
        Session::put('page', 'relationship');
        if($request->isMethod('post')) {
            $data = $request->all();

            $relationship = Relationship::find($id);
            $relationship->family_name = $data['family_name'];
            $relationship->number_of_children = $data['number_of_children'];
            $relationship->save();

            return redirect('admin/relationships')->with('success_message', "You've successfully updated relationships information!");
        }
        $relationshipInfo = Relationship::find($id);    
        $maleInfo = FamilyMember::where('id', $relationshipInfo['male_id'])->get()->toArray();
        $femaleInfo = FamilyMember::where('id', $relationshipInfo['female_id'])->get()->toArray();
        $males = FamilyMember::where('relationship_id', 0)->where('gender', "Male")->get()->toArray();
        $females = FamilyMember::where('relationship_id', 0)->where('gender', "Female")->get()->toArray();
        return view('admin.relationships.edit_relationship', (compact('males','females','relationshipInfo','maleInfo','femaleInfo')));
    }

    public function deleteRelationship($id) {
        // Update relationship id in Family Members table to 0
        FamilyMember::where('relationship_id', $id)->update(['partner_id'=>0,'relationship_id'=>0]);
        Relationship::where('id', $id)->delete();
        $message = "Relationship has been deleted successfully!";
        return redirect()->back()->with('success_message', $message);
    }
}
