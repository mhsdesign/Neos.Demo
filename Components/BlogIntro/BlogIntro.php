<?php

declare(strict_types=1);

namespace Neos\Demo\Components\BlogIntro;

use Neos\Demo\Components\Headline\Headline;
use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;

#[Flow\Proxy(false)]
final readonly class BlogIntro extends Component
{
    private function __construct(
        private ?string $abstract,
        private ?string $imageUri,
        private ?string $author,
        private ?string $date,
        private Headline $_1816_Headline,
    ) {
    }

    public static function create(
        ?string $title,
        ?string $abstract,
        ?string $imageUri,
        ?string $author,
        ?string $date,
    ): self {
        return new self(
            abstract: $abstract,
            imageUri: $imageUri,
            author: $author,
            date: $date,
            _1816_Headline: Headline::create(
                tagName: 'h1',
                tagStyle: 'h1',
                class: null,
                content: self::createSlotFromContents(
                    (($temp = $title) === null ? '' : self::escapeRenderValue($temp))
                ),
            ),
        );
    }

    public function render(): string
    {
        return '<div><div class="flex flex-wrap justify-center"><div class="text-center lg:w-8/12">' . $this->_1816_Headline->render() . '<p>' . (($temp = $this->abstract) === null ? '' : self::escapeRenderValue($temp)) . '</p><p>' . (($temp = $this->date) === null ? '' : self::escapeRenderValue($temp)) . ' - ' . (($temp = $this->author) === null ? '' : self::escapeRenderValue($temp)) . '</p></div></div>' . (($this->imageUri !== null) ? '<div class="bg-cover bg-center max-h-48 h-screen print:h-auto print:!bg-none"' . (($this->imageUri !== null) ? ' style="background-image: url({imageUri});"' : '') . '></div>' : '') . '</div>';
    }
}
