<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportContacts;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function delete($id) {
        Contact::where('id', $id)->delete();
        session()->flash('message', "Success Deletion");
        return redirect()->route('home');
    }

    public function import() {

        // dd($request->file('fileData'));
        if(request()->file('fileData')) {
            Excel::import(new importContacts, request()->file('fileData'));
            session()->flash('message', "Success Import File");
            return redirect()->route('home');
        } else {
            session()->flash('message', 'No file!');
            return redirect()->route('home');
        }
    }
}
