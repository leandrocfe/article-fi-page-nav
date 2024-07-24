<?php

//app/Filament/Resources/Actions/NextAction.php

namespace App\Filament\Resources\Actions;

use Filament\Actions\Action;

class NextAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'next';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->hiddenLabel()
            ->icon('heroicon-o-arrow-right')
            ->outlined()
            ->tooltip("Next {$this->getRecordTitle()}");
    }
}
