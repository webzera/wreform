@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@endsection
<div class="p-6">
            <div class="mt-4">
                <!-- <x-jet-label for="title" value="{{ __('Title') }}" /> -->
                <x-jet-input wire:model.debounce.800ms="page_title" id="page_title" class="block mt-1 w-full" type="text" placeholder="Page title" />
                @error('page_title') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <!-- <x-jet-label for="slug" value="{{ __('Slug') }}" /> -->
                <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        http://localhost:8000/
                    </span>
                    <input wire:model="slug" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug" disabled>
                </div>
                @error('slug') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>           

            <div class="mb-4">
                 <textarea class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 mt-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="page_excerpt" placeholder="Page excerpt"></textarea>
                  @error('page_excerpt') <span class="text-red-700">{{ $message }}</span>@enderror
             </div>

             <div class="mb-4"  wire:ignore>

                <textarea class="form-control ckeditor" name="page_content" wire:model="page_content" id="pageeditor"></textarea>                 
                  @error('page_content') <span class="text-red-700">{{ $message }}</span>@enderror
             </div> 

            @if ($modelId)
            <div class="form-group">
                <label class="col-md-4 control-label">Image</label>
                <div class="col-md-4">                    
                    <x-jet-input wire:model="newfeature_image" id="newfeature_image" class="block mt-1 w-full" type="file" />
                    @if($newfeature_image)
                        <img src="{{$newfeature_image->temporaryUrl()}}" width="120">
                     @else
                        <img src="{{asset('assets/img/pageImg')}}/{{$feature_image}}" width="120">
                    @endif
                </div>
            </div>
            @else
            <div class="mt-4">
                <x-jet-label for="feature_image" value="{{ __('Feature image') }}" />
                <x-jet-input wire:model="feature_image" id="feature_image" class="block mt-1 w-full" type="file" />
                @if($feature_image)
                    <img src="{{$feature_image->temporaryUrl()}}" width="120">
                @endif
                @error('feature_image') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>
            @endif

            <div class="mt-4">
                <!-- <x-jet-label for="menu_name" value="{{ __('Menu name') }}" /> -->
                <x-jet-input wire:model="menu_name" id="menu_name" class="block mt-1 w-full" type="text" placeholder="Menu name" />
                @error('menu_name') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <!-- <x-jet-label for="menu_type" value="{{ __('Plays Hand') }}" /> -->
                <select wire:model="menu_type" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">--Menu-Position--</option>
                    <option value="Top">Top</option>
                    <option value="Footer">Footer</option>
                </select>
                @error('menu_type') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>    

            <div class="mt-4">
                <x-jet-label for="parent_id" value="{{ __('Parent Menu') }}" />
                <select wire:model="parent_id" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <!-- <option value="">--Parent Menu Root--</option> -->
                    <option value="0" selected>Root</option>
                    <?php $allmenus=App\Models\Menulist::all(); ?>
                    @foreach ($allmenus as $menu)
                      <option value="{{ $menu->page_id }}">{{ $menu->menu_name }}</option>
                    @endforeach
                </select>
                @error('parent_id') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>     

            <div class="mt-4">
                <!-- <x-jet-label for="menu_weight" value="{{ __('Plays Hand') }}" /> -->
                <select wire:model="menu_weight" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">--Menu-Weightage--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                @error('menu_weight') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>   
            <div name="footer">

                @if ($modelId)
                    <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Update page') }}
                    </x-jet-danger-button>
                @else
                    <x-jet-button class="bg-green-600 px-4 py-2 text-white rounded-lg ml-2 mt-5" wire:click="create" wire:loading.attr="disabled">
                        {{ __('Add page') }}
                    </x-jet-danger-button>
                @endif
                
            </div>   
     
</div>
@section('scripts')                  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };

  // CKEDITOR.replace('pageeditor', options);
  CKEDITOR.replace('pageeditor', options).on('change', function(e){
        @this.set('page_content', e.editor.getData());
    });
</script>
@endsection