<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industry news and trends </title>
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
        
        <h1>Industry News and Trends</h1>
        <p>Updates on the latest car Technology.</p>
        <a href="../index.php"><samp>Home page</samp></a>
    </header>

    <main>
        <section class="about">
            <h2>AutoTech Pulse: Innovations Driving the Future</h2>
            <p>Stay informed with the latest breakthroughs in car technology! Explore cutting-edge advancements such as self-driving capabilities, electric vehicles with extended range, smart infotainment systems, and sustainable innovations shaping the future of mobility. From AI-powered safety features to breakthroughs in battery efficiency and charging infrastructure, we delve into how these technologies are transforming the way we drive and interact with our vehicles</p>
        </section>

        <section class="models">


            <!-- <h2>details</h2> -->
            <div class="model">
                <img src="images/Electric Vehicle (EV) Advancements.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Electric Vehicle (EV) Advancements</h3>
                    <p> New battery technologies like solid-state batteries, extended range EVs, faster charging solutions, and growing charging infrastructure.</p>
                    <p>Tesla's advancements in battery efficiency or breakthroughs in wireless EV charging systems.</p>
                   
                </div>
            </div>
            <br>



            <div class="model">
                <img src="images/Autonomous Driving Technologies.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Autonomous Driving Technologies</h3>
                    <p>Levels of autonomy (Level 0 to Level 5), LiDAR and AI systems for self-driving, and regulatory developments.</p>
                    <p>Waymo’s fully autonomous taxis or Tesla's Full Self-Driving (FSD) updates.</p>
                   
                </div>
            </div>
            <br>



            <div class="model">
                <img src="images/Sustainable Materials in Manufacturing.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Sustainable Materials in Manufacturing</h3>
                    <p>Use of recycled materials, biodegradable components, and low-carbon production techniques.</p>
                    <p>BMW’s shift towards using recycled aluminum and ocean plastics.</p>
                   
                </div>
            </div>
            <br>



           <div class="model">
                <img src="images/AI-Powered Safety Features.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>AI-Powered Safety Features</h3>
                    <p> Driver-assist technologies like automatic emergency braking, lane-keeping assist, and predictive collision warnings.</p>
                    <p>Volvo’s AI-driven accident prevention system.</p>
                   
                </div>
            </div>
            <br>


            <div class="model">
                <img src="images/Connected Cars and IoT.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Connected Cars and IoT</h3>
                    <p> Vehicle-to-vehicle (V2V) and vehicle-to-everything (V2X) communication, over-the-air updates, and smart navigation systems.</p>
                    <p> Ford's C-V2X technology enabling cars to communicate with traffic lights.</p>
                   
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