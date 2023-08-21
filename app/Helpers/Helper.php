<?php

namespace App\Helpers;

use App\Models\ContactForm;
use App\Models\Enquiry;
use App\Models\Property;
use App\Models\Setting;

class Helper
{
    public static function siteDetails()
    {
        $details = Setting::first();
        return $details;
    }

    public static function property_id()
    {
        $count = Property::count();
        return 'PRT' . $count;
    }

    public static function enquiry_id()
    {
        $count = Enquiry::count();
        return 'EQR' . $count;
    }

    public static function contact_id()
    {
        $count = ContactForm::count();
        return 'CNF' . $count;
    }
}
