<?php

namespace Paymenter\Extensions\Others\JSLoadFix;

use App\Classes\Extension\Extension;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\HtmlString;

#[ExtensionMeta(
    name: 'JSLoadFix',
    description: 'Fixes JS loading logic so other scripts can load without having to refresh using a cookie/session guard.',
    version: '1.0',
    author: 'QKingsoftware'
)]
class JSLoadFix extends Extension
{
    public function getName(): string
    {
        return 'JS Load Fix';
    }

    public function getDescription(): string
    {
        return 'Fixes JS not loading when navigation is used.';
    }

    public function getVersion(): string
    {
        return '1.0';
    }

    public function getAuthor(): string
    {
        return 'QKingsoftware';
    }

    public function getConfig($values = []): array
    {
        return [
            [
                'name' => 'failsafe_ms',
                'type' => 'number',
                'label' => 'Failsafe Time (ms)',
                'description' => 'Minimum time in milliseconds before reload can happen again. Default: 1000.',
                'required' => true,
                'value' => $values['failsafe_ms'] ?? 1000,
            ],
        ];
    }

    public function boot(): void
    {
        if (!request()->isMethod('GET')) {
            return;
        }

        $failsafe = intval($this->config('failsafe_ms', 1000));
        $bodyScript = $this->getBodyScript($failsafe);

        // ...We dont talk abt this....
        Event::listen('body', function () use ($bodyScript) {
            return ['view' => new HtmlString($bodyScript)];
        });
    }

    private function getBodyScript(int $failsafe): string
    {
        return <<<HTML
<!-- Obscure cookie reloading logic pulled straight out of hell -->
<script>
(function() {
    const lastReload = sessionStorage.getItem("jsReloadFixTime");
    const now = Date.now();

    if (!lastReload || (now - parseInt(lastReload)) > {$failsafe}) {
        sessionStorage.setItem("jsReloadFixTime", now);

        // tiny delay to ensure sessionStorage is written
        setTimeout(() => {
            location.reload();
        }, 50);
    }
})();
</script>
HTML;
    }

    public function enabled(): void {}
    public function disabled(): void {}
    public function updated(): void {}
    public function install(): void {}
}
