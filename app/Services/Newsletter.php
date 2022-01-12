<?php
namespace App\Services;

Class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers'); //if null, use assignemnt, otherwise use whats provided

        return $this->getClient()->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed',
            'status_if_new' => 'subscribed'
        ]);
    }

    protected function getClient(){
        $mailchimp = new \MailchimpMarketing\ApiClient();

        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us20'
        ]);
    }
}
?>
