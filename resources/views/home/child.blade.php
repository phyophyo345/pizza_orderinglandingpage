@extends('layouts.master')
@section('content')
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <div class="container">
                <div class="row gy-4 justify-content-center justify-content-lg-between">
                    <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">What kind of pizza<br>Do you want today?</h1>
                        <p data-aos="fade-up" data-aos-delay="100">We are team of talented designers making websites
                            with Bootstrap</p>
                        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                            <a href="#" class="btn-get-started align-center">Book your Pizza<br>+959 333 444 555</a>
                            <a href="{{ asset('image/4008534-uhd_2160_4096_25fps.mp4') }}"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch
                                    Video</span></a>
                        </div>
                    </div>

                    <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section>
        <!-- /Hero Section -->
        <!-- Make Pizza Section -->
        <section id="make" class="make section light-background">
            <form action="{{ route('order#save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>Make Pizza<br></h2>
                    <p><span>Lets go</span> <span class="description-title">make a pizza</span></p>
                </div><!-- End Section Title -->
                <div class="container">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row d-flex">
                                <div class="col-5 offset-1  px-2" data-aos="fade-up" data-aos-delay="100">
                                    <div class="form-control">
                                        <label for="pizza-kind">Choose kinds:</label>
                                        <select class="form-select my-2" id="pizza-kind" name="category_id">
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" data-price="{{ $item->price }}"
                                                    selected>
                                                    {{ $item->sub_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5 offset-1 bg-white rounded py-5 px-2" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <div class="">
                                        <h1 class="text-primary">Select size:</h1>
                                        <div class="size-options">
                                            <!-- Hidden input for Size -->
                                            <input type="hidden" name="size" id="selected-size" value="S">
                                            <button type="button"
                                                class="size-btn btn btn-outline-primary rounded-circle bg-light "
                                                style="width:50px;height:50px;" data-size="S" data-price="0">S</button>
                                            <button type="button"
                                                class="size-btn btn btn-outline-primary rounded-circle bg-light "
                                                style="width:50px;height:50px;" data-size="M" data-price="5000">M</button>
                                            <button type="button"
                                                class="size-btn btn btn-outline-primary rounded-circle bg-light "
                                                style="width:50px;height:50px;" data-size="L" data-price="10000">L</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex my-4">
                                <div class="col-5 offset-1 bg-white rounded py-5 px-2" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <div class=" ">
                                        <h1 class="text-primary">Select Siteboard</h1>

                                        <div class="siteboard-options py-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Standard"
                                                    name="siteboard[]" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Standard
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Add Cheese"
                                                    name="siteboard[]" id="flexCheckChecked" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    Add Cheese
                                                </label>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-5 offset-1 bg-white rounded py-5 px-2" data-aos="fade-up"
                                    data-aos-delay="100">
                                    <div class=" ">
                                        <h1 class="text-primary">Select Sauce:</h1>

                                        <div class="sauce-options py-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Tomatoe Sauce"
                                                    name="saucetype[]" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Tomatoe Suace
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="White Sauce"
                                                    name="saucetype[]" id="flexCheckChecked" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    White Sauce
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="d-flex col-5 offset-1 px-2" data-aos="fade-up" data-aos-delay="100">
                                    <div class="total-box justify-content-center">
                                        <!-- Put this anywhere inside your <form> -->
                                        <input type="hidden" name="total_price" id="hidden-total-input" value="0">

                                        <h1 class="bg-danger rounded text-white fs-1 fw-bolderp px-5">Total Costs :<span
                                                id="total-display">0.00<span>
                                        </h1>

                                    </div>
                                </div>
                                <div class="col-5 offset-1">
                                    <button type="submit" class="btn btn-danger rounded-4 py-2 px-8" href=""
                                        id="add-to-cart-btn">
                                        <i class="fa-solid fa-cart-arrow-down"></i> Add to
                                        Cart</button>
                                </div>
                            </div>
                        </div>
                        <div class="topping-item col-lg-5  offset-1 bg-light rounded" data-aos="fade-up"
                            data-aos-delay="250">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col d-flex justify-content-between mt-3">
                                        <div class="">Select topping:</div>
                                        {{-- <div class="bg-success p-1 rounded text-white"><span id="topping-count">0</span>
                                            added</div> --}}
                                    </div>
                                </div>
                                <div class="row bg-white rounded mt-2">
                                    <div class="col  m-3">
                                        <div class="row algin-item-start">
                                            <div class="col-3"><img src="{{ asset('assets/img/pepperoni.jpg') }}"
                                                    alt="" width="50" height="50" class="rounded">
                                            </div>
                                            <div class="col-4">Pepperoni</div>
                                            <div class="col-2">1000</div>
                                            <div class="col-2 offset-1 form-check form-switch">
                                                <input class="topping-checkbox" type="checkbox" name="selectTopping[]"
                                                    id="flexSwitchCheckChecked" value="pepperoni" data-price="1000">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-white rounded mt-2">
                                    <div class="col m-3">
                                        <div class="row align-item-start">
                                            <div class="col-3"><img src="{{ asset('assets/img/ham.png') }}"
                                                    alt="" width="50" height="50" class="rounded">
                                            </div>
                                            <div class="col-4">Ham</div>
                                            <div class="col-2">2000</div>
                                            <div class="col-2 offset-1 form-check form-switch">
                                                <input class="topping-checkbox" type="checkbox" name="selectTopping[]"
                                                    id="flexSwitchCheckChecked" value="ham" data-price="2000">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-white rounded mt-2">
                                    <div class="col m-3">
                                        <div class="row align-item-start">
                                            <div class="col-3"><img src="{{ asset('assets/img/pepper.jpg') }}"
                                                    alt="" width="50" height="50" class="rounded">
                                            </div>
                                            <div class="col-4">Peppers</div>
                                            <div class="col-2">1000</div>
                                            <div class="col-2 offset-1 form-check form-switch">
                                                <input class="topping-checkbox" type="checkbox" name="selectTopping[]"
                                                    id="flexSwitchCheckChecked" value="peppers" data-price="1000">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-white rounded mt-2">
                                    <div class="col m-3">
                                        <div class="row align-item-center">
                                            <div class="col-3"><img src="{{ asset('assets/img/lettuce.png') }}"
                                                    alt="" width="50" height="50" class="rounded">
                                            </div>
                                            <div class="col-4">Fresh Lettuce</div>
                                            <div class="col-2">1000</div>
                                            <div class="col-2 offset-1 form-check form-switch">
                                                <input class="topping-checkbox" type="checkbox" name="selectTopping[]"
                                                    id="flexSwitchCheckChecked" value="fresh lettuce" data-price="1000">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-white rounded mt-2">
                                    <div class="col m-3">
                                        <div class="row align-item-center">
                                            <div class="col-3"><img src="{{ asset('assets/img/tomatoes.png') }}"
                                                    alt="" width="50" height="50" class="rounded">
                                            </div>
                                            <div class="col-4">Fresh Tomatoes</div>
                                            <div class="col-2">1000</div>
                                            <div class="col-2 offset-1 form-check form-switch">
                                                <input class="topping-checkbox" type="checkbox" name="selectTopping[]"
                                                    id="flexSwitchCheckChecked" value="fresh tomatoes" data-price="1000">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-white rounded mt-2">
                                    <div class="col m-3">
                                        <div class="row align-item-start">
                                            <div class="col-3"><img src="{{ asset('assets/img/bacon.png') }}"
                                                    alt="" width="50" height="50" class="rounded">
                                            </div>
                                            <div class="col-4">Bacon</div>
                                            <div class="col-2">2500</div>
                                            <div class="col-2 offset-1 form-check form-switch">
                                                <input class="topping-checkbox" type="checkbox" name="selectTopping[]"
                                                    id="flexSwitchCheckChecked" value="bacon" data-price="2500">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bg-white rounded my-2">
                                    <div class="col m-3">
                                        <div class="row align-content-center">
                                            <div class="col-3"><img src="{{ asset('assets/img/pineapple.png') }}"
                                                    alt="" width="50" height="50" class="rounded">
                                            </div>
                                            <div class="col-4">Pineapple</div>
                                            <div class="col-2">1000</div>
                                            <div class="col-2 offset-1 form-check form-switch">
                                                <input class="topping-checkbox" type="checkbox" name="selectTopping[]"
                                                    id="flexSwitchCheckChecked" value="pineapple" data-price="1000">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </section><!-- /Make Pizza Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About Us<br></h2>
                <p><span>Learn More</span> <span class="description-title">About Us</span></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('assets/img/about.jpg') }}" class="img-fluid mb-4" alt="">
                        <div class="book-a-table">
                            <h3>Book your Pizza</h3>
                            <p>+959 333 444 555</p>
                        </div>
                    </div>
                    <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore
                                magna aliqua.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in
                                        reprehenderit in voluptate velit.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta
                                        storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident
                            </p>

                            <div class="position-relative mt-4">
                                <img src="{{ asset('assets/img/about-2.jpg') }}" class="img-fluid" alt="">
                                <a href="{{ asset('image/6603839-uhd_2160_3840_25fps.mp4') }}"
                                    class="glightbox pulsating-play-btn"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Why Us Section -->
        <section id="why-us" class="why-us section light-background">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="why-box">
                            <h3>Why Choose Yummy</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus
                                optio ad corporis.
                            </p>
                            <div class="text-center">
                                <a href="#" class="more-btn"><span>Learn More</span> <i
                                        class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Why Box -->

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                            <div class="col-xl-4">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-clipboard-data"></i>
                                    <h4>Corporis voluptates officia eiusmod</h4>
                                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut
                                        aliquip</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-gem"></i>
                                    <h4>Ullamco laboris ladore lore pan</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-inboxes"></i>
                                    <h4>Labore consequatur incidid dolore</h4>
                                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere
                                    </p>
                                </div>
                            </div><!-- End Icon Box -->

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Why Us Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section dark-background">

            <img src="{{ asset('assets/img/stats-bg.jpg') }}" alt="" data-aos="fade-in">

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Clients</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Hours Of Support</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Workers</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Menu Section -->
        <section id="menu" class="menu section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Menu</h2>
                <p><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="">
                    <a href="{{ route('create#page') }}" class="btn btn-danger btn-outline text-white">Create Menu</a>
                </div>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="menu-starters">


                        <div class="tab-header text-center">
                            <p>Menu</p>
                            <h3>{{ $item->main_type }}</h3>
                        </div>

                        <div class="row gy-5">
                            @foreach ($categories as $item)
                                <div class="col-lg-4 menu-item">
                                    <a href="" class="glightbox"><img src="{{ asset('image/' . $item->img) }}"
                                            class="menu-img img-fluid rounded-circle" alt=""></a>
                                    <h4>{{ $item->sub_type }}</h4>
                                    <p class="ingredients">
                                        {{ $item->details }}
                                    </p>
                                    <p class="price">
                                        {{ $item->price }}Ks
                                        <a href="{{ route('update#page', $item->id) }}"
                                            class="btn btn-outline bg-secondary text-white"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                    </p>

                                </div>
                            @endforeach
                            <!-- Menu Item -->
                        </div>
                    </div><!-- End Starter Menu Content -->



                </div>

            </div>

        </section><!-- /Menu Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>TESTIMONIALS</h2>
                <p>What Are They <span class="description-title">Saying About Us</span></p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="row gy-4 justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="testimonial-content">
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora
                                                    entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam
                                                    eget nibh et. Maecen aliquam, risus at semper.</span>
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                            <h3>Saul Goodman</h3>
                                            <h4>Ceo &amp; Founder</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg') }}"
                                            class="img-fluid testimonial-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="row gy-4 justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="testimonial-content">
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                <span>Export tempor illum tamen malis malis eram quae irure esse labore
                                                    quem cillum quid cillum eram malis quorum velit fore eram velit sunt
                                                    aliqua noster fugiat irure amet legam anim culpa.</span>
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                            <h3>Sara Wilsson</h3>
                                            <h4>Designer</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <img src="{{ asset('assets/img/testimonials/testimonials-2.jpg') }}"
                                            class="img-fluid testimonial-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="row gy-4 justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="testimonial-content">
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                <span>Enim nisi quem export duis labore cillum quae magna enim sint
                                                    quorum nulla quem veniam duis minim tempor labore quem eram duis
                                                    noster aute amet eram fore quis sint minim.</span>
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                            <h3>Jena Karlis</h3>
                                            <h4>Store Owner</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <img src="{{ asset('assets/img/testimonials/testimonials-3.jpg') }}"
                                            class="img-fluid testimonial-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="row gy-4 justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="testimonial-content">
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos
                                                    export minim fugiat minim velit minim dolor enim duis veniam ipsum
                                                    anim magna sunt elit fore quem dolore labore illum veniam.</span>
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                            <h3>John Larson</h3>
                                            <h4>Entrepreneur</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                    class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <img src="{{ asset('assets/img/testimonials/testimonials-4.jpg') }}"
                                            class="img-fluid testimonial-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- orders Section -->
        <section id="orders" class="orders section mx-auto" style="width: 75%;">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <p>
                    <span class="description-title">Orders<br></span>
                </p>
            </div><!-- End Section Title -->
            <div class="form-control">
                <table class="table">
                    <thead class="fw-bold">
                        <tr class="align-middle">
                            <th class="text-center">ID</th>
                            <th class="text-center">Pizza Kind</th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Sauce</th>
                            <th class="text-center">SideBoard</th>
                            <th class="text-center">Toppings</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Image</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $o)
                            <tr class="align-middle">
                                <td>{{ $o->categories_id }}</td>
                                <td>{{ $o->sub_typename }}</td>
                                <td>{{ $o->size }}</td>
                                <td>{{ $o->sauce_type }}</td>
                                <td>{{ $o->side_board }}</td>
                                <td>{{ $o->topping }}</td>
                                <td>{{ $o->total_price }}</td>
                                <td><img src="{{ asset('image/' . $o->img) }}" alt="" width="100"
                                        height="100"></td>
                                <form action="{{ route('deliver#order', $o->id) }}" method="post">
                                    @csrf
                                    <td><a href=""><button type="button"
                                                class="btn btn-outline bg-warning text-white"
                                                {{ $o->status == 'Delivered' ? 'disabled' : '' }}>Pending</button></a>
                                    </td>
                                    <td><a href=""><button type="submit"
                                                class="btn btn-outline bg-success text-white"
                                                {{ $o->status == 'Delivered' ? 'disabled' : '' }}>Delivered</button></a>
                                    </td>
                                    <td><a href="{{ route('cancle#order', $o->id) }}"><button type="button"
                                                class="btn btn-outline bg-danger text-white"
                                                onclick="return confirm('Are you sure you want to cancel and delete this order?')"
                                                {{ $o->status == 'Delivered' ? 'disabled' : '' }}>Cancled</button></a>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </section><!-- /orders Section -->

        <!-- Chefs Section -->
        <section id="chefs" class="chefs section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>chefs</h2>
                <p><span>Our</span> <span class="description-title">Proffesional Chefs<br></span></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/chefs/chefs-1.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Master Chef</span>
                                <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut.
                                    Ipsum exercitationem iure minima enim corporis et voluptate.</p>
                            </div>
                        </div>
                    </div><!-- End Chef Team Member -->

                    <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/chefs/chefs-2.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Patissier</span>
                                <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima
                                    suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
                            </div>
                        </div>
                    </div><!-- End Chef Team Member -->

                    <div class="col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="{{ asset('assets/img/chefs/chefs-3.jpg') }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>Cook</span>
                                <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt.
                                    Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
                            </div>
                        </div>
                    </div><!-- End Chef Team Member -->

                </div>

            </div>

        </section><!-- /Chefs Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="mb-5">
                    <iframe style="width: 100%; height: 400px;" src="{{ asset('image/map.jpg') }}" frameborder="0"
                        allowfullscreen=""></iframe>
                </div><!-- End Google Maps -->

                <div class="row gy-4">

                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                            <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>No-2 Quarter, GantGaw Street, Ingapu, Ayeyarwaddy Division</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                            <i class="icon bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+959 333 444 555</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                            <i class="icon bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>info@example.com</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                            <i class="icon bi bi-clock flex-shrink-0"></i>
                            <div>
                                <h3>Opening Hours<br></h3>
                                <p><strong>Mon-Sat:</strong> 11AM - 23PM; <strong>Sunday:</strong> Closed</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                </div>


                <form id="contactForm" class="row gy-4 mt-4">
                    @csrf
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Your Name"
                            required="">
                    </div>

                    <div class="col-md-6 ">
                        <input type="email" class="form-control" name="email" placeholder="Your Email"
                            required="">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                        <!-- Change to type="button" so it doesn't refresh the page before the alert shows -->
                        <button type="button" onclick="sendContactmessage()"
                            class="btn btn-outline bg-primary text-white p-2">
                            Send Message
                        </button>
                    </div>
                </form><!-- End Contact Form -->
            </div>
        </section><!-- /Contact Section -->
    </main>
@endsection
