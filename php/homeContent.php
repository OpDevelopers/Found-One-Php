

<div class="container-lg d-lg-flex">
  <div class="col-xl-7 col-md-7 col-sm-12 new-container">
    <h1>Easy Way to Find <span>Your Property</span></h1>
    <p>
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non aliquid
      assumenda, officia alias vitae quisquam molestias, dolores reprehenderit,
      commodi consequuntur maiores consectetur inventore. Voluptatem?
    </p>

    <div class="col-lg-7 col-md-6 col-sm-10 bg-primary-subtle m-3 p-3">
      <div class="row">
        <div class="upper d-lg-flex">
          <h3>Property :</h3>
          <a href="/php/sale.php"
            ><button type="button" class="btn btn-primary mx-2">
              For Sale
            </button></a
          >
          <a href="/php/rent.php"
            ><button type="button" class="btn btn-primary mx-2">
              For Rent
            </button></a
          >
        </div>
        <form action="/../search/search.php" method="post">
          <div class="d-lg-flex align-items-center col-md-6 col-sm-12 mt-3">
            <div class="input-group p-2 col-md-6 col-sm-12">
              <input
                type="text"
                name="cityName"
                class="form-control col-3"
                placeholder="city"
                aria-label="Text input with 2 dropdown buttons"
              />
              <button
                class="btn btn-outline-secondary dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fas fa-down"></i>
              </button>
              <!-- <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
              </ul> -->
            </div>
            <div class="input-group p-2 col-md-6 col-sm-12">
              <input
                type="text"
                name="category"
                class="form-control col-3"
                placeholder="Rent, sale etc.."
                aria-label="Text input with 2 dropdown buttons"
              />
              <button
                class="btn btn-outline-secondary dropdown-toggle"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="fas fa-down"></i>
              </button>
              <!-- <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
              </ul> -->
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-xl-5 col-md-5">
    <img src="../images/house-img-5.webp  " class="card-img-top" alt="..." />
  </div>
</div>
