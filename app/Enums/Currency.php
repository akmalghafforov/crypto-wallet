<?php

namespace App\Enums;

enum Currency: string
{
    case BTC = 'BTC';
    case ETH = 'ETH';
    case USDT = 'USDT';
    case USDC = 'USDC';
}
