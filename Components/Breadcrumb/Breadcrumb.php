<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Breadcrumb;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Breadcrumb extends Component
{
    private function __construct(
        private ComponentInterface|string $content,
        private ?string $class,
    ) {
    }

    public static function create(
        ComponentInterface|string $content,
        ?string $class,
    ): self {
        return new self(
            content: $content,
            class: $class,
        );
    }

    public function render(): string
    {
        return '<nav class="' . self::joinAttributeValues([(($this->class !== null) ? (($temp = $this->class) === null ? '' : self::escapeAttributeValue($temp)) : 'content text-sm mb-4'), 'print:hidden']) . '"><ul class="flex flex-wrap m-0">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</ul></nav>';
    }
}
