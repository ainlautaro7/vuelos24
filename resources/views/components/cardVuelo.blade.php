<?php use App\Http\Controllers\VueloController; ?>
<style>
    .mb15 {
        margin-bottom: 15px;
    }

    .card {
        border-radius: 8px;
        overflow: hidden;
    }

    .card .card__img-wrap {
        height: 150px;
        width: 100%;
        border-radius: 8px 8px 0 0;
        position: relative;
        background-color: #ccc;
        overflow: hidden;
    }

    .card .card__img-wrap img {
        min-height: 100%;
        min-width: 100%;
        width: 100%;
    }

    .card .title-overlay-center {
        color: #fff;
    }

    .cardVuelo-overlay {
        position: absolute;
        top: 0%;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgb(2 0 36 / 45%) 0%, rgb(9 9 121 / 50%) 35%, rgb(0 212 255 / 49%) 100%);
    }

    .card .title-overlay-center {
        text-align: center;
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 45%;
        text-transform: uppercase;
        font-weight: bold;
    }

    .h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0;
        font-weight: normal;
    }

    .h4,
    h4 {
        font-size: 18px;
    }

    .card-big .card__info {
        border-radius: 0 0 6px 6px;
        background-color: #fff;
        float: left;
        width: 100%;
        border-bottom: 1px dashed #D1D1D1;
    }

    .card .card__info {
        padding: 15px;
    }

    .card-big .title-left-wrap {
        float: left;
        width: 40%;
        text-align: left;
    }

    .card-big .card__info small {
        color: #8B8B8B;
    }

    .card-big .icon-center-wrap {
        float: left;
        text-align: center;
        width: 20%;
    }

    .card-big .title-right-wrap {
        float: left;
        width: 40%;
        text-align: right;
    }

    .card-big .card__pricelist {
        background-color: #fff;
        border-radius: 6px 6px 0 0;
        float: left;
        width: 100%;
    }

    .card-big .cost {
        float: left;
        width: 100%;
        padding: 10px 15px;
        border-bottom: 1px dashed #F5F5F5;
    }

    .card-big .logo-wrap {
        float: left;
        width: 40%;
        border: 1 px solid #F5F5F5;
        border-radius: 8 px;
        height: auto;
        text-align: center;
    }

    .card-big .logo-wrap img {
        max-height: 34px;
    }

    .card-big .icon-wrap {
        float: left;
        width: 45%;
        text-align: center;
    }

    .card-big .icon-wrap i {
        display: block;
        color: #D1D1D1;
        font-size: 18px;
    }

    .card-big .icon-wrap small {
        color: #8B8B8B;
    }

    .card-big .price-wrap {
        float: right;
        width: 35%;
        text-align: right;

    }

    .card .price {
        color: #113F6D;
        font-weight: 600;
        font-style: normal;
        line-height: normal;
        display: block;
        font-size: 15px;
        padding-bottom: 5px;
    }

    .card .price .currency {
        font-size: 85%;
        color: #8B8B8B;
    }

    .card-big .price-wrap .small {
        text-transform: uppercase;
        background-color: #EC6F23;
        color: #fff;
        padding: 3px 5px;
        border-radius: 3px;
        font-size: 11px;
    }

    .rotate90 {
        transform: rotate(90deg);
    }

</style>
<div class="row">
    <div class="d-none">{{ $i = 1 }}</div>
    @foreach (VueloController::vuelosInteresantes() as $vuelo)
        <div class="col-sm-6 col-md-3 col-xs-12">
            <article class="card card-big mb15">
                <div class="card__img-wrap">
                    <img class="img-cardVuelo" src="{{ asset('/img/' . $i . '.jpg') }}">
                    <div class="cardVuelo-overlay">
                        <h4 class="title title-overlay-center">Explora {{ $vuelo->destino }}</h4>
                    </div>
                </div>
                <div class="card__info">
                    <div class="title-left-wrap">
                        <h6>{{ $vuelo->origen }}</h6> <small> {{ $vuelo->origenIATA }} </small>
                    </div>
                    <span class="icon-center-wrap"><i class="fas fa-plane"></i></span>
                    <div class="title-right-wrap">
                        <h6>{{ $vuelo->destino }}</h6> <small>{{ $vuelo->destinoIATA }}</small>
                    </div>
                </div> <!--  card__info //  -->
                <div class="card__pricelist">
                    <div class="cost">
                        <div class="icon-wrap"> <i class="fas fa-plane float-start"></i>
                            <small>{{ $vuelo->fechaVuelo }}</small>
                        </div>
                        <div class="price-wrap"><var class="price"><span class="currency">$</span>
                                {{ $vuelo->tarifaTurista }}</var>
                        </div>
                    </div>
                </div> <!-- card__pricelist // -->
            </article> <!-- card // -->
        </div><!-- col // -->
        <div class="d-none">{{ $i++ }}</div>
    @endforeach
</div>
