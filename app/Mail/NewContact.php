<?php
//file creato con comando terminale : php artisan make:mail NewContact(sempre scrievre in PascalCase);
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Lead;
class NewContact extends Mailable
{
    use Queueable, SerializesModels;
    //recupera direttamente il modello Lead(?)
    public $lead;
    /**
     * Create a new message instance.
     */
    /*nel construct passo la variabile $lead con il trattino, 
    se voglio passare la public devo mettere come argomento public $lead 
    in construct
    */
    public function __construct( $_lead)
    {
        $this->lead=$_lead;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo:$this->lead->email,
            subject: 'nuovo contatto',
        );
    }

    /**
     * Get the message content definition.
     */
    
    
     //reindirizza ad una vista nella cartella view(in questo caso la vista new-contact)
    public function content(): Content
    {
        return new Content(
            view: 'emails.new-contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
