<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Layout;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class LandingPage extends Component
{
    private function __construct(
        private ComponentInterface|string $header,
        private ComponentInterface|string $heroContent,
        private ?string $heroImage,
        private ComponentInterface|string $content,
        private ComponentInterface|string $footer,
    ) {
    }

    public static function create(
        ComponentInterface|string $header,
        ComponentInterface|string $heroContent,
        ?string $heroImage,
        ComponentInterface|string $content,
        ComponentInterface|string $footer,
    ): self {
        return new self(
            header: $header,
            heroContent: $heroContent,
            heroImage: $heroImage,
            content: $content,
            footer: $footer,
        );
    }

    public function render(): string
    {
        return '<div>' . (is_string($temp = $this->header) ? self::escapeRenderValue($temp) : $temp->render()) . '' . ((true || ($this->heroImage !== null)) ? '<div class="' . self::joinAttributeValues(['overflow-hidden bg-dark flex flex-col print:bg-transparent print:m-0 print:py-20', (($this->heroImage !== null) ? 'bg-cover bg-center -mt-[var(--header-height)] h-screen print:h-auto print:!bg-none' : 'pt-20 pb-32')]) . '"' . (($this->heroImage !== null) ? ' style="' . 'background-image: url(' . (($temp = $this->heroImage) === null ? '' : self::escapeAttributeValue($temp)) . ');text-shadow:1px 0 0 rgb(0 0 0 / 50%);' . '"' : '') . '><div class="content flex flex-col items-center justify-center prose prose-2xl prose-white print:prose flex-1">' . (is_string($temp = $this->heroContent) ? self::escapeRenderValue($temp) : $temp->render()) . '</div></div>' : '') . '<main class="content prose">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</main>' . (is_string($temp = $this->footer) ? self::escapeRenderValue($temp) : $temp->render()) . '</div>';
    }
}
