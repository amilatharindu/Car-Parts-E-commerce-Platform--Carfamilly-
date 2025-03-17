<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safety Tips</title>
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
        
        <h1>Safety Tips</h1>
        <p>Importance of using quality parts for vehicle</p>
        <a href="../index.php"><samp>Home page</samp></a>
    </header>

    <main>
        <section class="about">
            <h2>Quality Parts, Safer Rides</h2>
            <p>Using quality parts for your vehicle is essential for ensuring safety, reliability, and longevity. High-quality components not only enhance performance but also reduce the risk of breakdowns and costly repairs. They are designed to meet manufacturer standards, providing better compatibility and efficiency. Investing in genuine parts helps maintain the vehicle's value and ensures a smoother, safer driving experience.</p>
        </section>

        <section class="models">


            <!-- <h2>details</h2> -->
            <div class="model">
                <img src="images/Enhanced Safety.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Enhanced Safety</h3>
                    <p> Quality parts are designed to meet stringent safety standards, ensuring the vehicle operates reliably under various conditions.</p>
                    <p>Critical components such as brakes, airbags, and suspension systems made from high-quality materials reduce the risk of failure, protecting occupants and enhancing overall vehicle safety.</p>
                   
                </div>
            </div>
            <br>



            <div class="model">
                <img src="images/Improved Performance.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Improved Performance</h3>
                    <p>High-quality parts maintain or enhance vehicle performance, ensuring optimal functionality.</p>
                    <p>Engine components, transmission parts, and exhaust systems crafted with precision contribute to better fuel efficiency, smoother operation, and increased power, providing a superior driving experience.</p>
                   
                </div>
            </div>
            <br>



            <div class="model">
                <img src="images/Cost-Effectiveness Over Time.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Cost-Effectiveness Over Time</h3>
                    <p> While quality parts may have a higher upfront cost, they offer long-term savings by reducing maintenance and repair expenses.</p>
                    <p>Fewer breakdowns and the extended life of components mean less frequent visits to the mechanic, saving money and time in the long run.</p>
                   
                </div>
            </div>
            <br>



           <div class="model">
                <img src="images/Powered Safety Features.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>AI-Powered Safety Features</h3>
                    <p> Driver-assist technologies like automatic emergency braking, lane-keeping assist, and predictive collision warnings.</p>
                    <p>Volvo’s AI-driven accident prevention system.</p>
                   
                </div>
            </div>
            <br>


            <div class="model">
                <img src="images/Warranty and Manufacturer Support.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Warranty and Manufacturer Support</h3>
                    <p> Genuine parts often come with warranties and support from manufacturers, providing additional security.</p>
                    <p> FThis ensures that any defects or issues are covered, offering peace of mind and guaranteeing that replacements or repairs meet the original standards.</p>
                   
                </div>
            </div>
            <br>


        </section>
    </main>

    <footer>
        <p>&copy; 2024 Audi. All rights reserved.</p>
    </footer>

</body>

</html>