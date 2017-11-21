<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contacted extends Mailable
{
    use Queueable, SerializesModels;

    public $options; // 追加
    public $data;

    /**
     * フォームで入力された値を取得
     */
    public function __construct($options, $data)
    {
        $this->options = $options;
        $this->data = $data;
    }
    /**
     * 以前のクロージャの部分
     */
    public function build()
    {
        return $this->from($this->options['from'], $this->options['from_jp'])
                    ->subject($this->options['subject'])
                    ->text($this->options['template']);
    }
}
