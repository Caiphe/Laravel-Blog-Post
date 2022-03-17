<?php
namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email){
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
        ]);

        return  $mailchimp->lists->addListMember('2c291e54e5', [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);

    }
}
