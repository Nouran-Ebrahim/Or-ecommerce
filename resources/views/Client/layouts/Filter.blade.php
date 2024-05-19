<form action="" class="p-0">
    <div class="row  px-3  my-3 justify-content-between">
        <h6 class="p-0 fw-semibold fs-5">
            @lang('trans.Category')
        </h6>
        @foreach ($Categories as $Category)
        <div class=" p-2 d-flex align-items-center">
            <input @checked($Category->id == request('category_id') || in_array($Category->id, (array)request('categories'))) type="checkbox" id="category-{{ $Category->id }}" name="categories[]" value="{{ $Category->id }}" class="p-2">
            <label for="category-{{ $Category->id }}" class="fs-6 px-2">{{ $Category->title() }}</label>
        </div>
        @endforeach
    </div>
    <div class="row gy-1 px-3  my-3 justify-content-lg-between justify-content-start buttonContainer" id="">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h6 class="p-0 fw-semibold fs-5">
                @lang('trans.size')
            </h6>
            <h6 class="text-secondary" role="button" data-bs-toggle="modal" data-bs-target="#filter">
                <span class="text-decoration-underline px-2">@lang('trans.ViewChart')</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <mask id="mask0_47_2690" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                        <rect y="3.05176e-05" width="16" height="16" fill="#D9D9D9" />
                    </mask>
                    <g mask="url(#mask0_47_2690)">
                        <path d="M2.66683 12C2.30016 12 1.98627 11.8695 1.72516 11.6084C1.46405 11.3473 1.3335 11.0334 1.3335 10.6667V5.33336C1.3335 4.9667 1.46405 4.65281 1.72516 4.3917C1.98627 4.13059 2.30016 4.00003 2.66683 4.00003H13.3335C13.7002 4.00003 14.0141 4.13059 14.2752 4.3917C14.5363 4.65281 14.6668 4.9667 14.6668 5.33336V10.6667C14.6668 11.0334 14.5363 11.3473 14.2752 11.6084C14.0141 11.8695 13.7002 12 13.3335 12H2.66683ZM2.66683 10.6667H13.3335V5.33336H11.3335V8.00003H10.0002V5.33336H8.66683V8.00003H7.3335V5.33336H6.00016V8.00003H4.66683V5.33336H2.66683V10.6667Z" fill="#9D9D9D" />
                    </g>
                </svg>
                </span>
            </h6>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            <ul class="list-group">
                @foreach ($Sizes as $Size)
                <li class="">
                    <input @checked(in_array($Size->id, (array)request('sizes'))) type="checkbox" id="Size-{{ $Size->id }}"  name="sizes[]" value="{{ $Size->id }}" class="p-2"></input>
                    <label for="Size-{{ $Size->id }}" class="fs-6 px-2">
                        {{ $Size->title() }}
                    </label>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row  px-3  my-3 justify-content-between buttonContainer2">
        <h6 class="p-0 fw-semibold fs-5">
            @lang('trans.color')
        </h6>
        <div class="d-flex gap-2 flex-wrap">
            <ul class="list-group">
                @foreach ($Colors as $Color)
                <li class="">
                    <input @checked(in_array($Color->id, (array)request('colors'))) type="checkbox" id="Color-{{ $Color->id }}" name="colors[]" value="{{ $Color->id }}" class="p-2"></input>
                    <label for="Color-{{ $Color->id }}" class="fs-6 px-2">
                        <i class="fa-solid fa-circle" style="color: {{ $Color->hexa }};"></i>
                        {{ $Color->title() }}
                    </label>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="mb-3 w-100 d-flex justify-content-center">
        <button type="submit" class="btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2 w-50 py-2"> @lang('trans.filter') </button>
    </div>
</form>
