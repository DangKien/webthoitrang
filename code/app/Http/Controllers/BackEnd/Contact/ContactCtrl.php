<?php

namespace App\Http\Controllers\BackEnd\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use App\Models\CustomerModel;


class ContactCtrl extends Controller
{
    public function index(ContactModel $contactModel) {
    	$contacts = $contactModel::paginate(15);
    	return view('BackEnd.content.contact.contact', ['contacts'=>$contacts]);
    }

    public function customer(CustomerModel $customerModel) {
    	$customer = $customerModel::paginate(15);
    	return view('BackEnd.content.customer.customer', ['customers'=>$customer]);
    }
}
