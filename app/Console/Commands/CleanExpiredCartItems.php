<?php

namespace App\Console\Commands;

use App\Models\CartItem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanExpiredCartItems extends Command
{
    protected $signature = 'cart:clean-expired';
    protected $description = 'Usuwa przedmioty z koszyka dla wygasłych sesji';

    public function handle()
    {
        $expirationDate = now()->subDays(30);

        // usuwa zalogowanych
        $deletedUsers = CartItem::whereNotNull('user_id')
            ->where('updated_at', '<', $expirationDate)
            ->delete();

        // usuwa gosci
        $deletedGuests = CartItem::whereNotNull('session_id')
            ->where('updated_at', '<', $expirationDate)
            ->delete();

        $total = $deletedUsers + $deletedGuests;

        $this->info("Usunięto {$total} wygasłych pozycji z koszyka.");
        $this->info("- Użytkownicy: {$deletedUsers}");
        $this->info("- Goście: {$deletedGuests}");
    }

}
