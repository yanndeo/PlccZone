<?php

namespace App\Mail;

use App\Helpers\Mail\MailTo;
use App\Models\Devis;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class DevisMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $itemDevis;




    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $itemDevis )
    {
        $this->itemDevis = $itemDevis;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return
            $this->view('emails.devis')
                 ->from(MailTo::SupportPlatform(),'PlccnZone')
                 ->subject('Nouvelle Demande de devis')
                 ->with([
                    'produit' => $this->itemDevis['namepb'],
                    'qte' => $this->itemDevis['qte'],
                    'phone' => $this->itemDevis['tel'],
                    'fullname' => $this->itemDevis['fullname'],
                    'societe' => $this->itemDevis['entreprise'],
                    'email' => $this->itemDevis['email'],
                    'msg' => $this->itemDevis['message'],
        ]);
    }
}
