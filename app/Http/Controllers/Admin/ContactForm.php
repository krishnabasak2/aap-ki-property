<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm as ModelsContactForm;
use Illuminate\Http\Request;

class ContactForm extends Controller
{
    public function index($type)
    {
        if ($type == 'resolved') {
            $data['title'] = 'Resolved Contacts';
            $data['contacts'] = ModelsContactForm::where('status', 'Resolved')->paginate(10);
        } elseif ($type == 'pending') {
            $data['title'] = 'Pending Contacts';
            $data['contacts'] = ModelsContactForm::where('status', 'Pending')->paginate(10);
        } elseif ($type == 'trash') {
            $data['title'] = 'Trashed Contacts';
            $data['contacts'] = ModelsContactForm::onlyTrashed()->orderBy('id', 'DESC')->paginate(10);
        } else {
            $data['title'] = 'All Contacts';
            $data['contacts'] = ModelsContactForm::paginate(10);
        }

        // dd($data['enquiries']);
        return view('admin.contacts', $data);
    }

    public function status($id, $status)
    {
        $contact = ModelsContactForm::where('id', $id)->withTrashed()->first();
        
        if (empty($contact)) {
            return response()->json(['status' => false, 'message' => 'Something Went Wrong']);
        }

        if ($status == 'pending') {
            $contact->update(['status' => $status]);
        } elseif ($status == 'resolved') {
            $contact->update(['status' => $status]);
        } elseif ($status == 'trash') {

            $contact->delete();
            return response()->json(['status' => true, 'message' => 'Item Has Been Moved To Trash Successfully.']);
        } elseif ($status == 'restore') {
            $contact->restore();
            return response()->json(['status' => true, 'message' => 'Item Has Been Restored Successfully']);
        } elseif ($status == 'delete') {
            $contact->forceDelete();
            return response()->json(['status' => true, 'message' => 'Item Has Been Deleted Successfully']);
        }

        return response()->json(['status' => true, 'message' => 'Status Has Been Changeed Successfully.']);
    }
}
