<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ApiController extends Controller
{
    //

    public function display() {
        $contacts = Contact::select('title', 'first_name', 'last_name','company_name','mobile')->get();

        return json_encode($contacts);
    }

    public function update(Request $request, $id) {

        $this->validate($request,[
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'company_name' => 'required',
        ]);
        
        $contact = Contact::findOrFail($id);
        $contact->title = $request->input('title');
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->mobile = $request->input('mobile');
        $contact->company_name = $request->input('company_name');
        $contact->save();
    }

    public function create(Request $request) {
        $this->validate($request,[
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'company_name' => 'required',
        ]);

        $contact = new Contact;
        $contact->title = $request->input('title');
        $contact->first_name = $request->input('first_name');
        $contact->last_name = $request->input('last_name');
        $contact->mobile = $request->input('mobile');
        $contact->company_name = $request->input('company_name');
        $contact->save();
    }
    public function destroy($id) {

        $contact = Contact::findOrFail($id);
        if($contact->delete()) {
            return "Successfully Deleted" . $id ;
        }


       
    }
}
