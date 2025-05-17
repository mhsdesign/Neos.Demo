<?php

declare(strict_types=1);

namespace Neos\Demo\Components\TextWithImage;

use Neos\Demo\Components\Image\Image;
use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class TextWithImage extends Component
{
    private function __construct(
        private null|ComponentInterface|string $text,
        private string $src,
        private bool $renderDummyImage,
        private Image $_1912_Image,
    ) {
    }

    public static function create(
        null|ComponentInterface|string $text,
        string $src,
        ?string $alt,
        ?string $title,
        ?bool $hasCaption,
        ?string $caption,
        bool $renderDummyImage,
    ): self {
        return new self(
            text: $text,
            src: $src,
            renderDummyImage: $renderDummyImage,
            _1912_Image: Image::create(
                src: $src,
                alt: $alt,
                title: $title,
                hasCaption: $hasCaption,
                caption: $caption,
                renderDummyImage: $renderDummyImage,
                class: 'md:mb-0',
                imageClass: 'w-full max-w-none',
            ),
        );
    }

    public function render(): string
    {
        return (((($this->text !== null) || true) || $this->renderDummyImage) ? '<div class="md:flex md:flex-wrap md:gap-4 md:flex-row">' . $this->_1912_Image->render() . '<div class="min-w-[30ch] flex-1">' . match (true) { ($temp = $this->text) === null => '', is_string($temp) => self::escapeRenderValue($temp), default => $temp->render() } . '</div></div>' : '');
    }
}
