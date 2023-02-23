<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use App\Mail\NewUserMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $branch = $request->input('branch');
        $role = $request->input('role');
        $to = $request->input('to');
        $subject = $request->input('subject');
        $content = $request->input('content');

        // Determine the email template based on the branch and role
        switch ($branch) {
            case 'branch1':
                switch ($role) {
                    case 'role1':
                        $template = new WelcomeMail($content);
                        break;
                    case 'role2':
                        $template = new NewUserMail($content);
                        break;
                }
                break;
            case 'branch2':
                switch ($role) {
                    case 'role1':
                        $template = new WelcomeMail($content);
                        break;
                    case 'role2':
                        $template = new NewUserMail($content);
                        break;
                }
                break;
        }

        // Send the email
        Mail::to($to)->send($template);

        return response()->json(['message' => 'Email sent successfully']);
    }
}
