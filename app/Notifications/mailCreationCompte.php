<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class mailCreationCompte extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if ($notifiable->apm=='1') {
            return (new MailMessage)
                    ->subject('Verification d\'adresse email')
                    ->line("Salut Mr/Mme $notifiable->nom $notifiable->prenom. Veuillez s'il vous plait cliquer sur ce lien pour confirmer votre adresse email sur la plate forme env('APP_NAME')")
                    ->action('Confirmer', url("verificationCompte/".encrypt(urlencode($notifiable->id))."/".urlencode("{$notifiable->remember_token}")  ))
                    ->line('Si vous n\'êtes pas à l\'origine de ce mail, bien vouloir l\'ignorer')
                    ->line('Merci!');
        } else {

            if ($notifiable->apm=='2') {
                
                return (new MailMessage)
                    ->subject('Demande de recupération de compte')
                    ->line('Merci de cliquer sur le lien ci dessous pour changer votre mot de passe')
                    ->action('Recuperer ici', url( "mot_de_pass_oublie".encrypt(urlencode($notifiable->id)))  )
                    ->line('Si vous n\'êtes pas à l\'origine de ce mail, bien vouloir l\'ignorer')
                    ->line('Merci!');
                
            } else {
                return (new MailMessage)
                    ->subject('Nouvelle demande d\'inscription sur osature')
                    ->line('Nouveau compte en attende de Confirmation, Merci de cliquer sur le lien suivant:')
                    ->action('Confirmer directement', url( route('admin_AccountList_path'))  )
                    ->line('Si vous n\'êtes pas à l\'origine de ce mail, bien vouloir l\'ignorer')
                    ->line('Merci!');
            }
            
            
        }
        
        
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
