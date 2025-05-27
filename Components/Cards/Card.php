<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Cards;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Card extends Component
{
    private function __construct(
        private string $uri,
        private string $title,
        private ComponentInterface|string $content,
        private ?string $date,
        private ?string $authorName,
        private ?string $imageUri,
        private ?string $class,
        private ?string $moreLabel,
    ) {
    }

    public static function create(
        string $uri,
        string $title,
        ComponentInterface|string $content,
        ?string $date,
        ?string $authorName,
        ?string $imageUri,
        ?string $class,
        ?string $moreLabel,
    ): self {
        return new self(
            uri: $uri,
            title: $title,
            content: $content,
            date: $date,
            authorName: $authorName,
            imageUri: $imageUri,
            class: $class,
            moreLabel: $moreLabel,
        );
    }

    public function render(): string
    {
        return '<div class="' . self::joinAttributeValues(['block shadow-lg bg-white', (($temp = $this->class) === null ? '' : self::escapeAttributeValue($temp))]) . '"><a href="' . self::escapeAttributeValue($this->uri) . '"><img class="w-full"' . (($temp = $this->imageUri) === null ? '' : ' src="' . self::escapeAttributeValue($temp) . '"') . ' alt="" /></a><div class="mt-5 ml-8 italic text-sm">' . (($this->date !== null) ? '<time' . (($temp = $this->date) === null ? '' : ' datetime="' . self::escapeAttributeValue($temp) . '"') . '>' . (($temp = $this->date) === null ? '' : self::escapeRenderValue($temp)) . '</time>' : '') . '</div><div class="p-8 pt-3"><h2 class="mb-2 text-xl font-medium leading-tight">' . self::escapeRenderValue($this->title) . '</h2><p class="mb-4 text-base">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</p>' . (($this->authorName !== null) ? '<p class="pb-3 italic text-sm">' . (($temp = $this->authorName) === null ? '' : self::escapeRenderValue($temp)) . '</p>' : '') . '<a href="' . self::escapeAttributeValue($this->uri) . '" class="inline-block bg-light px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-md hover:bg-light focus:bg-light active:bg-light">' . (($this->moreLabel !== null) ? (($temp = $this->moreLabel) === null ? '' : self::escapeRenderValue($temp)) : 'More') . '</a></div></div>';
    }
}
