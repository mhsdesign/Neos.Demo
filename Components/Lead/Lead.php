<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Lead;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Lead extends Component
{
    private function __construct(
        private ComponentInterface|string $content,
    ) {
    }

    public static function create(
        ComponentInterface|string $content,
    ): self {
        return new self(
            content: $content,
        );
    }

    public function render(): string
    {
        return (true ? '<p class="lead">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</p>' : '');
    }
}
