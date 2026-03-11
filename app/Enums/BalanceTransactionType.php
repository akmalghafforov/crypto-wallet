<?php

namespace App\Enums;

enum BalanceTransactionType: string
{
    case Deposit = 'deposit';
    case Withdrawal = 'withdrawal';
    case Fee = 'fee';
    case Refund = 'refund';
    case Hold = 'hold';
    case Release = 'release';
}
