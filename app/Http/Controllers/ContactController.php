<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\StoreContact;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index(): View
    {
        return view('contact');
    }

    /**
     * Store a new message.
     */
    public function store(StoreContactRequest $request, StoreContact $action): RedirectResponse
    {
        $action->handle($request->validated());

        return to_route('contact.index')->with('success', 'تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.');
    }
}
