<?php

namespace App\Traits;

trait Toast
{
    /**
     * Dispatch a success toast notification
     *
     * @param string $title
     * @param string|null $description
     * @param int $timeout
     * @return void
     */
    public function success(string $title, ?string $description = null, int $timeout = 3000): void
    {
        $this->toast('success', $title, $description, $timeout);
    }

    /**
     * Dispatch an error toast notification
     *
     * @param string $title
     * @param string|null $description
     * @param int $timeout
     * @return void
     */
    public function error(string $title, ?string $description = null, int $timeout = 5000): void
    {
        $this->toast('error', $title, $description, $timeout);
    }

    /**
     * Dispatch an info toast notification
     *
     * @param string $title
     * @param string|null $description
     * @param int $timeout
     * @return void
     */
    public function info(string $title, ?string $description = null, int $timeout = 3000): void
    {
        $this->toast('info', $title, $description, $timeout);
    }

    /**
     * Dispatch a warning toast notification
     *
     * @param string $title
     * @param string|null $description
     * @param int $timeout
     * @return void
     */
    public function warning(string $title, ?string $description = null, int $timeout = 4000): void
    {
        $this->toast('warning', $title, $description, $timeout);
    }

    /**
     * Dispatch a toast notification
     *
     * @param string $type
     * @param string $title
     * @param string|null $description
     * @param int|false $timeout
     * @return void
     */
    protected function toast(string $type, string $title, ?string $description = null, int|false $timeout = 3000): void
    {
        $this->dispatch('toast', [
            'type' => $type,
            'title' => $title,
            'description' => $description,
            'timeout' => $timeout,
        ]);
    }
}
