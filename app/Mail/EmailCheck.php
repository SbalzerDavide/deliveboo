<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use App\Order;

class EmailCheck extends Mailable
{
    use Queueable, SerializesModels;
    
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */


    // public function __construct($details)
    // {
    //     $this->details = $details;
    // }

    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $order = DB::table('order')->orderBy('updated_at', 'desc')->first();
        $order = DB::table('orders')->latest()
        ->first();
        // return $this->subject('Mail from DeliveBoo')->view('emails.TestMail');
        return $this->from('no-reply-order@deliveboo.it')
        ->view('emails.TestMail', compact('order'));
    }
}
