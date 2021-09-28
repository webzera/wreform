@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
@endsection
<div class="p-6">
            <div class="mt-4">
                <!-- <x-jet-label for="title" value="{{ __('Title') }}" /> -->
                <x-jet-input wire:model.debounce.800ms="title" id="title" class="block mt-1 w-full" type="text" placeholder="Post title" />
                @error('title') <span class="text-red-700">{{ $message }}</span> @enderror
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
                 <textarea class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 mt-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="excerpt" placeholder="Post excerpt"></textarea>
                  @error('excerpt') <span class="text-red-700">{{ $message }}</span>@enderror
             </div>

             <div class="mb-4"  wire:ignore>
                <textarea class="form-control ckeditor" name="content" wire:model="content" id="posteditor"></textarea>

                  @error('content') <span class="text-red-700">{{ $message }}</span>@enderror
             </div> 

             <div class="grid grid-cols-1 md:grid-cols-2">                 

                    <div class="form-group mr-2" wire:ignore>
                         <?php $allcate=App\Models\Category::all(); ?>
                         <label for="category_id">Select Category</label>

                        <select class="form-control" id="select2-dropdown" name="cate_name" wire:model="cate_name">
                            <!-- <option value="">Select Option</option> -->
                            @foreach($allcate as $row)
                            <option value="{{ $row->cate_name }}">{{ $row->cate_name }}</option>
                            @endforeach
                        </select>
                        <!-- @error('cate_name') <span class="text-red-700">{{ $message }}</span>@enderror -->
                    </div>

                    <div class="form-group ml-2" wire:ignore>
                        <?php $alltags=App\Models\Tag::all(); ?>
                        <label for="category_id">Select and type tags</label>

                      <select id="select2-tag" class="form-control" name="tag_name" wire:model="tag_name" multiple="multiple">
                        <!-- <option value="" >Select Option</option> -->
                        @foreach ($alltags as $row)
                         <option value="{{ $row->tag_name }}">{{ $row->tag_name }}</option>
                        @endforeach
                      </select>
                      <!-- @error('tag_name') <span class="text-red-700">{{ $message }}</span>@enderror -->
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif         


            @if ($modelId)
            <div class="form-group">
                <label class="col-md-4 control-label">Image</label>
                <div class="col-md-4">                    
                    <x-jet-input wire:model="newfeature_image" id="newfeature_image" class="block mt-1 w-full" type="file" />
                    @if($newfeature_image)
                        <img src="{{$newfeature_image->temporaryUrl()}}" width="120">
                     @else
                        <img src="{{asset('storage/postImg')}}/{{$feature_image}}" width="120">
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

            <div name="footer">            
                @if ($modelId)
                    <x-jet-button class="bg-yellow-400 px-4 py-2 text-white rounded-lg ml-2 mt-5" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Update post') }}
                    </x-jet-danger-button>
                @else
                    <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                        {{ __('Add post') }}
                    </x-jet-danger-button>
                @endif
                
            </div>    

</div>
@section('scripts')  

<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

  $(document).ready(function () {
    $("#select2-dropdown").select2({
        tags: true,
    });
    // $('#select2-dropdown').select2();
    $('#select2-dropdown').on('change', function (e) {
        var data = $('#select2-dropdown').select2("val");
        @this.set('cate_name', data);
    });

    $("#select2-tag").select2({
        tags: true,
    });
    // $('#select2-tag').select2();
    $('#select2-tag').on('change', function (e) {
        var data = $('#select2-tag').select2("val");
        @this.set('tag_name', data);
    });

 });

</script>



<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };

  // CKEDITOR.replace('posteditor', options);
  CKEDITOR.replace('posteditor', options).on('change', function(e){
        @this.set('content', e.editor.getData());
    });
</script>
@endsection