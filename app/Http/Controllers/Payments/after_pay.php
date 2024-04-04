<?php

$user_balance = \App\Models\UserBalance::where('user_id', $transaction->transactionable_id)->first();

$user_balance += $transaction->amount;

$user_balance->update();