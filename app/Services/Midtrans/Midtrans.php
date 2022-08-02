<?php

namespace App\Services\Midtrans;

Use Midtrans\Config;

class Midtrans {
    protected $serverKey;
    protected $isProduction;
    protected $isSanitized;
    protected $is3ds;

    public function __construct()
    {
        $this->serverkey = config('midtrans.server_key');
        $this->isProduction = config('midtrans.is_production');
        $this->is3ds = config('midtrans.is_3ds');
       
        $this->_configureMidtrans();
    }

    public function _configureMidtrans()
    {   
        Config::$serverKey      = $this->serverKey;
        Config::$isProduction   = $this->isProduction;
        Config::$isSanitized    = $this->isSanitized;
        Config::$is3ds          = $this->is3ds;
    }
}