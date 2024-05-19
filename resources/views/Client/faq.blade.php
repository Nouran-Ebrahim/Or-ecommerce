@extends('Client.layouts.layout')

@section('content')
    <div class="container mt-5 pt-5">
        <h1 class="faq-heading--1 section-top mt-5 pt-5">
            @lang('trans.FREQUENTLY ASKED QUESTIONS')
        </h1>
    </div>
    <section class="orders container">
        <h2 class="faq-heading">@lang('trans.orders')</h2>
        @foreach ($faqs->where('type','orders') as $faq)
        <div class="questions-container">
            <div class="question-box">
                <p>{{$faq['question_'.lang()]}}</p>
                <button class="btn see-more-btn">
                    <img src="{{asset('frontEnd/assets/FAQ/plus.png')}}" alt />
                </button>
            </div>
            <p class="answer see-more-content hide-content">
                {{ $faq[ 'answer_'.lang() ] }}
            </p>
        </div>
        @endforeach
        
        
    </section>
    <section class="orders container">
        <h2 class="faq-heading">@lang('trans.payments')</h2>
        @foreach ($faqs->where('type','payments') as $faq)
        <div class="questions-container">
            <div class="question-box">
                <p>{{$faq['question_'.lang()]}}</p>
                <button class="btn see-more-btn">
                    <img src="{{asset('frontEnd/assets/FAQ/plus.png')}}" alt />
                </button>
            </div>
            <p class="answer see-more-content hide-content">
                {{ $faq[ 'answer_'.lang() ] }}
            </p>
        </div>
        @endforeach
        
        
    </section>
    <section class="orders container">
        <h2 class="faq-heading">@lang('trans.returns')</h2>
        @foreach ($faqs->where('type','returns') as $faq)
        <div class="questions-container">
            <div class="question-box">
                <p>{{$faq['question_'.lang()]}}</p>
                <button class="btn see-more-btn">
                    <img src="{{asset('frontEnd/assets/FAQ/plus.png')}}" alt />
                </button>
            </div>
            <p class="answer see-more-content hide-content">
                {{ $faq[ 'answer_'.lang() ] }}
            </p>
        </div>
        @endforeach
        
        
    </section>
@endsection
@push('js')
    <script>
        const seeMoreBtns = document.querySelectorAll(".see-more-btn");
        const seeMoreContents = document.querySelectorAll(".see-more-content");

        for (let i = 0; i < seeMoreBtns.length; i++) {
            seeMoreBtns[i].addEventListener("click", () => {
                seeMoreContents[i].classList.toggle("hide-content");
            });
        }
    </script>
@endpush
