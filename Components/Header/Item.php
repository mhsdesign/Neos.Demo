<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Header;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;

#[Flow\Proxy(false)]
final readonly class Item extends Component
{
    private function __construct(
        private string $uri,
        private string $label,
    ) {
    }

    public static function create(
        string $uri,
        string $label,
    ): self {
        return new self(
            uri: $uri,
            label: $label,
        );
    }

    public function render(): string
    {
        return '<li><a href="' . self::escapeAttributeValue($this->uri) . '" class="block p-1 hocus:text-slate-900 text-lg lg:text-sm whitespace-nowrap">' . self::escapeRenderValue($this->label) . '</a></li>';
    }
}
