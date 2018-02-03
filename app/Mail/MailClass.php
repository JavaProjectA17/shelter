<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class MailClass extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $nameshelter)
    {
        $this->url = URL::to('/');
        /*TO DO: url for employee */
        $this->url_verified = URL::to('/employee'); 
        $this->name = $name;
        $this->nameshelter = $nameshelter;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmation_of_establishment_of_shelter')
            ->with([
                'url' =>  $this->url,
                'url_verified' =>  $this->url_verified,
                'name' => $this->name,
                'nameshelter'=>$this->nameshelter,
            ])
            ->subject('Confirmation of the establishment of a shelter!');
    }
}
