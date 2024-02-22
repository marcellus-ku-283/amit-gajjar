<?php

namespace App\Livewire\Admin;

use App\Helpers\WhatsAppClient;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SendMessage extends Component
{
    #[Validate('required|numeric|digits:10')]
    public string $phone;

    #[Validate('required|max:255')]
    public string $message;

    public function render()
    {
        return view('livewire.admin.send-message');
    }

    public function sendMessage()
    {
        $validated = $this->validate();

        try {
            WhatsAppClient::sendMessage(
                $validated['message'],
                [
                    $validated['phone']
                ]
            );
            session()->flash('flash.success', 'Message sent successfully.');
        } catch (\Throwable $th) {
            session()->flash('flash.danger', 'Failed to sent message.');
        }
        return redirect()->back();
    }
}
