<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ request()->routeIs('notes.index')?__('My Notes'):__('Trashed Notes') }}
        </h2>
          <!--check if the route is notes.index dispaly add new note btn --->
          @if (request()->routeIs('notes.index'))
          <a  href="{{ route('notes.create') }}">Add Note</a>


          @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


        @if(session('success'))
        <div class="success-msg">{{session('success')}}</div>

        @endif



            @forelse ($notes as $note)

            <div class="note-item">

                @if (request()->routeIs('notes.index'))
             <a class="note-title" href="{{ route('notes.show' ,$note) }}"><h2>{{ $note ->title }}</h2></a>

             @else
             <a class="note-title" href="{{ route('trashed.show' ,$note) }}"><h2>{{ $note ->title }}</h2></a>

             @endif
             <p class="note-text">{{ Str::limit($note->text ,200)}}</p>
             <span class="note-update">{{ $note->updated_at->diffForHumans() }}</span>

            </div>

           @empty
           @if (request()->routeIs('notes.index'))

           <p class="no-items">You have no notes yet.</p>



           @else
           <p class="no-items">No items in your trash.</p>

           @endif


            @endforelse

            {{$notes->links()}}


        </div>
    </div>
</x-app-layout>
