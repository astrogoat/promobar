<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreatePromobarSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('promobar.enabled', false);
        $this->migrator->add('promobar.type', '');
        $this->migrator->add('promobar.payload', '');
    }

    public function down()
    {
        $this->migrator->delete('promobar.enabled');
        $this->migrator->delete('promobar.type');
        $this->migrator->delete('promobar.payload');
    }
}
