<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Text;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Text extends Component
{
    private function __construct(
        private string|ComponentInterface $content,
    ) {
    }

    public static function create(
        string|ComponentInterface $content,
    ): self {
        return new self(
            content: $content,
        );
    }

    public function render(): string
    {
        $result = $this->content;

        return (string) $result;
    }
}
