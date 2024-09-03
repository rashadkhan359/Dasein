<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\PersonalInformationRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function updatePersonalInformation(PersonalInformationRequest $request)
    {

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $extension = $avatar->getClientOriginalExtension(); // Use getOriginalClientExtension() to get the file extension
            $imageName = rand() . '_' . sha1(time()) . '.' . $extension;

            $avatar->move(public_path('uploads'), $imageName);

            $path = "uploads/" . $imageName;
            $user->avatar = $path;
        }

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->website = $request->website;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->zip = $request->zip;
        $user->email = $request->email;
        $user->save();

        flash()->success('Personal Information updated successfully');

        return redirect()->back();
    }


    public function passwordUpdate(PasswordUpdateRequest $request){
        $request->user()->update([
            'password' => bcrypt($request->input('password')),
        ]);

        flash()->success('Password updated successfully');

        return redirect()->back();
    }

    // public function postUpload(FileUploadRequest $request){
    //     $file = $request->input('avatar');

    //     $extension = File::extension($file['name']);
    //     $imageName = rand().'_'.sha1(time()).".{$extension}";
    //     $file->move(public_path('uploads'), $imageName);
    //     $path = "uploads/".$imageName;
    //         // $user->avatar = $path;

    //     if($upload_success) {
    //     	return Response::json('success', 200);
    //     } else {
    //     	return Response::json('error', 400);
    //     }
    // }

}
