<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendChkmaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $checkma;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($checkma)
    {
        $this->checkma=$checkma;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pet me home註冊驗證碼')->view('email.sendChkmaMail');
        // 郵件標題  建立郵件內容
    }
}
