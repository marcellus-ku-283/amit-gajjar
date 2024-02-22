<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message />
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div >
                    <form wire:submit.prevent="sendMessage" class="flex flex-col justify-center align-bottom space-y-2 m-8">
                        <div class="space-y-3">
                            <x-label>{{ __('Enter Message') }}</x-label>
                            <x-textarea wire:model="message" key="message" class="w-1/2" />
                        </div>
                        <div class="space-y-3">
                            <x-label>{{ __('Enter Phone') }}</x-label>
                            <x-input wire:model="phone" key="phone" class="w-1/2" />
                        </div>
                        <div class="space-y-3">
                            <x-submit-button wire:target="sendMessage">
                                {{ __('Send') }}
                            </x-submit-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
