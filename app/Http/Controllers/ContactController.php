<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // 1) Validate + honeypot
        $data = $request->validate([
            'name'          => 'required|string|max:120',
            'email'         => 'required|email|max:160',
            'website'       => 'nullable|url|max:200',
            'service'       => 'required|string|max:60',
            'budget'        => 'required|string|max:40',
            'message'       => 'nullable|string|max:5000',
            'company_field' => 'nullable|max:0', // honeypot: must stay empty
        ], [
            'company_field.max' => 'Spam detected.',
        ]);

        // Honeypot trigger: silently succeed (bot gets nothing)
        if ($request->filled('company_field')) {
            return back()->with('ok', 'Thanks! We received your message.')->withInput();
        }

        // 2) Prepare receiver & subject (from .env)
        $to      = env('MAIL_CONTACT_TO', 'admin@khanit.com.bd');
        $prefix  = env('MAIL_CONTACT_SUBJECT_PREFIX', '[Contact]');
        $subject = $prefix.' '.$data['service'].' – '.$data['name'];

        // 3) Sanitize/limit message
        $msg = Str::limit($data['message'] ?? '', 5000, '');

        // 4) Send via PHP mail() driver (MAIL_MAILER=mail)
        try {
            Mail::raw(
                "New Contact Submission (Lead Generation / Cold Email Marketing)\n\n"
                ."Name: {$data['name']}\n"
                ."Email: {$data['email']}\n"
                ."Website: ".($data['website'] ?? '-')."\n"
                ."Service: {$data['service']}\n"
                ."Budget: {$data['budget']}\n\n"
                ."Goals/Message:\n{$msg}\n\n"
                ."---\nIP: ".$request->ip()."\nUA: ".$request->userAgent(),
                function ($message) use ($data, $to, $subject) {
                    $message->to($to)
                            ->replyTo($data['email'], $data['name'])
                            ->subject($subject);
                }
            );

            return back()->with('ok', 'Thanks! We received your message.');
        } catch (\Throwable $e) {
            // log optional: \Log::error('Contact mail failed', ['e'=>$e->getMessage()]);
            return back()
                ->withErrors(['email' => 'Message could not be sent. Server mail() is unavailable.'])
                ->withInput();
        }
    }

    public function show(Request $request)
    {
        return view('pages.contact');
    }
}
