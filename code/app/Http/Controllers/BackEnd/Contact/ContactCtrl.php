<?php

namespace App\Http\Controllers\BackEnd\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactModel;

class ContactCtrl extends Controller
{
    public function index(ContactModel $contactModel) {
    	$contacts = $contactModel::paginate(15);
    	return view('BackEnd.content.contact.contact', ['contacts'=>$contacts]);
    }
}
