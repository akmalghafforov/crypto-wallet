<?php

namespace App\Enums;

enum BalanceTransactionDirection: string
{
    case Credit = 'credit';
    case Debit = 'debit';
}
