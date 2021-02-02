<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use PHPUnit\Exception;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $data = [];
        $user = Auth::user();

        if ($user->cover_image) {
            $image = $user->cover_image;
            $data['cover_image'] = '/users/images/cover/' . $image;
        } else {
            $data['cover_image'] = '/assets/images/cover.jpg';
        }

        if ($user->profile_image) {
            $image = $user->profile_image;
            $data['profile_image'] = '/users/images/profile/' . $image;
        } else {
            $data['profile_image'] = '/assets/images/avatar.png';
        }

        $data['created_at'] = date('d/m/Y - H.i', strtotime($user->created_at));
        $data['updated_at'] = date('d/m/Y - H.i', strtotime($user->updated_at));

        return view('board.profile.index', compact('data'));
    }

    public function edit()
    {
        $data = [];
        $user = Auth::user();

        if ($user->cover_image) {
            $image = $user->cover_image;
            $data['cover_image'] = '/users/images/cover/' . $image;
            $data['coverImageExist'] = true;
        } else {
            $data['cover_image'] = '/assets/images/cover.jpg';
            $data['coverImageExist'] = false;
        }

        if ($user->profile_image) {
            $image = $user->profile_image;
            $data['profile_image'] = '/users/images/profile/' . $image;
            $data['profileImageExist'] = true;
        } else {
            $data['profile_image'] = '/assets/images/avatar.png';
            $data['profileImageExist'] = false;
        }

        $data['created'] = date('d/m/Y - H.i', strtotime($user->created_at));

        return view('board.profile.edit', compact('data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePersonal(Request $request)
    {

        $id = Auth::user()->id;

        $request->flash();

        Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,' . $id,
            'biography' => 'max:255|nullable',
            'gender' => 'integer|min:0|max:2',
            'phone' => 'integer|nullable',
            'birthday' => 'nullable|date_format:d/m/Y|before:today',
            'website' => 'nullable|url',
            'city' => 'max:20',
        ])->validate();

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->biography = $request->biography;
        $user->gender = $request->gender;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->website = $request->website;
        $user->save();

        return redirect(route('profile.edit'))->with('status', 'Personal information has been updated.');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileImage(Request $request)
    {

        if ($request->hasFile('profile_image')) {

            $request->validate([
                'profile_image' => 'required|image|mimes:jpg,jpeg,png,gif|max:1024'
            ]);

            $username = Auth::user()->username;
            $image = Auth::user()->profile_image;
            $extension = $request->profile_image->getClientOriginalExtension();
            $file_name = uniqid($username . '_profile_') . '.' . $extension;

            if ($request->profile_image->move(public_path('users/images/profile'), $file_name)) {
                $this->deleteImage($image, 'profile');
                $user = User::find(Auth::user()->id);
                $user->profile_image = $file_name;
                $user->save();
            }
        }
        return redirect(route('profile.edit'))->with('status', 'Profile picture has been updated.');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function coverImage(Request $request)
    {

        if ($request->hasFile('cover_image')) {

            $request->validate([
                'cover_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $username = Auth::user()->username;
            $image = Auth::user()->cover_image;
            $extension = $request->cover_image->getClientOriginalExtension();
            $file_name = uniqid($username . '_cover_') . '.' . $extension;

            if ($request->cover_image->move(public_path('users/images/cover'), $file_name)) {
                $this->deleteImage($image, 'cover');
                $user = User::find(Auth::user()->id);
                $user->cover_image = $file_name;
                $user->save();
            }
        }
        return redirect(route('profile.edit'))->with('status', 'Cover picture has been updated.');
    }

    /**
     * @param $image
     * @param $path
     */
    private function deleteImage($image, $path)
    {
        $path = public_path('users/images/' . $path . '/' . $image);
        if (file_exists($path)) {
            @unlink($path);
        }
    }

    public function resetProfileImage()
    {
        $user = User::find(Auth::user()->id);
        $this->deleteImage($user->profile_image, 'profile');
        $user->profile_image = NULL;
        $user->save();
        return redirect(route('profile.edit'))->with('status', 'Profile image has been deleted successfully.');
    }

    public function resetCoverImage()
    {
        $user = User::find(Auth::user()->id);
        $this->deleteImage($user->cover_image, 'cover');
        $user->cover_image = NULL;
        $user->save();
        return redirect(route('profile.edit'))->with('status', 'Cover image has been deleted successfully.');
    }


}
