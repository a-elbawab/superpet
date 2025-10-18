<?php

namespace App\Http\Resources;

use Str;
use App\Models\User;
use App\Notifications\RatedNotification;
use App\Notifications\FeedbackNotification;
use App\Notifications\ReservationNotification;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Notifications\MessageCreatedNotification;
use App\Notifications\CardStatusUpdatedNotification;
use App\Notifications\OwnerRequestRefusedNotification;
use App\Notifications\OwnerRequestAcceptedNotification;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if(isset($this->data['user_id'])) {
            $user = User::find($this->data['user_id']);
        }else {
            $user = User::find(auth()->id());
        }
        // $user = User::find($this->data['user_id']);

        return [
            'id' => $this->id,
            'image' => $user->getAvatar(),
            'name' => $user->name,
            'body' => $this->getBody(),
            'is_read' => ! ! $this->read_at,
            'tab' => $this->getTabName(),
            $this->mergeWhen(! ! $this->read_at, [
                'read_at' => $this->read_at,
                'read_at_formated' => optional($this->read_at)->diffForHumans(),
            ]),
            'created_at' => $this->created_at,
            'created_at_formated' => $this->created_at->diffForHumans(),
            'links' => [
                'delete' => '/api/notifications/' . $this->id .'/delete',
            ],
        ];
    }

    /**
     * Get the notification body.
     *
     * @return string
     */
    private function getBody()
    {
        switch ($this->type) {
            case OwnerRequestAcceptedNotification::class:
                return trans('owner_requests.messages.accepted');
                break;
            case OwnerRequestRefusedNotification::class:
                return trans('owner_requests.messages.refused');
            case CardStatusUpdatedNotification::class:
                return trans('cards.messages.updated');
        }
    }

    /**
     * Get the notification tab name.
     *
     * @return string
     */
    private function getTabName()
    {
        switch ($this->type) {
            case OwnerRequestAcceptedNotification::class:
                return 'owner_request_accepted';
                break;
            case OwnerRequestRefusedNotification::class:
                return 'owner_request_refused';
                break;
            case CardStatusUpdatedNotification::class:
                return 'card_status_updated';
                break;
            default:
                return Str::plural(
                    Str::lower(
                        class_basename(
                            str_replace('Notification', '', $this->type)
                        )
                    )
                );
        }
    }
}