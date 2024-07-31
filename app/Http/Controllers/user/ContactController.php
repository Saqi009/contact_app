<?php

namespace App\Http\Controllers\user;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.contact.index', [
            'contacts' => Auth::user()->contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.contact.create', [
            'categories' => Category::where('user_id', '=', Auth::id())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'category_id' => ['required', 'required'],
            'email' => ['email', 'nullable'],
            'mobile' => ['required', 'string'],
            'dob' => ['date', 'nullable'],
            'facebook' => ['string', 'nullable'],
            'instagram' => ['string', 'nullable'],
            'youtube' => ['string', 'nullable'],
            'picture' => ['image', 'mimes:png,jpg,jpeg,webp', 'nullable'],
            'address' => ['string', 'nullable'],
        ]);

        if($request->picture) {
            $name = microtime(true) . $request->picture->hashName();
            $request->picture->move(public_path('/template/img/photos'), $name);
        } else {
            $name = null;
        }

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'category_id' => $request->category_id,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'dob' => $request->dob,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'picture' => $name,
            'address' => $request->address,

        ];

        if(Contact::create($data)) {
            return redirect()->back()->with(['success' => "Magic has been spelled!"]);
        } else {
            return redirect()->back()->with(['failure' => "Magic has become shopper!"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('user.contact.show', [
            'contact' => $contact
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('user.contact.edit', [
            'contact' => $contact,
            'categories' => Category::where('user_id', '=', Auth::id())->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'category_id' => ['required', 'numeric'],
            'mobile' => ['required', 'string'],
            'email' => ['nullable', 'email'],
        ]);

        $data = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'category_id' => $request->category_id,
            'mobile_number' => $request->mobile,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'dob' => $request->dob,
            'address' => $request->address,
        ];

        if ($contact->update($data)) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    public function picture(Request $request, Contact $contact)
    {
        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg,webp'],
        ]);

        $old_picture_path = 'template/img/photos/' . $contact->picture;
        $name = microtime(true) . $request->picture->hashName();

        $request->picture->move(public_path('template/img/photos/'), $name);

        if ($contact->picture && File::exists(public_path($old_picture_path))) {
            unlink(public_path($old_picture_path));
        }

        $data = [
            'picture' => $name,
        ];

        if ($contact->update($data)) {
            return back()->with(['success' => 'Magic has been spelled!']);
        } else {
            return back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if ($contact->delete()) {
            return redirect()->route('user.contacts')->with(['success' => 'Magic has been spelled!']);
        } else {
            return redirect()->route('user.contacts')->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
