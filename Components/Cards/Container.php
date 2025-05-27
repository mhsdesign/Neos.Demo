<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Cards;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Container extends Component
{
    private function __construct(
        private ?string $class,
        private ComponentInterface|string $content,
    ) {
    }

    public static function create(
        ?string $class,
        ComponentInterface|string $content,
    ): self {
        return new self(
            class: $class,
            content: $content,
        );
    }

    public function render(): string
    {
        return '<div class="' . self::joinAttributeValues(['grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-12 not-prose', (($temp = $this->class) === null ? '' : self::escapeAttributeValue($temp))]) . '">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</div>';
    }
}
