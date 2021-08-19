<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUsModel;
use App\Models\Inbox;
use App\Models\ContactInformation;

class AdminPagesController extends Controller
{
    public function about()
    {
        $about = AboutUsModel::find(1);

        return view('admin.pages.about-us', compact('about'));
    }

    public function aboutUpdate(Request $request, $id)
    {        
        $about = AboutUsModel::findOrFail($id)->update([
            'text' => $request->input('text')
        ]);

        return redirect()->back()->with(['message' => 'About Us Successfully Updated.', 'status' => 'success']);
    }

    public function contact()
    {
        $contact = ContactInformation::find(1);

        return view('admin.pages.contact-information', compact('contact'));
    }

    public function contactUpdate(Request $request, $id)
    {        
        $contact = ContactInformation::findOrFail($id)->update([
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);

        return redirect()->back()->with(['message' => 'Contact Information Updated Successfully.', 'status' => 'success']);
    }

    public function sendEmail()
    {
        $about = Inbox::find(1);

        return view('admin.pages.about-us', compact('about'));
    }

    public function inbox()
    {
        $inbox = Inbox::all();        

        return view('admin.pages.inbox', compact('inbox'));
    }
}
