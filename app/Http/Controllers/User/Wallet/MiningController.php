<?php

namespace App\Http\Controllers\User\Wallet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\StartMining;
use App\Models\User;
class MiningController extends Controller
{
    public function startMining(){
        $user = User::find(2);
        $user->mining_start = now();
        $user->mining_end = now()->addHours(3);
        $user->save();
        return response()->json(['message' => 'Balance update job dispatched successfully']);
    }
}
