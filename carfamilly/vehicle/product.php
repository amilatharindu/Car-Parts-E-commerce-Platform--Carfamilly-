<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to guide </title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
        }

        /* Header Styles */
        header {
            background-color: #003366;
            color: #fff;
            text-align: center;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .logo-container {
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .header-logo {
            width: 80px;
            height: auto;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            animation: fadeInDown 1s ease;
        }

        .header p {
            font-size: 1.2rem;
            animation: fadeInUp 1.5s ease;
        }

        main {
            padding: 20px;
        }

        /* About Section */
        .about {
            max-width: 1200px;
            text-align: center;
            margin: 20px auto;
            background-color: #e8e8e8;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: slideInLeft 1s ease;
        }

        .about h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #003366;
        }

        .about p {
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Top Rated Models Section */
        .models {
            margin: 40px auto;
            max-width: 1200px;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease;
        }

        .models h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #003366;
        }

        .model {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            gap: 20px;
        }

        .model-img {
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .model-details {
            max-width: 600px;
            text-align: left;
        }

        .model-details h3 {
            font-size: 1.5rem;
            color: #003366;
        }

        .model-details p {
            margin: 10px 0;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            background-color: #003366;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 0.9rem;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }

            .about,
            .models {
                padding: 15px;
            }
        }
        samp{
         float: left;
         color: yellow;
font-size: 1.5rem;
text-transform: capitalize;
margin-top: -30px;

        }
    </style>
</head>

<body>
    <header class="header">
        
        <h1>Product Review</h1>
        <p>In-depth reviews of popular car parts and Accessories.</p>
        <a href="../index.php"><samp>Home page</samp></a>
    </header>

    <main>
        <section class="about">
            <h2>GearCheck</h2>
            <p>Make informed decisions about your car upgrades and repairs with "GearCheck", your trusted source for detailed reviews of the most popular car parts and accessories. From high-performance tires and durable brake pads to innovative tech gadgets like dash cams and infotainment systems, this guide dives into quality, compatibility, and value for money. Each review is backed by expert analysis and real-world testing, helping you choose products tailored to your driving style and vehicle needs. Whether you’re enhancing performance, improving safety, or adding convenience, "GearCheck" ensures you invest in the best for your car.</p>
        </section>

        <section class="models">


            <!-- <h2>details</h2> -->
            <div class="model">
                <img src="images/Top-Rated Brake Pads.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Top-Rated Brake Pads</h3>
                    <p>Features to Consider: Material type (ceramic, metallic, organic), durability, noise levels.</p>
                    <p>Jack and jack stands for lifting the car safely.</p>
                    <p>Bosch QuietCast: Known for low noise and consistent performance.</p>
                    <p>Akebono ProACT: Long-lasting and ideal for reducing brake dust.</p>
                </div>
            </div>
            <br>

            <div class="model">
                <img src="images/Best Car Batteries for Longevity.jpg" alt="Audi Q5" class="model-img">
                <div class="model-details">
                    <h3>Best Car Batteries for Longevity</h3>
                    <p>Factors to Review: Battery capacity, cold cranking amps (CCA), maintenance needs.</p>
                    <p><ul>Popular Models:</ul><br>
                        <li>Optima RedTop: High power output for extreme conditions.</li><br>
                        <li>DieHard Gold: Reliable and long-lasting.</li>
                        </p>
                </div>
            </div>
            <br>

            <div class="model">
                <img src="images/Top All-Season Tires.jpg" alt="Audi A6" class="model-img">
                <div class="model-details">
                    <h3>Top All-Season Tires</h3>
                    <p>What to Look For: Tread design, grip in wet and dry conditions, road noise.</p>
                    <p><ul>Notable Choices:</ul><br>

                        <li>Michelin Defender T+H: Exceptional durability and performance.</li><br>
                        <li>Goodyear Assurance WeatherReady: Great for wet and snowy conditions.</li>
                        
                </div>
            </div>
            <br>

            <div class="model">
                <img src="images/Best Headlight Bulbs for Visibility.jpg" alt="Audi A6" class="model-img">
                <div class="model-details">
                    <h3>Best Headlight Bulbs for Visibility</h3>
                    <p>Key Features: Brightness (measured in lumens), lifespan, color temperature.</p>
                    <p><ul>Popular Bulbs:</ul><br>

                        <li>Philips X-tremeVision: Outstanding brightness and range.</li><br>
                        <li>Sylvania SilverStar Ultra: High beam performance with balanced cost.</li>
                        
                </div>
            </div>
            <br>

            <div class="model">
                <img src="images/Top-Rated Dash Camera.jpg" alt="Audi A6" class="model-img">
                <div class="model-details">
                    <h3>Top-Rated Dash Camera</h3>
                    <p>What to Review: Video resolution, night vision, storage capacity, ease of installation.</p>
                    <p><ul>Leading Models:</ul><br>
                        
                        
                        <li>Viofo A129 Duo: Dual-channel recording and GPS.</li><br>
                        <li>FH Group Universal Covers: Affordable with decent comfort.</li>
                        
                </div>
            </div>


        </section>
    </main>

    <footer>
        <p>&copy; 2024 Audi. All rights reserved.</p>
    </footer>

</body>

</html>