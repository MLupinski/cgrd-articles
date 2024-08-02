<?php

declare(strict_types=1);

namespace App\Core;

class View {
    /**
     * @param string $template
     * @param array  $data
     */
    public function __construct(private readonly string $template, array $data = []) {
        $this->render($data);
    }

    /**
     * @param array $data
     *
     * @return void
     */
    private function render(array $data): void {
        if (count($data)) {
            extract($data);
        }

        require_once(str_replace('app/Core', '', __DIR__) . '/views/' . $this->template);
    }
}
