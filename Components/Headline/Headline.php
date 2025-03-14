<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Headline;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Headline extends Component
{
    private function __construct(
        private string|ComponentInterface $content,
        private string $tagName,
        private ?string $tagStyle,
        private ?string $class,
    ) {
    }

    public static function create(
        string|ComponentInterface $content,
        string $tagName,
        ?string $tagStyle,
        ?string $class,
    ): self {
        return new self(
            content: $content,
            tagName: $tagName,
            tagStyle: $tagStyle,
            class: $class,
        );
    }

    public function render(): string
    {
        return '<h1 class="' . ($this->class ? $this->class : match (($this->tagStyle ? $this->tagStyle : $this->tagName)) { 'h1' => 'text-5xl', 'h2' => 'text-4xl', 'h3' => 'text-3xl', 'h4' => 'text-2xl', 'h5' => 'text-xl', default => 'text-lg' }) . '">' . (is_string($temp = $this->content) ? self::escapeTagContent($temp) : $temp->render()) . '</h1>';
    }
}
