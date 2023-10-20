
<div class="album col-lg-11 py-5 bg-body-ternary m-auto medium-device">
    <div class="container">
    <div class="row row-cols-2 col-lg-12 my-2">
      <div
        class="text d-flex justify-content-between py-3 col-lg-10 col-md-6 col-sm-6"
      >
        <h2>recent Properties</h2>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-primary">
          <a
            href="./AllListing/allListing.php"
            style="color: white; text-decoration: none"
            >All Listings</a
          >
        </button>
      </div>
    </div>
  
    <form action="/list" method="POST">
        <div class="album">
          <?php 
       include __DIR__ . '/../array.php';

        $_firstFour= array_slice($phpArray,0,4);

        foreach($_firstFour as $element){ ?>
          <div class="container">
            <div class="col-lg-12 row row-cols-2 my-5 itemImageContainer">
              <div class="col-lg-6 p-0 itemImage">
                <img src="<?php echo $element->collectionImage[0] ?>" alt="" />
              </div>

              <div class="col-lg-6 itemDescription">
                <div class="col">
                  <div class="col name"> <strong>  Apartment : <?php echo $element->buildName ?> </strong></div>
                  <div class="col name">Location : <?php echo $element->address ?></div>
                  <div class="col name">
                    <div class="col-5 d-flex align-center justify-content-around text-start">
                      <p>
                        <i class="fas fa-bed"></i
                        ><span> <?php echo $element->BHK->bed ?> Bed</span>
                      </p>
                      <p>
                        <i class="fas fa-bath"></i
                        ><span> <?php echo $element->BHK->bath ?> Bath</span>
                      </p>
                      <p>
                        <i class="fas fa-maximize"></i
                        ><span> <?php echo $element->size ?> sqft</span>
                      </p>
                    </div>
                  </div>
                  <div class="col name"><strong> price : <?php echo $element->price ?></strong></div>
                  <div class="col-5 descriptionButton">

                    <button class="submit btn btn-primary" value="<?php echo $element->id ?>" name="productId">
                      Check Property
                    </button>
                  </div>
                </div>
                <!-- <div class="descriptionItem">
                  <div class="col-12 px-1">
                    <p><%= element.description[0] %></p>
                  </div>
                </div> -->


</div>
              </div>

           
            </div>
        </div>
    <?php }; ?>
        </div>
          </form>
    </div>
  </div>
  
  <!-- Featured Listings  for small devices-->
  <!-- For small devices you can go upto 7-8 levels of value -->
  
  <div class="album col-lg-11 py-5 bg-body-tertiary m-auto featured-listing">
    <div class="container">
      <div class="row col-lg-12 my-2">
        <div
          class="text d-flex justify-content-between py-3 col-lg-12 col-md-6 col-sm-12"
        >
          <h2>Featured Properties</h2>
        </div>
      </div>
      <form action="/php/list.php" method="POST">

        <div class="new-grid snap-scroller g-3">
        <?php include __DIR__ . '/../array.php';

        $_firstFour= array_slice($phpArray,0,10); 
          foreach($_firstFour as $element){?>
          <div class="col">
            <button class="submit" value="<?php echo $element->id ?>" name="productId">
              <div class="card">
                <div class="for-sale">
                  <p><?php echo $element->tag ?></p>
                </div>
  
                <img src="<?php echo $element->collectionImage[0] ?>" alt="" />
                <div class="card-body">
                 <div class="card-text text-start">
                    <h5 class="card-text"><?php echo $element->buildName ?></h5>
                    <h5>Price : &#8377; <?php echo $element->price ?></h5>
                  </div>
                  <div class="location col-lg-11 col-md-10">
                    <p>
                      <i class="fas fa-location mx-2"></i><?php echo $element->address ?>
                    </p>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group col-lg-11 col-md-10">
                      <div
                        class="d-flex py-1 col-lg-12 justify-content-between card-icons"
                      >
                        <p>
                          <i class="fas fa-bed"></i
                          ><span><?php echo $element->BHK->bed ?></span>
                        </p>
                        <p>
                          <i class="fas fa-bath"></i
                          ><span><?php echo $element->BHK->bath ?></span>
                        </p>
                        <p>
                          <i class="fas fa-maximize"></i
                          ><span><?php echo $element->size ?></span>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </button>
          </div>
          <?php } ?>       
          </div>
        </div>
      </form>
    </div>
  </div>
  
  