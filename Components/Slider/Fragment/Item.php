<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Slider\Fragment;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Item extends Component
{
    private function __construct(
        private ?string $videoUri,
        private ?string $youtubeId,
        private ?string $vimdeoId,
        private ComponentInterface|string $content,
        private ?string $class,
    ) {
    }

    public static function create(
        ?string $videoUri,
        ?string $youtubeId,
        ?string $vimdeoId,
        ComponentInterface|string $content,
        ?string $class,
    ): self {
        return new self(
            videoUri: $videoUri,
            youtubeId: $youtubeId,
            vimdeoId: $vimdeoId,
            content: $content,
            class: $class,
        );
    }

    public function render(): string
    {
        return '<li' . (($temp = $this->videoUri) === null ? '' : ' data-splide-html-video="' . self::escapeAttributeValue($temp) . '"') . '' . (($this->youtubeId !== null) ? ' data-splide-youtube="' . 'https://www.youtube.com/watch?v=' . (($temp = $this->youtubeId) === null ? '' : self::escapeAttributeValue($temp)) . '"' : '') . '' . (($this->vimdeoId !== null) ? ' data-splide-vimeo="' . 'https://vimeo.com/' . (($temp = $this->vimdeoId) === null ? '' : self::escapeAttributeValue($temp)) . '"' : '') . ' class="' . self::joinAttributeValues(['splide__slide', (($this->class !== null) ? (($temp = $this->class) === null ? '' : self::escapeAttributeValue($temp)) : 'flex flex-col items-center justify-center')]) . '">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</li>';
    }
}
