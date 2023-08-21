<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\isEmpty;

class PropertyController extends Controller
{
    public function index($type, $list_for = null)
    {
        if ($list_for == null) {
            if ($type == 'pending') {
                $data['title'] = 'Pending Properties';
                $data['properties'] = Property::where('status', 'Pending')->orderBy('id', 'DESC')->paginate(20);
            } elseif ($type == 'approved') {
                $data['title'] = 'Approved Properties';
                $data['properties'] = Property::where('status', 'Approve')->orderBy('id', 'DESC')->paginate(20);
            } elseif ($type == 'rejected') {
                $data['title'] = 'Rejected Properties';
                $data['properties'] = Property::where('status', 'Reject')->orderBy('id', 'DESC')->paginate(20);
            } elseif ($type == 'processed') {
                $data['title'] = 'Processed Properties';
                $data['properties'] = Property::where('status', 'Process')->orderBy('id', 'DESC')->paginate(20);
            } else {
                $data['title'] = 'All Properties';
                $data['properties'] = Property::orderBy('id', 'DESC')->paginate(20);
            }
        } elseif ($list_for == 'trash') {
            $data['title'] = 'Trashed Properties';
            $data['properties'] = Property::onlyTrashed()->orderBy('id', 'DESC')->paginate(20);
        } else {
            if ($type == 'pending') {
                $data['title'] = "Pending $list_for Properties";
                $data['properties'] = Property::where(['status' => 'Pending', 'listing_for' => $list_for])->orderBy('id', 'DESC')->paginate(20);
            } elseif ($type == 'approved') {
                $data['title'] = "Approved $list_for Properties";
                $data['properties'] = Property::where(['status' => 'Approve', 'listing_for' => $list_for])->orderBy('id', 'DESC')->paginate(20);
            } elseif ($type == 'rejected') {
                $data['title'] = "Rejected $list_for Properties";
                $data['properties'] = Property::where(['status' => 'Reject', 'listing_for' => $list_for])->orderBy('id', 'DESC')->paginate(20);
            } elseif ($type == 'processed') {
                $data['title'] = "Processed $list_for Properties";
                $data['properties'] = Property::where(['status' => 'process', 'listing_for' => $list_for])->orderBy('id', 'DESC')->paginate(20);
            } else {
                $data['title'] = "All $list_for Properties";
                $data['properties'] = Property::where(['listing_for' => $list_for])->orderBy('id', 'DESC')->paginate(20);
            }
        }

        return view('admin.property_list', $data);
    }

    public function status($id, $status)
    {
        $property = Property::where('id', $id)->withTrashed()->first();
        if (empty($property)) {
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
        }

        if ($status == 'pending') {
            $property->update(['status' => $status]);
        } elseif ($status == 'approve') {
            $property->update(['status' => $status]);
        } elseif ($status == 'reject') {
            $property->update(['status' => $status]);
        } elseif ($status == 'process') {
            $property->update(['status' => $status]);
        } elseif ($status == 'trash') {

            $property->delete();
            return response()->json(['status' => true, 'message' => 'Item Has Been Moved To Trash Successfully.']);
        } elseif ($status == 'restore') {
            $property->restore();
            return response()->json(['status' => true, 'message' => 'Item Has Been Restored Successfully']);
        } elseif ($status == 'delete') {
            if (!empty($images)) {
                $images = json_decode($property->property_images, true);
                foreach ($images as $image) {
                    if (File::exists('storage/images/properties/' . $image)) {
                        unlink('storage/images/properties/' . $image);
                    }
                }
            }
            $property->forceDelete();
            return response()->json(['status' => true, 'message' => 'Item Has Been Deleted Successfully']);
        }

        return response()->json(['status' => true, 'message' => 'Property Status Has Been Changed Successfully.']);
    }

    public function edit_property($id, Request $request)
    {
        $data['property'] = Property::where('id', $id)->withTrashed()->first();
        $data['title'] = "Edit Property";

        if (empty($data['property'])) {
            return redirect()->back();
        }

        if (Request()->isMethod('POST')) {
            $request->validate([
                'owner_name' => 'required',
                'owner_email' => 'required',
                'owner_mobile' => 'required',
                'property_name' => 'required',
                'property_address' => 'required',
                'property_location' => 'required',
                'size'              => 'required',
                'property_type' => 'required',
                'listing_for' => 'required',
                'property_price' => 'required',
            ], [], [
                'owner_name' => 'Owner Name',
                'owner_email' => 'Owner Email',
                'owner_mobile' => 'Owner Mobile',
                'property_name' => 'Property Name',
                'property_address' => 'Property Address',
                'property_location' => 'Property City',
                'property_type' => 'Property Type',
                'listing_for' => 'Listing For',
                'size'          => 'Property Size',
                'property_price' => 'Property Price',
            ]);

            $property['owner_name'] = $request['owner_name'];
            $property['owner_email'] = $request['owner_email'];
            $property['owner_mobile'] = $request['owner_mobile'];
            $property['property_name'] = $request['property_name'];
            $property['property_address'] = $request['property_address'];
            $property['property_location'] = $request['property_location'];
            $property['type'] = $request['property_type'];
            $property['size'] = $request['size'];
            $property['listing_for'] = $request['listing_for'];
            $property['property_price'] = $request['property_price'];

            if (Property::where('id', $id)->withTrashed()->update($property)) {
                return redirect()->back()->with('message', 'success|Property Has Been Updated Successfully.');
            } else {
                return redirect()->back()->with('message', 'false|Something Went Wrong.');
            }
        }

        return view('admin.edit_property', $data);
    }
}
