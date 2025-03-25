<?php

use App\Models\Event;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use WithFileUploads;

    public Event $event;
    public $image;

    public function update() {
        $this->validate([
            'image' => [
                'required',
                'image',
                'max:10000',
                'mimes:jpeg,png,jpg,gif',
            ],
        ], [
            'image.required' => 'Please select an image file.',
            'image.image' => 'The file must be an image.',
            'image.max' => 'The image size must not exceed 2MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
        ]);

        if (
            $this->event->image &&
            Storage::disk("public")->exists($this->event->image)
        ) {
            Storage::disk("public")->delete($this->event->image);
        }

        $path = $this->image->store('event-images', 'public');

        $this->event->update([
            'image' => $path,
        ]);

        $this->reset('image');

        session()->flash('status', 'Event image updated successfully.');
        $this->dispatch('event-updated');
    }

    public function delete() {
        if (
            $this->event->image &&
            Storage::disk("public")->exists($this->event->image)
        ) {
            Storage::disk("public")->delete($this->event->image);
        }

        $this->event->update([
            'image' => null,
        ]);

        $this->dispatch('event-updated');
        $this->dispatch("close-modal", "confirm-event-image-deletion");
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Event image') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your event's image.") }}
        </p>
    </header>

    <div class="mt-6 flex flex-wrap gap-6">
        @if($event->image)
            <img
                src="{{ Storage::url($event->image) }}"
                alt="event"
                class="w-80 aspect-video rounded-lg shadow-md object-cover bg-light"
            />
        @else
            <div @class([
                "w-80 aspect-video rounded-lg shadow-md",
                "bg-light border border-zinc-400",
                 "flex items-center justify-center"
            ])>
                <span class="text-zinc-400">No image</span>
            </div>
        @endif

        <form wire:submit="update" class="flex flex-col justify-between">
            <div class="flex-grow">
                <label for="event-image" class="block text-sm font-medium text-gray-700 mb-1">
                    {{ __('Select new image') }}
                </label>
                <input
                    type="file"
                    name="image"
                    id="event-image"
                    wire:model="image"
                    accept="image/jpeg,image/png,image/jpg,image/gif"
                    class="block w-full text-sm text-gray-900 rounded-md cursor-pointer bg-light3 file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0 file:text-sm file:font-semibold
                    file:bg-dark file:text-white
                    hover:file:bg-darker"
                >
                <div class="mt-1 text-sm text-gray-500">
                    JPG, PNG or GIF (max. 10MB).
                </div>
                @error("image")
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

                <div wire:loading wire:target="image" class="mt-2">
                    <span class="text-sm text-dark">Uploading...</span>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-4">
                <x-primary-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-primary-button>

                @if($event->image)
                    <x-danger-button
                        type="button"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-event-image-deletion')"
                    >
                        {{ __('Remove') }}
                    </x-danger-button>
                @endif
            </div>
        </form>
    </div>

    <x-modal name="confirm-event-image-deletion" :show="false" focusable>
        <form wire:submit="delete" class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Remove Event Image') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Are you sure you want to remove the image from this event?') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Remove Image') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
