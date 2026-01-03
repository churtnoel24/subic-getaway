<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotels & Restaurant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/main.css', 'resources/css/contentcss/hotels.css'])
</head>
<body>
    <header>
        <div class="upper">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo">
            <!-- Ribbon Navigation -->
            <div class="ribbon">
                <nav>
                    <ul>
                        <li><a href="about">About Us</a></li>
                        <li><a href="hotel"> Hotels & Restaurants</a></li>
                        <li><a href="attractions">Attractions</a></li>
                        <li><a href="news">News & Events</a></li>
                        <li><a href="contact">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Arrow keys for the caroussel on the header -->
        <input type="radio" name="slides" id="s1" checked hidden>
        <input type="radio" name="slides" id="s2" hidden>
        <input type="radio" name="slides" id="s3" hidden>

        <div class="carousel">
            <!-- Carousel slides -->
            <div id="slide1">
                <img src="{{ Vite::asset('resources/images/SubicRes.jpg') }}" alt="">
            </div>

            <div id="slide2">
                <img src="{{ Vite::asset('resources/images/SubicHotels.jpg') }}" alt="">
            </div>

            <div id="slide3">
                <img src="{{ Vite::asset('resources/images/Resort.jpg') }}" alt="">
            </div>
        </div>

        <!-- Controls/ arrows -->
        <div class="nav-controls nav1">
            <label for="s3" class="arrow prev" aria-label="Previous slide"><</label>
            <label for="s2" class="arrow next" aria-label="Next slide">></label>
        </div>
        <div class="nav-controls nav2">
            <label for="s1" class="arrow prev" aria-label="Previous slide"><</label>
            <label for="s3" class="arrow next" aria-label="Next slide">></label>
        </div>
        <div class="nav-controls nav3">
            <label for="s2" class="arrow prev" aria-label="Previous slide"><</label>
            <label for="s1" class="arrow next" aria-label="Next slide">></label>
        </div>
    </header>


    <main>
        <!-- CONTENT -->
        <section class="content">
            <h1>Hotels and Restaurants in Subic</h1>
            @foreach($hotels as $hotel)
            <!-- Hotel #1-->
            <div class="place">
                <div class="left">
                    <img src="{{ $hotel->image_url }}" alt="{{ $hotel->hotelname }}" class="h-40">
                    <button><a href="{{ route('hotel.show', $hotel) }}">Read More</a></button>
                </div>
                <div class="right">
                    <h2>{{ $hotel->hotelname }}</h2>
                    <p>{{ $hotel->description }}</p>
                </div>
            </div>
            @endforeach

            <div>{{ $hotels->links() }}</div>
        </section>

        <section class="bookingform">
            <!-- ADD A BOOKING FORM HERE -->
             <form class="booking" method="POST" action="#">
                <h1>REQUEST BOOKING</h1>
                 <div class="whenWhere">
                    <input type="text" name="name" id="name" placeholder="Your Name" required>
                    <input type="text" name="destination" id="destination" placeholder="Your Destination" required>
                    <input type="date" name="dayArrival" id="dayArrival" placeholder="Date of Arrival" required>
                    <input type="date" name="dayDeparture" id="dayDeparture" placeholder="Date of Departure" required>
                </div>
                <h2>No. of Persons</h2>
                <div class="countNcontact">
                    <input type="number" name="adults" id="quantity" placeholder="Adult" min="1" required>
                    <input type="number" name="Children" id="quantity" placeholder="Children" min="0">
                    <input type="tel" name="contact" id="contact" placeholder="Contact Number" required>
                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                    <select name="preferred" id="preferred" required>
                        <option value="" disabled selected hidden>Preffered Contact</option>
                        <option value="cNumber">Contact Number</option>
                        <option value="email">Email</option>
                    </select>
                    <input type="submit" value="Submit">
                </div>
             </form>

             <div class="ads">
                <ul>
                    <li><a href="https://www.facebook.com/zoobicsafariofficial/"><img src="{{ Vite::asset('resources/images/ads.jpg') }}" alt=""></a></li>
                    <li><a href="https://staycations.ph/list/moonbay-marina-waterpark/"><img src="{{ Vite::asset('resources/images/ads2.jpg') }}" alt=""></a></li>
                    <li><a href="https://texasjoes.com/"><img src="{{ Vite::asset('resources/images/ads3.jpg') }}" alt=""></a></li>
                </ul>
            </div>
        </section>


    </main>

    <footer>
        <!-- FOOOTER NAV -->
        <div class="footer-ribbon">
            <nav>
                <ul>
                    <li><a href="about">About Us</a></li>
                        <li><a href="hotel"> Hotels & Restaurants</a></li>
                        <li><a href="attractions">Attractions</a></li>
                        <li><a href="news">News & Events</a></li>
                        <li><a href="contact">Contact Us</a></li>
                </ul>
            </nav>
        </div>

        <!-- OTHER LINKS -->
        <div class="detail">
            <p>Copyright 2023 COMTEQ Computer & Business College</p>
            <p>customer_service@subicgetaway.com</p>
            <p>(+63) 911 234 5123 / 252-3335</p>
            <div class="follow">
                <p>FOLLOW US</p>
                <a href=""><img src="{{ Vite::asset('resources/images/facebook.png') }}" alt=""></a>
                <a href=""><img src="{{ Vite::asset('resources/images/instagram.png') }}" alt=""></a>
                <a href=""><img src="{{ Vite::asset('resources/images/tik-tok.png') }}" alt=""></a>
                <a href=""><img src="{{ Vite::asset('resources/images/youtube.png') }}" alt=""></a>
            </div>
        </div>
    </footer>
</body>
</html>
