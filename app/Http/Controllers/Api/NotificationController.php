<?php

namespace App\Http\Controllers\Api;

use App\Models\Notification;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $this->authorize('viewAny', Notification::class);

        return NotificationResource::collection(
            auth()->user()
                ->notifications()->get()
        );
    }

    /**
     * mark all notification related to a user as seen.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function seen()
    {
        foreach (auth()->user()->notifications as $notification) {
            $notification->markAsRead();
        }

        return response()->json([
            'message' => trans('notifications.read'),
        ]);
    }

    /**
     * Remove all notification related to a user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete()
    {
        foreach (auth()->user()->notifications as $notification) {
            $notification->delete();
        }

        return response()->json([
            'message' => trans('notifications.deleted_all'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Notification $notification
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Notification $notification)
    {
        $this->authorize('delete', $notification);

        $notification->delete();

        return response()->json([
            'message' => trans('notifications.delete'),
        ]);
    }
}
