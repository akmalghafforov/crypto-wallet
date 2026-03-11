<?php

namespace App\Enums;

enum BlockchainDepositStatus: string
{
    case Detected = 'detected';
    case PendingConfirmations = 'pending_confirmations';
    case Credited = 'credited';
    case Reversed = 'reversed';
}
