<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Slider;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Slider extends Component
{
    private function __construct(
        private ComponentInterface|string $content,
        private ?string $class,
        private ?string $label,
        private bool $sliderIsDecoration,
    ) {
    }

    public static function create(
        ComponentInterface|string $content,
        ?string $class,
        ?string $label,
        bool $sliderIsDecoration,
    ): self {
        return new self(
            content: $content,
            class: $class,
            label: $label,
            sliderIsDecoration: $sliderIsDecoration,
        );
    }

    public function render(): string
    {
        return '<section x-data="slider"' . (($temp = $this->label) === null ? '' : ' aria-label="' . self::escapeAttributeValue($temp) . '"') . '' . ($this->sliderIsDecoration ? ' role="group"' : '') . ' class="' . self::joinAttributeValues(['splide', (($temp = $this->class) === null ? '' : self::escapeAttributeValue($temp))]) . '"><div class="splide__track">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</div></section>';
    }
}
