<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Footer;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Footer extends Component
{
    private function __construct(
        private null|ComponentInterface|string $menuItems,
        private null|ComponentInterface|string $content,
    ) {
    }

    public static function create(
        null|ComponentInterface|string $menuItems,
        null|ComponentInterface|string $content,
    ): self {
        return new self(
            menuItems: $menuItems,
            content: $content,
        );
    }

    public function render(): string
    {
        return '<div><div aria-hidden="true" class="flex-1 print:hidden"></div><footer class="' . self::joinAttributeValues(['mt-12 text-sm print:border-t print:border-slate-200/80', (($this->menuItems !== null) ? 'border-t border-slate-200/80' : '')]) . '">' . (($this->menuItems !== null) ? '<nav class="content py-5 flex flex-wrap gap-x-10 print:hidden">' . match (true) { ($temp = $this->menuItems) === null => '', is_string($temp) => self::escapeRenderValue($temp), default => $temp->render() } . '</nav>' : '') . '' . (($this->content !== null) ? '<div class="py-5 bg-slate-100 shadow-inner empty:hidden print:bg-transparent print:shadow-none">' . match (true) { ($temp = $this->content) === null => '', is_string($temp) => self::escapeRenderValue($temp), default => $temp->render() } . '</div>' : '') . '</footer></div>';
    }
}
