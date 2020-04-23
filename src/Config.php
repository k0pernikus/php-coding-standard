<?php

declare(strict_types=1);

namespace Spaceemotion\PhpCodingStandard;

class Config
{
    private array $config;

    public function __construct(string $path = PHPCSTD_ROOT . '.phpcstd')
    {
        if (! is_file($path)) {
            $path .= '.dist';
        }

        if (! is_file($path)) {
            $this->config = [];
            return;
        }

        $this->config = parse_ini_file($path);
    }

    /**
     * Returns a list of file paths to lint/fix.
     *
     * @return string[]
     */
    public function getSources(): array
    {
        return $this->config['source'] ?? [];
    }

    public function shouldContinue(): bool
    {
        return (bool) ($this->config['continue'] ?? false);
    }
}