<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Columns;

use Neos\Demo\Components\Columns\Columns;
use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class ThreeColumns extends Component
{
    private function __construct(
        private null|ComponentInterface|string $content,
        private Columns $_810_Columns,
    ) {
    }

    public static function create(
        null|ComponentInterface|string $content,
    ): self {
        return new self(
            content: $content,
            _810_Columns: Columns::create(
                breakpoint: 'md',
                columns: 3,
                class: null,
                content: self::createSlotFromContents(
                    match (true) { ($temp = $content) === null => '', is_string($temp) => self::escapeRenderValue($temp), default => $temp }
                ),
            ),
        );
    }

    public function render(): string
    {
        return (($this->content !== null) ? $this->_810_Columns->render() : '');
    }
}
