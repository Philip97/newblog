<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $order;
    public $extras;
    public $countertops;
    public $floorings;
    public $calculate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $order,
        $extras,
        $countertops,
        $floorings,
        $calculate
    )
    {
        $this->order = $order;
        $this->extras = $extras;
        $this->countertops = $countertops;
        $this->floorings = $floorings;
        $this->calculate = $calculate;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sender@example.com')
                    ->view('mails.demo');
    }
}
