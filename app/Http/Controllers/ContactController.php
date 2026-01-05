<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('contact.index', compact('messages'));
    }

    public function show(ContactMessage $contact)
    {
        // Auto mark as read if new
        if ($contact->status === 'new') {
            $contact->update(['status' => 'read']);
        }

        return view('contact.show', [
            'message' => $contact
        ]);
    }

    public function destroy(ContactMessage $contact)
    {
        $contact->delete();

        Alert::success('Deleted', 'Message deleted successfully');
        return redirect()->route('contacts.index');
    }
}
