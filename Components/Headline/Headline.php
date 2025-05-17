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
        private ComponentInterface|string $content,
        private string $tagName,
        private ?string $tagStyle,
        private ?string $class,
    ) {
    }

    public static function create(
        ComponentInterface|string $content,
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
        return '<' . ($_712_tag = match ($this->tagName) { 'h1' => 'h1', 'h2' => 'h2', 'h3' => 'h3', 'h4' => 'h4', 'h5' => 'h5', 'h6' => 'h6', default => 'div' }) . ' class="' . self::joinAttributeValues(['headline', (($this->class !== null) ? (($temp = $this->class) === null ? '' : self::escapeAttributeValue($temp)) : match ((($this->tagStyle !== null) ? $this->tagStyle : $this->tagName)) { 'h1' => 'text-5xl', 'h2' => 'text-4xl', 'h3' => 'text-3xl', 'h4' => 'text-2xl', 'h5' => 'text-xl', default => 'text-lg' })]) . '">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</' . $_712_tag . '>';
    }
}
