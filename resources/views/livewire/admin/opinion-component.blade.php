@section ('styles')
<style>
.unreadmsg td{
font-weight:bold;
}
</style>
@endsection
<div class="p-6">
    <!-- <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button class="bg-green-600 px-4 py-2 text-white rounded-lg" wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div> -->

    {{-- The data table --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">date</th>

                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</th>

                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Country</th>

                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">suggestion</th>

                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>                                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $adminn=\App\Models\User::find(1); ?>
                            @if ($adminn->notifications)
                                @foreach ($adminn->notifications as $opinion)
                                   <tr class="<?php if(!$opinion->read_at){ echo 'unreadmsg'; } ?>">                                    
                                                                     <!-- $newDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y'); -->           
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$opinion->created_at->format('d-M-Y')}}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$opinion->data['name']}}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$opinion->data['email']}}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$opinion->data['country']}}</td>
                                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$opinion->data['opinion']}}</td>   

                                        <td class="px-6 py-4 text-right text-sm">
                                            
                                            <x-jet-danger-button class="mt-3 bg-red-400 px-4 py-2 text-gray rounded-lg" wire:click="deleteShowModal('{{ $opinion->id }}')">
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


    {{-- The Delete Modal --}}

    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Opinion') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this opinion? Once the opinion is deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Opinion') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
