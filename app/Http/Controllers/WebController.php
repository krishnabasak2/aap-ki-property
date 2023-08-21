<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\ContactForm;
use App\Models\Enquiry;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class WebController extends Controller
{

    private function common()
    {
        return Helper::siteDetails()->toArray();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['details'] = $this->common();

        $data['rental_property'] = Property::where(['status' => 'Approve', 'listing_for' => 'Rental'])->orderBy('id', 'DESC')->limit(10)->get();

        $data['selling_property'] = Property::where(['status' => 'Approve', 'listing_for' => 'Selling'])->orderBy('id', 'DESC')->limit(10)->get();

        return view('web.index', $data);
    }

    public function properties($type, Request $request)
    {
        $data['details'] = $this->common();
        $data['search'] = '';
        if ($type == 'rental') {
            $data['title'] = 'Rental Properties';
            $data['property'] = Property::where(['status' => 'Approve', 'listing_for' => 'Rental'])->orderBy('id', 'DESC')->paginate(15);
        } else if ($type == 'selling') {
            $data['title'] = 'Selling Properties';
            $data['property'] = Property::where(['status' => 'Approve', 'listing_for' => 'Selling'])->orderBy('id', 'DESC')->paginate(15);
        } else {
            return redirect()->back();
        }

        if (Request()->isMethod('POST')) {
            $request->validate([
                'search' => 'required'
            ], [], [
                'search' => 'Search'
            ]);

            $data['search'] = $request->search;
            $data['property'] = Property::where(['listing_for' => $type, 'status' => 'Approve'])->where('property_location', 'LIKE', "%$request->search%")->orderBy('id', 'DESC')->paginate(15);
        }

        return view('web.properties', $data);
    }

    public function list_properties(Request $request)
    {
        $data['title'] = 'List Your Property';
        $data['details'] = $this->common();

        if (Request()->isMethod('POST')) {
            $request->validate([
                'owner_name'        => 'required|string|max:255',
                'owner_mobile'      => 'required|string|min:10,max:13',
                'owner_email'       => 'required|email|max:255',
                'property_name'     => 'required|string|max:255',
                'property_address'  => 'required|string|max:1000',
                'property_location' => 'required|string|max:500',
                'size'              => 'required|string|max:500',
                'type'              => 'required|in:Residential,Commercial',
                'listing_for'       => 'required|in:Selling,Rental',
                'property_price'    => 'required|string',
                'images.*'          => 'required|mimes:jpg,jpeg,png,webp|max:2050',
            ], [], [
                'owner_name'        => 'Owner Name',
                'owner_mobile'      => 'Owner Phone',
                'owner_email'       => 'Owner Email',
                'property_name'     => 'Property Name',
                'property_address'  => 'Property Address',
                'property_location' => 'Property Location',
                'type'              => 'Property Type',
                'size'              => 'Property Size',
                'listing_for'       => 'Property Listing For',
                'property_price'    => 'Property Price',
                'images'            => 'Property Images',
            ]);

            if (count($request->images) > 5) {
                return redirect()->back()->with('message', 'false|You Can Upload Maximum 5 Images.');
            }

            $images_path = [];

            if ($request->hasFile('images')) {
                foreach ($request['images'] as $image) {
                    $image_name = md5(rand(100, 1000)) . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/images/properties', $image_name);
                    $images_path[] = $image_name;
                }
            }

            $property_data = [
                'property_id'       => Helper::property_id(),
                'owner_name'        => $request['owner_name'],
                'owner_mobile'      => $request['owner_mobile'],
                'owner_email'       => $request['owner_email'],
                'property_name'     => $request['property_name'],
                'property_address'  => $request['property_address'],
                'property_location' => $request['property_location'],
                'type'              => $request['type'],
                'size'              => $request['size'],
                'listing_for'       => $request['listing_for'],
                'property_price'    => $request['property_price'],
                'property_images'   => json_encode($images_path),
            ];

            if (Property::insert($property_data)) {
                return redirect()->back()->with('message', 'success|Thank you for Listing; your request is currently under review, and we will provide an update as soon as approval is granted.');
            } else {
                return redirect()->back()->with('message', 'false|Opps! Something Went Wrong, Please Try Again After Some Time.');
            };
        }

        return view('web.list_properties', $data);
    }

    public function enquiries(Request $request)
    {
        $validate = validator($request->all(), [
            "name"          => 'required|string|max:255',
            "email"         => 'required|email|max:255',
            "phone"         => 'required|string|min:10|max:13',
            // "subject"       => 'required|string|max:500',
            // "message"       => 'required|string|max:1000',
            "property_id"   => 'required|string',
        ], [], [
            "name"          => 'Name',
            "email"         => 'Email',
            "phone"         => 'Phone',
            // "subject"       => 'Subject',
            // "message"       => 'Message',
            "property_id"   => "Property Details",
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => false, 'message' => $validate->errors()->all()]);
        }

        $enquiry = new Enquiry;
        $enquiry->enquiry_id    = Helper::enquiry_id();
        $enquiry->name          = $request['name'];
        $enquiry->email         = $request['email'];
        $enquiry->phone         = $request['phone'];
        // $enquiry->subject       = $request['subject'];
        // $enquiry->message       = $request['message'];
        $enquiry->property_id   = $request['property_id'];

        if ($enquiry->save()) {
            return response()->json(['status' => true, 'message' => 'Your Enquiry Details Have Been Submitted Successfully.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something Went Wrong.']);
        }

        return response()->json($request);
    }

    public function contact_form(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|max:255',
            'phone'         => 'required|max:13',
            'subject'       => 'required|max:500',
            'message'       => 'required|max:2000',
        ], [], [
            'name'          => 'Full Name',
            'email'         => 'Email-Id',
            'phone'         => 'Phone Number',
            'subject'       => 'Subject',
            'message'       => 'Message',
        ]);

        $request['contact_id'] = Helper::contact_id();
        $create = ContactForm::insert([$request->except('_token')]);
        if ($create) {
            return redirect("/?status=success&message=Your Contact Details Have Been Submitted Successfully.");
        } else {
            return redirect("/?status=false&message=Something Went Wrong.");
        }
    }
}
