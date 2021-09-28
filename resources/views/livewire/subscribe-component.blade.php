<div class="col-lg-4 col-md-6 footer-newsletter">

 <div class="col-lg-12 contact"  {{$opinionFormDisplay}} >
    <p style="font-size:18px; color: #fff; font-weight: bold; margin-left: 12px;">Drop Your Opinion </p>
        <div id="formid" class="php-email-form">       
    

      <div class="rounded" style="border: 1px solid cornsilk; padding: 10px;">
        <div class="col-md-12 form-group">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-6" style="padding-right: 1px;">
              <input type="text" class="form-control" wire:model="name" placeholder="Name (optional)">
            </div>
            <div class="col-md-6 col-sm-6 col-6" style="padding-left: 1px;">
              <input type="text" class="form-control" wire:model="country_name" placeholder="Country (optional)">
            </div>
          </div>
        </div>

        <div class="form-group">
          <input type="email" class="form-control" wire:model="email" placeholder="Email">
          @error('email')    <p>{{ $message }}</p>  @enderror
        </div>
       
        <div class="form-group">
          <textarea class="form-control" wire:model="opinion" rows="2" placeholder="Enter your opinion"></textarea>
          @error('opinion')    <p>{{ $message }}</p>  @enderror
        </div>

        <div class="text-end"><button type="submit" wire:click="addOpinion" wire:loading.attr="disabled">Submit</button></div>
        </div>
      </div>


  </div>
  <div class="col-lg-10 contact" {{$formSubmitDisplay}} >
      <p class="text-center">Thank you for your Interest...</p>
  </div>


</div>