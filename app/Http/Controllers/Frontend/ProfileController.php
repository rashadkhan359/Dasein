<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\PersonalInformationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function updatePersonalInformation(PersonalInformationRequest $request)
    {

        $user = User::find(auth()->id());

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
        $user->city = $request->city;
        $user->country = $request->country;
        $user->zip = $request->zip;
        $user->email = $request->email;
        $user->save();

        toastify()->success('Personal Information updated successfully');

        return redirect()->back();
    }


    public function passwordUpdate(PasswordUpdateRequest $request){
        $request->user()->update([
            'password' => bcrypt($request->input('password')),
        ]);

        toastify()->success('Password updated successfully');

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


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
