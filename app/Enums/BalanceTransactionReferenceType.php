<?php

namespace App\Enums;

enum BalanceTransactionReferenceType: string
{
    case BlockchainDeposit = 'blockchain_deposit';
    case WithdrawalRequest = 'withdrawal_request';
    case ManualAdjustment = 'manual_adjustment';
}
