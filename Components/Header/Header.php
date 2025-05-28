<?php

declare(strict_types=1);

namespace Neos\Demo\Components\Header;

use Neos\Flow\Annotations as Flow;
use PackageFactory\Neos\ComponentEngine\Component;
use PackageFactory\Neos\ComponentEngine\ComponentInterface;

#[Flow\Proxy(false)]
final readonly class Header extends Component
{
    private function __construct(
        private ComponentInterface|string $logo,
        private string $homeUri,
        private ComponentInterface|string $menuItems,
    ) {
    }

    public static function create(
        ComponentInterface|string $logo,
        string $homeUri,
        ComponentInterface|string $menuItems,
    ): self {
        return new self(
            logo: $logo,
            homeUri: $homeUri,
            menuItems: $menuItems,
        );
    }

    public function render(): string
    {
        return '<header class="relative lg:sticky print:hidden z-50 top-0 bg-white/90 text-sm supports-backdrop-blur:bg-white/80 backdrop-blur-sm transition-shadow"><div class="max-w-screen-xl mx-auto py-6 items-center grid grid-cols-[auto_minmax(0,1fr)_auto_auto] grid-rows-[auto_minmax(0,auto)] gap-4 lg:gap-x-10 lg:gap-y-0"><a href="' . self::escapeAttributeValue($this->homeUri) . '" class="block border-transparent border-2 lg:row-span-full self-start">' . (is_string($temp = $this->logo) ? self::escapeRenderValue($temp) : $temp->render()) . '</a><nav class="row-start-2 col-span-full lg:row-start-1 lg:col-span-1"><ul class="flex flex-col items-center gap-10 text-center text-slate-600 lg:!flex lg:!h-auto lg:!overflow-visible lg:flex-row">' . (is_string($temp = $this->menuItems) ? self::escapeRenderValue($temp) : $temp->render()) . '</ul></nav></div></header>';
    }
}
