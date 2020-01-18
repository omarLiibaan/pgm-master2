<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ema_titre;
    public $ema_p;
    public $ema_dateJour;
    public $ema_lieu;
    public $ema_intro;
    public $ema_descriptif;
    public $ema_p2;
    public $ema_salutations;

    public function __construct($ema_titre,$ema_p, $ema_dateJour,$ema_lieu,$ema_intro,$ema_descriptif,$ema_p2,$ema_salutations)
    {
        $this->ema_titre = $ema_titre;
        $this->ema_p = $ema_p;
        $this->ema_dateJour = $ema_dateJour;
        $this->ema_lieu = $ema_lieu;
        $this->ema_intro = $ema_intro;
        $this->ema_descriptif = $ema_descriptif;
        $this->ema_p2 = $ema_p2;
        $this->ema_salutations = $ema_salutations;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ema_titre = $this->ema_titre;
        $ema_p = $this->ema_p;
        $ema_dateJour = $this->ema_dateJour;
        $ema_lieu = $this->ema_lieu;
        $ema_intro = $this->ema_intro;
        $ema_descriptif = $this->ema_descriptif;
        $ema_p2 = $this->ema_p2;
        $ema_salutations = $this->ema_salutations;
       // dd($ema_salutations);
        return $this->view('email.index', compact('ema_p','ema_dateJour','ema_lieu','ema_intro','ema_descriptif','ema_p2','ema_salutations'))->subject($ema_titre);
    }
}
