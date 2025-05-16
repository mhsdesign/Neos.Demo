<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Image;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;

#[Flow\Proxy(false)]
final readonly class Image extends Component
{
    private function __construct(
        private string $src,
        private ?string $alt,
        private ?string $title,
        private ?string $class,
        private ?string $imageClass,
        private ?bool $hasCaption,
        private ?string $caption,
    ) {
    }

    public static function create(
        string $src,
        ?string $alt,
        ?string $title,
        ?string $class,
        ?string $imageClass,
        ?bool $hasCaption,
        ?string $caption,
    ): self {
        return new self(
            src: $src,
            alt: $alt,
            title: $title,
            class: $class,
            imageClass: $imageClass,
            hasCaption: $hasCaption,
            caption: $caption,
        );
    }

    public function render(): string
    {
        return '<figure' . (($temp = $this->class) === null ? '' : ' class="' . self::escapeAttributeValue($temp) . '"') . '><img src="' . self::escapeAttributeValue($this->src) . '"' . (($temp = $this->title) === null ? '' : ' title="' . self::escapeAttributeValue($temp) . '"') . '' . (($temp = $this->alt) === null ? '' : ' alt="' . self::escapeAttributeValue($temp) . '"') . '' . (($temp = $this->imageClass) === null ? '' : ' class="' . self::escapeAttributeValue($temp) . '"') . ' />' . (($this->hasCaption && ($this->caption !== null)) ? '<figcaption>' . (($temp = $this->caption) === null ? '' : self::escapeRenderValue($temp)) . '</figcaption>' : '') . '</figure>';
    }
}
