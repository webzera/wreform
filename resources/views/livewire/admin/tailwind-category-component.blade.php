<div>
    <div class="flex w-1/2 bg-gray-100 border border-blue-300">
    	<div x-data="{acik:false, aktif:'', secim:''}">
    		<x-jet-label value="category"/> <div x-text="aktif"></div>
    		<div class="flex w-full items-center justify-center h-10 px-2 py-1 border border-gray-300 rounded-md cursor-pointer"
    		@click="acik=!acik">
    			<div x-text="secim==''? 'Category List' : secim">Category list</div>
    		</div>
    		<div class="flex flex-col bg-gray-100 border border-gray-300" x-show="acik">
    			<input type="text" wire:model="category_name" class="h-10 m-2 mb-1 border border-gray-300 rounded-md">
    			<div>
    				@foreach($this->categories as $category)
    				<div class="pl-2 hover:bg-green-300 cursor-pointer py-2"
    				@click="aktif='{{$category->id}}', secim='{{$category->cate_name}}', acik=false, $wire.selctCateId=aktif"
    				:class="{'bg-green-200' : aktif== '{{$category->id}}'}"    				
    				>{{$category->cate_name}}</div>
    				<i class="fas fa-check-circle text-green-400" x-show="aktif=={{$category->id}}"></i>
    				@endforeach
    			</div>
    		</div>
    	</div>
    </div>
</div>
