<?php
namespace App\Services;
use MailchimpMarketing\ApiClient;

Class Newsletter
{

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers'); //if null, use assignemnt, otherwise use whats provided

        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }

}
?>
