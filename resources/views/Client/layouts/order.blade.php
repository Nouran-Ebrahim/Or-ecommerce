<div class="accordion border border-1 border-black accordion-flush mb-2" id="order-{{ $Order->id }}">
    <div class="accordion-item ">
        <h2 class="accordion-header direction">
            <a class="accordion-button collapsed text-black fw-bold my-2 w-100 p-3 rounded d-flex align-items-center phoneButton" type="button" data-bs-toggle="collapse" data-bs-target="#flush-order-{{ $Order->id }}" aria-expanded="false" aria-controls="flush-order-{{ $Order->id }}">
                @lang('trans.orderNo') #{{ $Order->id }}
            </a>
        </h2>
        <div id="flush-order-{{ $Order->id }}" class="accordion-collapse collapse" data-bs-parent="#order-{{ $Order->id }}">
            <div class="accordion-body">
                @foreach ($Order->OrderProducts as $OrderProduct)
                    <div class="row py-2">
                        
                        <div class="col-lg-10 col-12">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="assets/imgs/products/Property 1=Default.png" alt="...">
                                </div>
                                <div class="flex-grow-1 mx-3 d-flex justify-content-between">
                                    <div>
                                        <h5>{{ $OrderProduct->Product->code ? $OrderProduct->Product->code : '' }} - {{ $OrderProduct->Product->title() }}</h5>
                                        <div class="d-flex  text-secondary justify-content-between">
                                            @if ($OrderProduct->color_id)
                                                <span> <b>@lang('trans.color')</b> {{ $OrderProduct->Color->title() }}</span>
                                            @endif
                                            @if ($OrderProduct->soze_id)
                                                <span> <b>@lang('trans.size')</b> {{ $OrderProduct->Size->title() }}</span>
                                            @endif
                                        </div>
                                        <div class="d-flex  text-secondary justify-content-between">
                                            <span> <b>@lang('trans.Quantity')</b> {{ $OrderProduct->quantity }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h5 class="text-secondary">{{ $OrderProduct->total }} {{ country()->currancy_code }}</h5>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</div>