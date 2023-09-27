<div class="card add-product">
    <form class="container my-5" wire:submit.prevent="store">
        <div class="mb-3">
            <label class="form-label">{{__('ui.productName')}}</label>
            <input wire:model="name" type="text" class="form-control">
            <div class="text-danger">@error('name') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label class="form-label">{{__("ui.description")}}</label>
            <textarea wire:model="description" class="form-control" name="description" cols="30" rows="5"></textarea>
            <div class="text-danger">@error('description') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label class="form-label">{{__("ui.category")}}</label>
            <select wire:model="category_id" class="form-select" onfocus="this.size=8;" onblur="this.size=0;" onchange="this.size=1; this.blur()">
                <option value="" class="option-custom">-- {{__("ui.selectCategory")}} --</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" class="text-black option-custom">{{__("category.{$category->name}")  }}</option>
                @endforeach
            </select>
            <div class="text-danger">@error('category_id') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label class="form-label">{{__("ui.price")}}</label>
            <input wire:model="price" type="number" novalidate  class="form-control">
            <div class="text-danger">@error('price') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <input wire:model="temporary_images" type="file" name="images" class="form-control" multiple>
            <div class="text-danger">@error('temporary_images.*') {{ $message }} @enderror</div>
        </div>
        @if(!empty($images))
        <div class="row my-3">
            <div class="col-12">
                <p>{{__("ui.preview")}}</p>
                <div class="row rounded shadow py-4 border-custom-preview">
                    @foreach ($images as $key => $image)
                    <div class="col my-3">
                        <div class="img-preview mx-auto shadow rounded" style="background-image:url({{$image->temporaryUrl()}});"></div>
                        <button class="btn-rifiuta btn-danger btn  d-block text-center mt-2 mx-auto" type="button" wire:click="removeImage({{$key}})">{{__("ui.delete")}}</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <button type="submit" class="btn-login">{{__("ui.add")}}</button>
    </form>
</div>