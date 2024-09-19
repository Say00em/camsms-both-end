<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;


class CategoryContactController extends Controller
{
    public function category_view()
    {
        $categories = Category::all();
        return view('dashboard.pages.category.index', compact('categories'));
    }

    public function category_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return back()->with('success', 'Category created successfully');
    }




    public function contact_view()
    {
        $contacts = Contact::all();
        return view('dashboard.pages.contact.index', [
            'contacts' => $contacts
        ]);
    }

    public function contact_create()
    {
        $categories = Category::all();
        $contact = Contact::all();
        return view('dashboard.pages.contact.create', compact('categories', 'contact'));
    }

    public function contact_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'category_id' => 'required',
            'address' => 'required',
        ]);

        $contact = new Contact();

        $contact->category_id = $request->category_id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->address = $request->address;
        $contact->avatar = $request->avatar;
        $contact->note = $request->note;
        $contact->save();
        return back()->with('success', 'Contact created successfully');
    }

    // public function contact_delete($id)
    // {
    //     $contact = Contact::find($id);
    //     $contact->delete();
    //     return back()->with('success', 'Contact deleted successfully');
    // }
}
