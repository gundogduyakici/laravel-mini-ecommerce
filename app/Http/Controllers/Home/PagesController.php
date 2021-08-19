<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUsModel;
use Illuminate\Support\Facades\Mail;
use App\Models\Inbox;
use App\Models\ContactInformation;

class PagesController extends Controller
{
    public function about()
    {
        $about = AboutUsModel::find(1);
        return view('home.pages.about-us', compact('about'));
    }

    public function contact()
    {
        $contact = ContactInformation::findOrFail(1);        

        return view('home.pages.contact', compact('contact'));
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',            
            'email' => 'required|email:rfc,dns',
            'message' => 'required'            
        ]);

        $details = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message')
        ];

        $inbox = Inbox::create($details);        

        if($inbox) {
            Mail::to('info@valveradesign.com')->send(new \App\Mail\ContactFormAdmin($details));            
            return redirect()->back()->with(['message' => 'Teşekkürler! En kısa sürede tarafınıza dönüş yapılacaktır.', 'status' => 'success']);            
        }        

        return redirect()->back()->with(['message' => 'Beklenmedik bir hata meydana geldi. Lütfen tekrar deneyiniz.', 'status' => 'warning']);
    }
}
