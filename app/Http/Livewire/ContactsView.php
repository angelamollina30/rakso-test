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
    public $fileData, $contact =[];

    public $headers = [
        0 => 'Title',
        1 =>'First Name' ,
        2 =>  'Last Name',
        3 => 'Mobile',
        4 => 'Company', 
    ];

    public $source;
    public $row;

    public function getContacts() {

        return Contact::where(function($query){
            $query->where('first_name', 'LIKE' , "%{$this->search_contacts}%")
            ->orWhere('last_name', 'LIKE' , "%{$this->search_contacts}%")
            ->orWhere('mobile', 'LIKE' , "%{$this->search_contacts}%")
            ->orWhere('company_name', 'LIKE' , "%{$this->search_contacts}%");
        })->get()->toArray();
    }

    public function showModalContact(Contact $contact) {

        $this->contact = $contact->toArray();
        $this->dispatchBrowserEvent("showUpdateContact");
    }

    public function updateContact() {

        $this->validate([
            'contact.title' => 'required',
            'contact.first_name' => 'required',
            'contact.last_name' => 'required',
            'contact.mobile' => 'required',
            'contact.company_name' => 'required',
        ]);
        
        Contact::where('id', $this->contact['id'])
        ->update([
            'title' => $this->contact['title'],
            'first_name' => $this->contact['first_name'],
            'last_name' => $this->contact['last_name'],
            'mobile' => $this->contact['mobile'],
            'company_name' => $this->contact['company_name'],
        ]);
        session()->flash('message', 'Success Update!');
        $this->dispatchBrowserEvent("hideUpdateContact");
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
        $headers = $this->headers;
        switch($source) {
            case 0:
                $this->source = 'title';
                break;
            case 1:
                $this->source = 'first_name';
                break;
            case 2:
                $this->source = 'last_name';
                break;
            case 3:
                $this->source = 'mobile';
                break;
            case 4:
                $this->source = 'company_name';
                break;
        }

        switch($row) {
            case 0:
                $this->row = 'title';
                break;
            case 1:
                $this->row = 'first_name';
                break;
            case 2:
                $this->row = 'last_name';
                break;
            case 3:
                $this->row = 'mobile';
                break;
            case 4:
                $this->row = 'company_name';
                break;
        }
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
