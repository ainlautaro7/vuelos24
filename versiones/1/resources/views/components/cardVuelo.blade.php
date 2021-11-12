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
      }

      .card .title-overlay-center {
          color: #fff;
      }

      .card .title-overlay-center {
          text-align: center;
          display: block;
          width: 100%;
          height: 100%;
          position: absolute;
          top: 45%;
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
          width: 30%;
          border: 1px solid #F5F5F5;
          border-radius: 8px;
          height: 36px;
          text-align: center;
      }

      .card-big .logo-wrap img {
          max-height: 34px;
      }

      .card-big .icon-wrap {
          float: left;
          width: 35%;
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
      <div class="col-sm-6 col-md-3 col-xs-12">
          <article class="card card-big mb15">
              <div class="card__img-wrap">
                  <img src="https://asfartrip.com/public/upload/top_destinations/FLIGHT-CAI.jpg">
                  <h4 class="title title-overlay-center">Explora Ciudad Ida</h4>
              </div>
              <div class="card__info">
                  <div class="title-left-wrap">
                      <h5>Origen</h5> <small> IATA </small>
                  </div>
                  <span class="icon-center-wrap"><i class="fas fa-plane"></i></span>
                  <div class="title-right-wrap">
                      <h5>Destino</h5> <small>IATA </small>
                  </div>
              </div> <!--  card__info //  -->
              <div class="card__pricelist">
                  <div class="cost">
                      <div class="logo-wrap"><img {{-- src="https://asfartrip.com/public/assets/images/airline_logo/J9.png"></div> --}} <div class="icon-wrap"> <i
                              class="fas fa-plane"></i> <small>Fecha</small> </div>
                      <div class="price-wrap"><var class="price"><span class="currency">$</span>
                              540</var>
                          <a rel="nofollow" target="_blank" href="" class="small">Book</a>
                      </div>
                  </div>
              </div> <!-- card__pricelist // -->
          </article> <!-- card // -->
      </div><!-- col // -->
  </div>
