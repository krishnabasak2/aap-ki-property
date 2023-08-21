<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\Models\Enquiry;
use App\Models\Property;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainContoller extends Controller
{
    public function login(Request $request)
    {
        $data['title'] = 'Admin Login';

        if (Request()->isMethod('POST')) {
            $request->validate([
                'email'     => 'required|email',
                'password'     => 'required|min:8',
            ], [], [
                'email'     => 'Email',
                'password'     => 'Password',
            ]);

            $credential = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($credential)) {
                return redirect('admin');
            } else {
                return redirect()->back()->with('message', 'false|Please input valid Credential!');
            }
        }

        return view('admin.login', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login')->with('message', 'success|Logout Successfull.');
    }

    public function index()
    {
        $data['title'] = 'Admin Dashboard';

        $data['total_approve_property'] = Property::where('status', 'Approve')->count();

        $data['total_processed_property'] = Property::where('status', 'process')->count();

        $data['total_pending_property'] = Property::where('status', 'Pending')->count();

        $data['total_rental_property'] = Property::where(['status' => 'Approve', 'listing_for' => 'Rental'])->count();

        $data['total_selling_property'] = Property::where(['status' => 'Approve', 'listing_for' => 'Selling'])->count();


        $data['total_pending_enquiry'] = Enquiry::where('status', 'Pending')->count();

        $data['total_resolve_enquiry'] = Enquiry::where('status', 'Resolved')->count();


        $data['total_pending_contact'] = ContactForm::where('status', 'Pending')->count();

        $data['total_resolve_contact'] = ContactForm::where('status', 'Resolved')->count();

        // dd($data);

        return view('admin.index', $data);
    }

    public function settings(Request $request)
    {
        $data['title'] = 'Site Settings';
        $data['settings'] = Setting::first();

        if (Request()->isMethod('POST')) {
            $request->validate([
                'email_id'     => 'required|email',
                'address'      => 'required|string|max:500',
                'youtube'      => 'nullable|url|max:1000',
                'twitter'      => 'nullable|url|max:1000',
                'instagram'    => 'nullable|url|max:1000',
                'facebook'     => 'nullable|url|max:1000',
                'maps'         => 'nullable|url|max:1000',
                'contact_no'   => 'required|string|max:13',
            ], [], [
                'email_id'     => 'Email ID',
                'address'      => 'Address',
                'contact_no'   => 'Contact NO',
            ]);

            $settings = Setting::first();

            $update_data = [
                'email_id'      => $request['email_id'],
                'address'       => $request['address'],
                'youtube'       => $request['youtube'],
                'twitter'       => $request['twitter'],
                'instagram'     => $request['instagram'],
                'facebook'      => $request['facebook'],
                'maps'          => $request['maps'],
                'contact_no'    => $request['contact_no'],
            ];

            if ($settings->update($update_data)) {
                return redirect()->back()->with('message', 'success|Settings Has Been Updated Successfully.');
            } else {
                return redirect()->back()->with('message', 'false|Something Went Wrong! Please Try Again Afer Some Time.');
            }
        }

        return view('admin.settings', $data);
    }

    public function profile(Request $request)
    {
        $data['title'] = 'My Profile';

        if (Request()->isMethod('POST')) {
            $request->validate([
                'email'                     => 'required|email',
                'password'                  => 'sometimes|nullable|confirmed|min:8',
                'password_confirmation'     => 'sometimes|nullable|required_with:password|min:8',
            ], [], [
                'email'                     => 'Email',
                'password'                  => 'New Password',
                'password_confirmation'     => 'Confirm Password',
            ]);

            $admin = User::where('id', Auth::id())->first();
            if ($request['password']) {
                $admin->password = Hash::make($request['password']);
            }
            $admin->email = $request['email'];

            if ($admin->save()) {
                return redirect()->back()->with('message', 'success|Your Profile Has Been Updated Successfully.');
            } else {
                return redirect()->back()->with('message', 'false|Something Went Wrong.');
            }
        }

        return view('admin.profile', $data);
    }
}
