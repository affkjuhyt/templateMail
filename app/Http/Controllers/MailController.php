<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SendGrid\Mail\Mail;
use \Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function index() {
        return view('mail');
    }

    public function send(Request $request) {
        $request->validate([
            'email'    => 'required',
            'subject'  => 'required',
            'contents' => 'required',
        ]);

        $email = new Mail();
        $email->setFrom('nguyenthienlinhptit@gmail.com', 'harrythienn');
        $email->setSubject($request->subject);
        $email->addTo($request->email);
        $email->addContent("text/plain", $request->contents);

        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));

        $response = $sendgrid->send($email);
        if ($response->statusCode() == Response::HTTP_ACCEPTED) {
            return view('mail', ['successMessage' => 'Send email successfully！', 'errorMessage' => '']);
        } else {
            return view('mail', ['successMessage' => '', 'errorMessage' => 'Send email not successfully！']);
        }
    }
}
