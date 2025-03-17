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
        
        <h1>How To Guides</h1>
        <p>Step-by-step guides for replacing common car parts</p>
        <a href="../index.php"><samp>Home page</samp></a>
    </header>

    <main>
        <section class="about">
            <h2>Fix-It Fast</h2>
            <p>Whether you’re a seasoned DIYer or a beginner looking to save on repair costs, "Fix-It Fast" is your ultimate resource for tackling common car part replacements with confidence. This guide provides clear, easy-to-follow instructions for replacing essential components like brake pads, air filters, windshield wipers, headlights, and batteries. With tips on necessary tools, safety precautions, and troubleshooting, it empowers you to handle repairs efficiently and effectively. Designed for various car models, it ensures you have the right knowledge for every job, helping you maintain your car without unnecessary trips to the mechanic.</p>
        </section>

        <section class="models">


            <!-- <h2>details</h2> -->
            <div class="model">
                <img src="images/Essential Tools for DIY Repairs.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Essential Tools for DIY Repairs</h3>
                    <p>Wrenches, screwdrivers, and pliers.</p>
                    <p>Jack and jack stands for lifting the car safely.</p>
                    <p>Torque wrench for proper bolt tightening.</p>
                    <p>Gloves and safety goggles for protection.</p>
                </div>
            </div>
            <br>

            <div class="model">
                <img src="images/Replacing Brake Pads.jpg" alt="Audi Q5" class="model-img">
                <div class="model-details">
                    <h3>Replacing Brake Pads</h3>
                    <p>Signs it’s time to replace: squeaking or grinding noise, reduced braking performance.</p>
                    <p><ul>Key steps:</ul>
                        <li>Loosen lug nuts and lift the car with a jack.</li>
                        <li>Remove the tire and unbolt the caliper.</li>
                        <li>Slide out old brake pads and replace with new ones.</li>
                        <li>Reassemble and test brakes.</li></p>
                </div>
            </div>
            <br>

            <div class="model">
                <img src="images/Changing a Car Battery.jpg" alt="Audi A6" class="model-img">
                <div class="model-details">
                    <h3>Changing a Car Battery</h3>
                    <p>Symptoms of a failing battery: difficulty starting, dim headlights, or dashboard warning lights.</p>
                    <p><ul>Key steps:</ul>
                        <li>Turn off the engine and locate the battery.</li>
                        <li>Disconnect the negative (-) and positive (+) terminals.</li>
                        <li>Remove the old battery and clean connectors.</li>
                        <li>Install the new battery, reconnect terminals, and secure it in place.</li></p>
                </div>
            </div>
            <br>

            <div class="model">
                <img src="images/Replacing Windshield Wipers.jpg" alt="Audi A6" class="model-img">
                <div class="model-details">
                    <h3>Replacing Windshield Wipers</h3>
                    <p>Indications: streaking or ineffective wiping.</p>
                    <p><ul>Key steps:</ul>
                        <li>Lift the wiper arm and release the old blade.</li>
                        <li>Align and snap in the new blade.</li>
                        <li>Test for proper fit and function.</li>
                        
                </div>
            </div>
            <br>

            <div class="model">
                <img src="images/Headlight or Tail Light Bulb Replacement.jpg" alt="Audi A6" class="model-img">
                <div class="model-details">
                    <h3>Headlight or Tail Light Bulb Replacement</h3>
                    <p>Warning signs: dimming or burnt-out bulbs.</p>
                    <p><ul>Key steps:</ul>
                        <li>Open the hood or access the rear light assembly.</li>
                        <li>Remove the bulb holder and old bulb.</li>
                        <li>Insert the new bulb, secure the holder, and test.</li>
                        
                </div>
            </div>


        </section>
    </main>

    <footer>
        <p>&copy; 2024 Audi. All rights reserved.</p>
    </footer>

</body>

</html>