@extends('layouts.page')

@include('inc.page-meta')

@section('main')
<section class="content">
    <article>
        <div class="content-tm">
        {!! $about->content !!}
        </div>
    </article>
</section>
<section>
<section class="home-hexgrid about-gallery">
    
    <ul class="hexGrid">

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic9.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>
          
    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic10.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic1.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic2.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic3.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic4.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic5.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic6.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic7.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic8.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic11.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic12.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic13.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic14.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>

    <li class="hex">
        <div class="hexIn">
            <a class="hexLink">
                <picture>
                <img src="{{url('storage/img/bodyclinic15.jpg')}}" >
                </picture>
            </a>
        </div>
    </li>


    </ul>
</section> 
</section>
<span class="line"></span>
@endsection