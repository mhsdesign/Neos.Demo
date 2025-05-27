<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Footer;

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
        return '<a href="' . self::escapeAttributeValue($this->uri) . '" class="block py-3 text-slate-600 hocus:text-slate-900">' . self::escapeRenderValue($this->label) . '</a>';
    }
}
