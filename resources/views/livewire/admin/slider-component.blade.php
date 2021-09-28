<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button class="bg-green-600 px-4 py-2 text-white rounded-lg" wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
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
                                
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Caption</th>

                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sub caption</th>

                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Link</th>

                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($data->count())
                                @foreach ($data as $item)
                                    <tr>
                                    	<td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            <img src="{{asset('storage/sliderImg')}}/{{$item->slider_image}}" width="120">
                                        </td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                            {{ $item->title }}
                                            {!! $item->is_default_home ? '<span class="text-green-400 text-xs font-bold">[Default Home Page]</span>':''!!}
                                            {!! $item->is_default_not_found ? '<span class="text-red-400 text-xs font-bold">[Default 404 Page]</span>':''!!}
                                        </td>
                                        
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->caption}}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{!! \Illuminate\Support\Str::limit($item->sub_caption, 50, '...') !!}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->link_url}}</td>

                                        <td class="px-6 py-4 text-right text-sm">
                                            <x-jet-button class="bg-yellow-400 px-4 py-2 text-gray rounded-lg" wire:click="updateShowModal({{ $item->id }})">
                                                {{ __('Update') }}
                                            </x-jet-button>
                                            <x-jet-danger-button class="mt-3 bg-red-400 px-4 py-2 text-gray rounded-lg" wire:click="deleteShowModal({{ $item->id }})">
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

    {{-- Modal Form --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Slider') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <!-- <x-jet-label for="title" value="{{ __('Title') }}" /> -->
                <x-jet-input wire:model.debounce.800ms="title" id="title" class="block mt-1 w-full" type="text" placeholder="Title" />
                @error('title') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <!-- <x-jet-label for="caption" value="{{ __('Caption') }}" /> -->
                <x-jet-input wire:model.debounce.800ms="caption" id="caption" class="block mt-1 w-full" type="text" placeholder="Caption" />
                @error('caption') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>            

            <div class="mb-4">
                 <textarea class="shadow appearance-none border rounded w-full py-2 px-3 mt-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="sub_caption" placeholder="Sub Caption"></textarea>
                  @error('sub_caption') <span class="text-red-700">{{ $message }}</span>@enderror
             </div> 

            @if ($modelId)
            <div class="form-group">
                <label class="col-md-4 control-label">Image</label>
                <div class="col-md-4">
                    <input type="file" name="slider_image" class="input-file" wire:model="newslider_image">
                    @if($newslider_image)
                        <img src="{{$newslider_image->temporaryUrl()}}" width="120">
                     @else
                        <img src="{{asset('assets/img/sliderImg')}}/{{$slider_image}}" width="120">
                    @endif
                </div>
            </div>
            @else
            <div class="mt-4">
                <x-jet-label for="slider_image" value="{{ __('Select slider image') }}" />
                <x-jet-input wire:model="slider_image" id="slider_image" class="block mt-1 w-full" type="file" />
                @if($slider_image)
                    <img src="{{$slider_image->temporaryUrl()}}" width="120">
                @endif
                @error('slider_image') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>
            @endif

            <div class="mt-4">
                <x-jet-label for="link_url" value="{{ __('Read more link') }}" />
                <x-jet-input wire:model.debounce.800ms="link_url" id="link_url" class="block mt-1 w-full" type="text" />
                @error('link_url') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>
     
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update slider') }}
                </x-jet-danger-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Add slider') }}
                </x-jet-danger-button>
            @endif
            
        </x-slot>
    </x-jet-dialog-modal>

    {{-- The Delete Modal --}}

    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Slider') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this slider? Once the slider is deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Slider') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
