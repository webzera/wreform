
<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <a class="bg-green-600 px-4 py-2 text-white rounded-lg" href="{{route('admin.postcreate')}}">
            {{ __('Create') }}
        </a>
    </div>

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                            	<th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>

                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Excerpt</th>                              

                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>
                                    	<td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <img src="{{asset('storage/postImg')}}/{{$item->feature_image}}" width="120">
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->title }}
                                            {!! $item->is_default_home ? '<span class="text-green-400 text-xs font-bold">[Default Home Page]</span>':''!!}
                                            {!! $item->is_default_not_found ? '<span class="text-red-400 text-xs font-bold">[Default 404 Page]</span>':''!!}
                                        </td>
                                        
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->excerpt}}</td>                                     
                                        <td class="px-6 py-4 text-right text-sm">
                                            <!-- <x-jet-button wire:click="{{route('admin.postupdate', $item->id)}}">
                                                {{ __('Update') }}
                                            </x-jet-button> -->
                                            <a class="bg-yellow-400 px-4 py-2 text-gray rounded-lg" href="{{route('admin.postupdate', $item->id)}}">
                                                {{ __('Update') }}
                                            </a>
                                            <x-jet-danger-button class="ml-2 mt-3" wire:click="deleteShowModal({{ $item->id }})">
                                                {{ __('Delete') }}
                                            </x-jet-button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="6">No Results Found</td>
                                </tr>
                            @endif
                           
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    
    <br/>
    {{ $data->links() }}

    {{-- The Delete Modal --}}

    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Post') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this post? Once the page is deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Post') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
