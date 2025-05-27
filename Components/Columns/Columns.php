<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Columns;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Columns extends Component
{
    private function __construct(
        private string $breakpoint,
        private int $columns,
        private ?string $class,
        private ComponentInterface|string $content,
    ) {
    }

    public static function create(
        string $breakpoint,
        int $columns,
        ?string $class,
        ComponentInterface|string $content,
    ): self {
        return new self(
            breakpoint: $breakpoint,
            columns: $columns,
            class: $class,
            content: $content,
        );
    }

    public function render(): string
    {
        return '<div class="' . self::joinAttributeValues([(($temp = $this->class) === null ? '' : self::escapeAttributeValue($temp)), 'grid grid-cols-1 gap-8 [&amp;&gt;*&gt;:where(p,ul,ol,figure):first-child]:mt-0 [&amp;&gt;*&gt;:where(p,ul,ol,figure):last-child]:mb-0', match ($this->breakpoint) { 'sm' => match ($this->columns) { 2 => 'sm:grid-cols-2', 3 => 'sm:grid-cols-3', 4 => 'sm:grid-cols-2 md:grid-cols-4' }, 'md' => match ($this->columns) { 2 => 'md:grid-cols-2', 3 => 'md:grid-cols-3', 4 => 'md:grid-cols-2 lg:grid-cols-4' }, 'lg' => match ($this->columns) { 2 => 'lg:grid-cols-2', 3 => 'lg:grid-cols-3', 4 => 'lg:grid-cols-2 xl:grid-cols-4' } }]) . '">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</div>';
    }
}
