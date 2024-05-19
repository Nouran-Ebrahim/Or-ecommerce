{{--
<svg data-id="{{ $Product->id }}" class="position-absolute liked-icon m-3 point toggle-fav" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="top: 10px; right:10px">
    <path d="M3.66275 13.2136L9.82377 19.7066C11.0068 20.9533 12.9932 20.9534 14.1762 19.7066L20.3372 13.2136C22.5542 10.8771 22.5543 7.08895 20.3373 4.75248C18.1203 2.416 14.5258 2.416 12.3088 4.75248V4.75248C12.1409 4.92938 11.8591 4.92938 11.6912 4.75248V4.75248C9.47421 2.416 5.87975 2.416 3.66275 4.75248C1.44575 7.08895 1.44575 10.8771 3.66275 13.2136Z" stroke="#1E1E1E" stroke-width="1.5" />
</svg>
--}}
<a href="{{ route('client.product',$Product) }}">
    <div class="card  border-0 rounded-0">
        <div class="img-card d-flex align-items-center">
            <img class="w-100 h-auto" src="{{ asset($Product->RandomImage() ?? setting('logo')) }}" />
        </div>
        <div class="card-body px-0">
            <h6 class="text-black">
                <a>{{ $Product->code ? $Product->code . ' - ' : '' }} {{ $Product->title() }}</a>
            </h6>
            <p class="">
                <small class="fw-bold">{{ Country()->currancy_code }} {{ $Product->CalcPrice() }}</small>
                @if ($Product->HasDiscount())
                    <small class="text-decoration-line-through fs-6 fw-light">{{ $Product->Price() }}</small>
                @endif
            </p>
        </div>
    </div>
</a>