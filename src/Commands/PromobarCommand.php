<?php

namespace Astrogoat\Promobar\Commands;

use Illuminate\Console\Command;

class PromobarCommand extends Command
{
    public $signature = 'promobar';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
