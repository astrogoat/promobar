<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('promobar.position', 1);
    }

    public function down()
    {
        $this->migrator->delete('promobar.position');
    }
};
