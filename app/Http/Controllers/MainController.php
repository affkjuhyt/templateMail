<?php

namespace App\Http\Controllers;

use SendGrid\Mail\Mail;

class MainController extends Controller
{
    public function main() {

        $email = new Mail();
        $email->setFrom("nguyenthienlinhptit@gmail.com", "Example User");
        $email->setSubject("Sending with SendGrid is Fun");
        $email->addTo("likioffical@gmail.com", "Example User");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }
}
