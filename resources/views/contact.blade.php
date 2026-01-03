<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/contactMain.css', 'resources/css/contentcss/contact.css'])
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
            <h1>Contact Us</h1>
            <p>Planning on that perfect getaway? Allow us to help you with it and save you a lot of time and effort usually associated with planning a trip. Just fill the form below</p>
            <form action="#" method="post">
                <div class="nameContainer">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="yourName" placeholder="Your Name" required>
                </div>

                <div class="tripDetails">
                    <div class="locContainer">
                        <label for="location">Your Location</label>
                        <input type="text" id="location" name="yourLocation" placeholder="Your Location" required>
                    </div>

                    <div class="destiContainer">
                        <label for="destination">Your Destination</label>
                        <input type="text" id="destination" name="yourDestination" placeholder="Your Destination" required>
                    </div>

                    <div class="arrivalContainer">
                        <label for="dateArrive">Date of Arrival</label>
                        <input type="date" name="dateArrival" id="dateArrive" placeholder="dd/mm/yyyy" required>
                    </div>

                    <div class="returnContainer">
                        <label for="dateReturn">Date of Return</label>
                        <input type="date" name="dateReturn" id="dateReturn" placeholder="dd/mm/yyyy" required>
                    </div>
                </div>

                <div class="personCount">
                    <label for="count">Number of Persons</label>
                    <div class="members">
                        <input type="number" name="adult" id="count" placeholder="Adult" min="1" required>
                        <input type="number" name="children" id="count" placeholder="Children" min="0" required>
                    </div>
                </div>

                <label for="activities">Preffered Activities</label>
                <div class="choice-box" id="activities">
                    <label><input type="checkbox" name="activities" value="snorkeling"> Snorkeling</label>
                    <label><input type="checkbox" name="activities" value="diving"> Diving</label>
                    <label><input type="checkbox" name="activities" value="islandTour"> Island Tour</label>
                    <label><input type="checkbox" name="activities" value="hiking"> Hiking</label>
                    <label><input type="checkbox" name="activities" value="surfing"> Surfing</label>
                    <label><input type="checkbox" name="activities" value="kayaking"> Kayaking</label>
                    <label><input type="checkbox" name="activities" value="fishing"> Fishing</label>
                    <label><input type="checkbox" name="activities" value="camping"> Camping</label>
                    <label><input type="checkbox" name="activities" value="sailing"> Sailing</label>
                    <label><input type="checkbox" name="activities" value="zipline"> Zipline</label>
                </div>

                <div class="othersContainer">
                    <label for="others">Others</label>
                    <input type="text" name="others" id="others">
                </div>

                <div class="contacts">
                    <div class="telephoneContainer">
                        <label for="contact">Telephone</label>
                        <input type="tel" name="telephone" id="contact" placeholder="Telephone" required>
                    </div>

                    <div class="emailContainer">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="contact" placeholder="Email Address" required>
                    </div>
                </div>

                <div class="preferedContact">
                    <label for="preffered">Preffered Contact</label>
                    <select name="preferred" id="preferred" required>
                        <option value="" disabled selected hidden>Preffered Contact</option>
                        <option value="cNumber">Contact Number</option>
                        <option value="email">Email</option>
                    </select>
                </div>

                <div class="additional">
                    <label for="notes">Notes / Messages</label>
                    <input type="text" name="notes" id="notes" placeholder="Additional notes, instructions, or requests(optional)">
                </div>

                <input type="submit" value="SUBMIT">
            </form>
        </section>

        <div class="ads">
            <ul>
                    <li><a href="https://www.facebook.com/zoobicsafariofficial/"><img src="{{ Vite::asset('resources/images/ads.jpg') }}" alt=""></a></li>
                    <li><a href="https://staycations.ph/list/moonbay-marina-waterpark/"><img src="{{ Vite::asset('resources/images/ads2.jpg') }}" alt=""></a></li>
                    <li><a href="https://texasjoes.com/"><img src="{{ Vite::asset('resources/images/ads3.jpg') }}" alt=""></a></li>
                </ul>
        </div>

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
