<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Contact;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportContacts;

class ContactsView extends Component
{

    use withPagination, withFileUploads;
    public $search_contacts, $contactFile;
    public $fileData;

    public $headers = [
        'Title','First Name' , 'Last Name', 'Mobile', 'Company', 
    ];

    public function getContacts() {

        return Contact::where(function($query){
            $query->where('first_name', 'LIKE' , "%{$this->search_contacts}%")
            ->where('last_name', 'LIKE' , "%{$this->search_contacts}%")
            ->where('mobile', 'LIKE' , "%{$this->search_contacts}%")
            ->where('company_name', 'LIKE' , "%{$this->search_contacts}%");
        })->get();
    }

    public function showModalContact($contact) {
        dd($contact);
        $this->dispatchBrowserEvent("showUpdateContact");
    }

    public function importContacts() {
        if($this->fileData) {
            Excel::import(new importContacts, $this->fileData);
            session()->flash('message', "Success Import File");
            $this->dispatchBrowserEvent("hideContactImport");
            // return redirect()->route('home');
        } else {
            $this->dispatchBrowserEvent("hideContactImport");
            session()->flash('message', 'No file!');
            // return redirect()->route('home');
        }
      
    }

    public function filter($row, $source) {

    }

    public function deleteContact($id) {
        Contact::where('id',$id)->delete();

        session()->flash('message', 'Success Delete!');
        return redirect()->route('home');
    }
    public function render()
    {
        $contacts = $this->getContacts();
        return view('livewire.contacts-view',[
            'contacts' => $contacts,
        ]);
    }
}
