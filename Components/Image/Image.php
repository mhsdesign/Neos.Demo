<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Image;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

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
        private null|ComponentInterface|string $caption,
    ) {
    }

    public static function create(
        string $src,
        ?string $alt,
        ?string $title,
        ?string $class,
        ?string $imageClass,
        ?bool $hasCaption,
        null|ComponentInterface|string $caption,
        bool $renderDummyImage,
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
        return '<figure' . (($temp = $this->class) === null ? '' : ' class="' . self::escapeAttributeValue($temp) . '"') . '><img src="' . self::escapeAttributeValue($this->src) . '"' . (($temp = $this->title) === null ? '' : ' title="' . self::escapeAttributeValue($temp) . '"') . '' . (($temp = $this->alt) === null ? '' : ' alt="' . self::escapeAttributeValue($temp) . '"') . '' . (($temp = $this->imageClass) === null ? '' : ' class="' . self::escapeAttributeValue($temp) . '"') . ' />' . (($this->hasCaption && ($this->caption !== null)) ? '<figcaption>' . match (true) { ($temp = $this->caption) === null => '', is_string($temp) => self::escapeRenderValue($temp), default => $temp->render() } . '</figcaption>' : '') . '</figure>';
    }
}
