<?php

namespace App\Enums;

enum WithdrawalRequestStatus: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Broadcasted = 'broadcasted';
    case Confirmed = 'confirmed';
    case Rejected = 'rejected';
    case Failed = 'failed';
}
