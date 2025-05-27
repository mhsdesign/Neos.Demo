<?php

declare(strict_types=1);

namespace Neos\Demo\Components\BlogIntro;

use Neos\Demo\Components\Headline\Headline;
use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class BlogIntro extends Component
{
    private function __construct(
        private null|ComponentInterface|string $abstract,
        private ?string $imageUri,
        private ?string $author,
        private ?string $date,
        private Headline $_1716_Headline,
    ) {
    }

    public static function create(
        null|ComponentInterface|string $title,
        null|ComponentInterface|string $abstract,
        ?string $imageUri,
        ?string $author,
        ?string $date,
    ): self {
        return new self(
            abstract: $abstract,
            imageUri: $imageUri,
            author: $author,
            date: $date,
            _1716_Headline: Headline::create(
                tagName: 'h1',
                tagStyle: 'h1',
                class: null,
                content: self::createSlotFromContents(
                    match (true) { ($temp = $title) === null => '', is_string($temp) => self::escapeRenderValue($temp), default => $temp }
                ),
            ),
        );
    }

    public function render(): string
    {
        return '<div><div class="flex flex-wrap justify-center"><div class="text-center lg:w-8/12">' . $this->_1716_Headline->render() . '<p>' . match (true) { ($temp = $this->abstract) === null => '', is_string($temp) => self::escapeRenderValue($temp), default => $temp->render() } . '</p><p>' . (($temp = $this->date) === null ? '' : self::escapeRenderValue($temp)) . ' - ' . (($temp = $this->author) === null ? '' : self::escapeRenderValue($temp)) . '</p></div></div>' . (($this->imageUri !== null) ? '<div class="bg-cover bg-center max-h-48 h-screen print:h-auto print:!bg-none"' . (($this->imageUri !== null) ? ' style="' . 'background-image: url(' . (($temp = $this->imageUri) === null ? '' : self::escapeAttributeValue($temp)) . ');' . '"' : '') . '></div>' : '') . '</div>';
    }
}
