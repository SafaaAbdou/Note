<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !$note->trashed()?__('My Notes'):__('Trashed Notes')  }}
        </h2>

        @if (!$note->trashed())
        <a  href="{{ route('notes.edit',$note) }}">Edit Note</a>
        @endif

    </x-slot>

    <div class="note">

        @if(session('success'))
        <div class="success-msg">{{session('success')}}</div>

        @endif


                    @if (!$note->trashed())

            <div class="note-date">
                <h4><span>Created at : </span> {{$note ->created_at->diffForHumans()}}</h4>
                <h4><span>Updated at : </span>{{$note ->updated_at->diffForHumans()}}</h4>

            </div>
            <div class="note-content">
                <h2>{{ $note ->title }}</h2>
                <p>{{ $note->text }}</p>

            </div>


                        <form action="{{ route('notes.destroy',$note) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure,You wish to move this note to trash ?')">Move to Trash </button>


                        </form>
                    </div>

                </div>



                    @else



                    <div class="note-date">
                        <h4><span>Deleted : </span> {{$note ->deleted_at->diffForHumans()}}</h4>
                    </div>

                   <div class="note-content">
                    <h2>{{ $note ->title }}</h2>
                    <p>{{ $note->text }}</p>
                </div>


                    <div class="btn-div">

                        <form action="{{ route('trashed.update',$note) }}" method="post">
                            @method('put')
                            @csrf

                            <button type="submit">Restore Note</button>

                        </form>


                        <form action="{{ route('trashed.destroy',$note) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure,You wish to delete this note permanently ?')">Delete it </button>


                        </form>
                    </div>


                    @endif




</x-app-layout>
