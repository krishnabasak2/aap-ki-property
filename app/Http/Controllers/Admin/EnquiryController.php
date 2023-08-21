<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\Property;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index($type)
    {
        if ($type == 'resolved') {
            $data['title'] = 'Resolved Enquiries';
            $data['enquiries'] = Enquiry::with('getProperty')->where('status', 'Resolved')->paginate(20);
        } elseif ($type == 'pending') {
            $data['title'] = 'Pending Enquiries';
            $data['enquiries'] = Enquiry::with('getProperty')->where('status', 'Pending')->paginate(20);
        } elseif ($type == 'trash') {
            $data['title'] = 'Trashed Enquiries';
            $data['enquiries'] = Enquiry::with('getProperty')->onlyTrashed()->orderBy('id', 'DESC')->paginate(20);
        } else {
            $data['title'] = 'All Enquiries';
            $data['enquiries'] = Enquiry::with('getProperty')->paginate(20);
        }

        // dd($data['enquiries']);
        return view('admin.enquiries', $data);
    }

    public function status($id, $status)
    {
        $enquiry = Enquiry::where('id', $id)->withTrashed()->first();
        if (empty($enquiry)) {
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
        }

        if ($status == 'pending') {
            $enquiry->update(['status' => $status]);
        } elseif ($status == 'resolved') {
            $enquiry->update(['status' => $status]);
        } elseif ($status == 'trash') {

            $enquiry->delete();
            return response()->json(['status' => true, 'message' => 'Item Has Been Moved To Trash Successfully.']);
        } elseif ($status == 'restore') {
            $enquiry->restore();
            return response()->json(['status' => true, 'message' => 'Item Has Been Restored Successfully']);
        } elseif ($status == 'delete') {
            $enquiry->forceDelete();
            return response()->json(['status' => true, 'message' => 'Item Has Been Deleted Successfully']);
        }

        return response()->json(['status' => true, 'message' => 'Status Has Been Changeed Successfully.']);
    }
}
