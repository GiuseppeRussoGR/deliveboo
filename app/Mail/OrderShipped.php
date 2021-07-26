<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $dishes;
    public $restaurants;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->dishes = $order->dishes()->get();
        $this->restaurants = $this->dishes[0]->user()->get();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): OrderShipped
    {
        return $this->view('emails.order-shipped');
    }
}
