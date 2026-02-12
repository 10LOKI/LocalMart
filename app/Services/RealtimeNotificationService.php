<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;

class RealtimeNotificationService
{
    public function sendToUser(
        int $userId,
        string $title,
        string $message,
        string $type = 'info',
        array $data = []
    ): Notification {
        return Notification::create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'data' => $data,
        ]);
    }

    public function sendToRoles(
        array $roles,
        string $title,
        string $message,
        string $type = 'info',
        array $data = []
    ): void {
        User::role($roles)
            ->select('users.id')
            ->distinct()
            ->pluck('id')
            ->each(function ($userId) use ($title, $message, $type, $data) {
                $this->sendToUser((int) $userId, $title, $message, $type, $data);
            });
    }
}
