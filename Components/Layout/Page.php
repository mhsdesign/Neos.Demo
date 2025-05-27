<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Layout;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Page extends Component
{
    private function __construct(
        private ComponentInterface|string $header,
        private ComponentInterface|string $breadcrumb,
        private ComponentInterface|string $content,
        private ComponentInterface|string $footer,
    ) {
    }

    public static function create(
        ComponentInterface|string $header,
        ComponentInterface|string $breadcrumb,
        ComponentInterface|string $content,
        ComponentInterface|string $footer,
    ): self {
        return new self(
            header: $header,
            breadcrumb: $breadcrumb,
            content: $content,
            footer: $footer,
        );
    }

    public function render(): string
    {
        return '<div>' . (is_string($temp = $this->header) ? self::escapeRenderValue($temp) : $temp->render()) . '' . (is_string($temp = $this->breadcrumb) ? self::escapeRenderValue($temp) : $temp->render()) . '<main class="content prose">' . (is_string($temp = $this->content) ? self::escapeRenderValue($temp) : $temp->render()) . '</main>' . (is_string($temp = $this->footer) ? self::escapeRenderValue($temp) : $temp->render()) . '</div>';
    }
}
