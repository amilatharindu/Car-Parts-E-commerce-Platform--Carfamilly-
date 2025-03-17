
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car maintains Tips </title>
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
        
        <h1>Car maintains Tips</h1>
        <p>Maintenance checklists for car Models</p>
        <a href="../index.php"><samp>Home page</samp></a>
    </header>

    <main>
        <section class="about">
            <h2>AutoCheck Guide</h2>
            <p>Whether you’re a seasoned DIYer or a beginner looking to save on repair costs, "Fix-It Fast" is your ultimate resource for tackling common car part replacements with confidence. This guide provides clear, easy-to-follow instructions for replacing essential components like brake pads, air filters, windshield wipers, headlights, and batteries. With tips on necessary tools, safety precautions, and troubleshooting, it empowers you to handle repairs efficiently and effectively. Designed for various car models, it ensures you have the right knowledge for every job, helping you maintain your car without unnecessary trips to the mechanic.</p>
        </section>

        <section class="models">


            <!-- <h2>details</h2> -->
            <div class="model">
                <img src="images/Importance of Maintenance Checklists.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Importance of Maintenance Checklists</h3>
                    <p>Ensures vehicle safety and reliability.</p>
                    <p>Prolongs the lifespan of the car.</p>
                    <p>Prevents costly repairs by catching issues early.</p>
                    <p>Enhances fuel efficiency and performance.</p>
                </div>
            </div>
            <br>

            <div class="model">
                <img src="images/Basic Maintenance Tasks.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Basic Maintenance Tasks</h3>
                    <p>Oil Change: Every 3,000–7,000 miles depending on the car model.</p>
                    <p>Tire Rotation: Every 5,000–8,000 miles.</p>
                    <p>Brake Inspection: Every 10,000–20,000 miles or if there’s a squealing sound.</p>
                    <p>Battery Check: Monthly visual checks for corrosion and voltage testing annually.</p>
                </div>
            </div>
            <br>



            <div class="model">
                <img src="images/Specific Model Checklist.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Specific Model Checklist.</h3>
                    <p>SUVs: Focus on brake wear due to heavy usage and tire alignment.</p>
                    <p>Electric Vehicles (EVs): Battery health diagnostics and software updates.</p>
                    <p>Luxury Cars: Regular inspections for advanced systems (e.g., adaptive cruise control).</p>
                    
                </div>
            </div>
            <br>



            <div class="model">
                <img src="images/Seasonal Maintenance Tips.jpg" alt="Audi A4" class="model-img">
                <div class="model-details">
                    <h3>Seasonal Maintenance Tips</h3>
                    <p>Winter: Inspect antifreeze levels, wipers, and tires for snow readiness.</p>
                    <p>Summer: Check air conditioning, coolant levels, and tire pressure for heat expansion.</p>
                    <p>Spring/Fall: Comprehensive inspections for weather transition readiness.</p>
                    
                </div>
            </div>
            <br>



            <div class="model">
                <img src="images/DIY vs. Professional Maintenance.jpg" alt="Audi A6" class="model-img">
                <div class="model-details">
                    <h3>DIY vs. Professional Maintenance</h3>
                    <p>DIY Tasks: Simple replacements like windshield wipers, air filters, or oil changes.</p><br>
                    <p>Professional Tasks: Engine tuning, suspension checks, and diagnostics.</p>

                        
                </div>
            </div>


        </section>
    </main>

    <footer>
        <p>&copy; 2024 Audi. All rights reserved.</p>
    </footer>

</body>

</html>