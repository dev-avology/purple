<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Services\UploadService;

class CustomerManagementController extends Controller
{

    private $sellerRole;
    private $buyerRole;
    private $deleteUser;
    private $uploadService;
    private $profilePhotoUploadPath;
    private $availableExtensions;

    public function __construct()
    {
        $this->sellerRole = 'seller';
        $this->buyerRole = 'buyer';
        $this->deleteUser = 1;
        $this->profilePhotoUploadPath = config('file-upload-paths.profile');
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->uploadService = new uploadService();
    }

    public function index()
    {
        $users = User::where('role', '!=', 'admin')->where('is_deleted', !$this->deleteUser)->get();
        $sellerRole = $this->sellerRole;
        return view('admin.customer-management.customers', compact('users', 'sellerRole'));
    }

    public function edit($userID, $role)
    {
        $user = $this->getUserDetails($userID, $role);

        if ($user) {
            return view('admin.customer-management.edit-seller', compact('user'));
        }
        return back()->with('error', 'Something went wrong while editing this user.');
    }

    public function update(Request $request)
    {
        if($request->user_avatar)
        {
            $profilePhoto = $this->uploadProfile($request->user_avatar);
            
            if (!$profilePhoto) {
                return response()->json(['message' => 'You have upload incorrect file type of profile photo.'], 400);
            }

            $profileData = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'display_name' => $request->display_name,
                'bio' =>  $request->bio,
                'user_avatar' => $profilePhoto,
            ];
        }
        else
        {
            $profileData = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'display_name' => $request->display_name,
                'bio' =>  $request->bio
            ];
        }

        $userUpdateStatus = User::find($request->user_id)->update([
            'email' => $request->user_email,
            'name' =>  $request->user_name
        ]);

        $profileUpdateStatus = Profile::where('user_id', $request->user_id)->update($profileData);

        if ($userUpdateStatus && $profileUpdateStatus) {
            return back()->with('success', 'Customer has been updated successfully.');
        }
        return back()->with('error', 'Something went wrong while updating the user\' data.');
    }

    public function delete($userID)
    {
        $deleteUser = ['is_deleted' => $this->deleteUser];

        if (User::where('id', $userID)->update($deleteUser)) {
            return back()->with('success', 'Customer has been deleted successfully.');
        }
        return back()->with('error', 'Something went wrong while deleting this user. Please try again.');
    }

    public function getSuspendedUsers()
    {
        $users = User::where('is_deleted', $this->deleteUser)->get();
        $sellerRole = $this->sellerRole;
        return view('admin.customer-management.suspended-customers', compact('users', 'sellerRole'));
    }

    public function unSuspendUser($userID)
    {
        $deleteUser = ['is_deleted' => !$this->deleteUser];

        if (User::where('id', $userID)->update($deleteUser)) {
            return back()->with('success', 'Customer has been restored successfully.');
        }
        return back()->with('error', 'Something went wrong while restoring this user. Please try again.');
    }

    public function viewBuyerCustomer($userID)
    {
        $user = $this->getUserDetails($userID, $this->buyerRole);

        if ($user) {
            return view('admin.customer-management.buyer-customer', compact('user'));
        }
        return back()->with('error', 'Something went wrong while fetching the user details.');
    }

    public function viewSellerCustomer($userID)
    {
        $user = $this->getUserDetails($userID, $this->sellerRole);
    
        if ($user) {
            return view('admin.customer-management.seller-customer', compact('user'));
        }
        return back()->with('error', 'Something went wrong while fetching the user details.');
    }

    private function getUserDetails($userID, $role)
    {
        return User::where([
            'id' => $userID, 
            'role' => $role, 
            'is_deleted' => !$this->deleteUser
        ])->first();
    }

    private function uploadProfile($userAvatar) {
        $profilePhoto = $this->uploadService->handleUploadedImages($userAvatar, $this->profilePhotoUploadPath, $this->availableExtensions);

        if (!$profilePhoto) return false;
        return $profilePhoto;
    }
}