<?php

namespace Modules\Blog\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyUsersOfNewBlog extends Notification
{
    use Queueable;

    protected $blog_title ;
    protected $intro ;
    protected $url ;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($blog_title , $intro , $url)
    {
        $this->blog_title = $blog_title;
        $this->intro = $intro;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject(__('admin.NewPost'))
                    ->line($this->blog_title)
                    ->line($this->intro)
                    ->action(__('admin.CompleteReading'), $this->url)
                    ->line(__('admin.ThanksForSubscription'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
