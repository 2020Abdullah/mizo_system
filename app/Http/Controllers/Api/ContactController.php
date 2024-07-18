<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactCompany;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactProfile(){
        $contact = ContactCompany::where('is_active', 1)->first();
        return response()->json(['contact' => $contact]);
    }
    public function contactProfileUpdate(Request $request){
        ContactCompany::updateOrCreate([
            'is_active' => 1
        ],[
            'company_name' => $request->company_name,
            'info' => $request->info,
            'address' => $request->address,
            'phone' => $request->phone,
            'facebook_link' => $request->facebook_link,
            'instegram_link' => $request->instegram_link,
        ]);
        return response()->json(['status' => 'success', 'message' => 'تم تحديث بيانات التواصل بنجاح']);
    }
}
