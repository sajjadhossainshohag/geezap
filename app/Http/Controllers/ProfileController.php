<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInfoUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\PersonalInfoUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\SocialMediaInfoUpdateRequest;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('profile.profile-setting');
    }

    public function updatePersonalInfo(PersonalInfoUpdateRequest $request, ProfileService $profileService): RedirectResponse
    {

         $profileService->updatePersonalInfo($request, Auth::user());
         return Redirect::route('profile.update')->with('status', 'Profile updated successfully');

    }

    public function updateContactInfo(ContactInfoUpdateRequest $request, ProfileService $profileService): RedirectResponse
    {
        $profileService->updateContactInfo($request, Auth::user());
        return Redirect::route('profile.update')->with('status', 'Contact info updated successfully');
    }

    public function updatePassword(PasswordUpdateRequest $request, ProfileService $profileService): RedirectResponse
    {
        $profileService->updatePassword($request, Auth::user());
        return Redirect::route('profile.update')->with('status', 'Password updated successfully');
    }

    public function updateSocialMediaInfo(SocialMediaInfoUpdateRequest $request, ProfileService $profileService): RedirectResponse
    {
        $profileService->updateSocialMediaInfo($request, Auth::user());
        return Redirect::route('profile.update')->with('status', 'Social media info updated successfully');
    }


    public function destroy(): RedirectResponse
    {
        $user = Auth::user();
        $user->delete();

        return Redirect::route('home')->with('success', 'Profile deleted successfully');
    }
}
