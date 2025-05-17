<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Alert;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Alert extends Component
{
    private function __construct(
        private null|ComponentInterface|string $content,
        private ?string $class,
    ) {
    }

    public static function create(
        null|ComponentInterface|string $content,
        ?string $class,
    ): self {
        return new self(
            content: $content,
            class: $class,
        );
    }

    public function render(): string
    {
        return (($this->content !== null) ? '<p class="' . self::joinAttributeValues([(($temp = $this->class) === null ? '' : self::escapeAttributeValue($temp)), 'flex items-center justify-center p-8 bg-orange-400 text-white text-xl']) . '">' . match (true) { ($temp = $this->content) === null => '', is_string($temp) => self::escapeRenderValue($temp), default => $temp->render() } . '</p>' : '');
    }
}
