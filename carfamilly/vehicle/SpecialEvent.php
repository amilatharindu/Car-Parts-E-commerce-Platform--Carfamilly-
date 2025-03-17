<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Events</title>
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
        
        <h1>Special Events</h1>
        <p>Highlights of upcoming car shows.</p>
        <a href="../index.php"><samp>Home page</samp></a>
    </header>

    <main>
        <section class="about">
            <h2>Spotlight on Tomorrow's Rides</h2>
            <p>Upcoming car shows are a celebration of innovation, design, and the future of mobility. These events showcase the latest automotive trends, unveil groundbreaking concept cars, and bring enthusiasts face-to-face with cutting-edge technologies. From electric and autonomous vehicles to luxurious supercars, car shows provide a glimpse into the industry's future while offering unique experiences, including live demos, expert panels, and networking opportunities for car lovers and professionals alike.</p>
        </section>

        <section class="models">


            <!-- <h2>details</h2> -->
            <div class="model">
                <img src="images/Unveiling of Concept Cars.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Unveiling of Concept Cars</h3>
                    <p>  Preview futuristic designs and technologies that push the boundaries of innovation.</p>
                    <p>Automakers often debut concept vehicles to gauge public interest and showcase advancements, such as self-driving capabilities and sustainable materials.</p>
                   
                </div>
            </div>
            <br>



            <div class="model">
                <img src="images/Spotlight on Electric and Hybrid Vehicles.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Spotlight on Electric and Hybrid Vehicles</h3>
                    <p> The rise of eco-friendly cars takes center stage, highlighting advancements in EV range, charging infrastructure, and new models.</p>
                    <p> Expect reveals from Tesla, Rivian, and traditional brands like Toyota and Ford showcasing their electric fleets.</p>
                   
                </div>
            </div>
            <br>



            <div class="model">
                <img src="images/Showcasing Autonomous Driving Innovations.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Showcasing Autonomous Driving Innovations</h3>
                    <p> Explore the latest developments in self-driving technology, including demonstrations of AI-powered systems and safety features.</p>
                    <p>Companies like Waymo, GM, and Mercedes-Benz may present advancements in autonomous driving.</p>
                   
                </div>
            </div>
            <br>



           <div class="model">
                <img src="images/Luxury and Performance Cars.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Luxury and Performance Cars</h3>
                    <p> Iconic brands like Ferrari, Lamborghini, and Bugatti reveal their latest creations, blending cutting-edge technology with high performance.</p>
                    <p>Volvo’s AI-driven accident prevention system.</p>
                   
                </div>
            </div>
            <br>


            <div class="model">
                <img src="images/Interactive Experiences and Test Drives.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Interactive Experiences and Test Drives</h3>
                    <p> Explore the latest developments in self-driving technology, including demonstrations of AI-powered systems and safety features.</p>
                    <p> Companies like Waymo, GM, and Mercedes-Benz may present advancements in autonomous driving.</p>
                   
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