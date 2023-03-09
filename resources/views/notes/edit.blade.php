<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <form class="note-form" action="{{ route('notes.update',$note)}}" method="POST">
                @method('put')
                @csrf



            <input   type="text" name="title" placeholder="Title" autocomplete="off" value="{{ $note ->title }}">

            @error('title')

           <div class="err-msg"> {{ $message }}</div>

            @enderror

            <textarea name="text" rows="10"

             placeholder="Start typing here....." autocomplete="off"value="">{{ $note ->text }}</textarea>
            @error('text')
            <div class="err-msg">{{ $message }}</div>

            @enderror
            <button>Save Note</button>


            </form>


        </div>


    </div>
</x-app-layout>
