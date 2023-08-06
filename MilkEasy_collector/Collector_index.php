<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/ff3c91d27a.js" crossorigin="anonymous"></script>
    <!-- for contact us icons -->
    <title>Home page</title>

</head>

<body class="bg-black"> 
    <!-- // navebar -->
    <?php include 'collector_navbar.php'?> 
    <div class="">

        <!-- // slider -->
        <div id="Home" class="w-full bg-fixed bg-black">
            <img src="images/cow1.jpg" alt="image" class="">
        </div>

        <!-- // about us  -->
        <div id="Aboutus" class="bg-gray-300 sm:mt-2 w-full">

            <div class="flex flex-col sm:flex-row mb-3">

                <div class="min-w-fit bg-gray-400 mt-1 sm:mt-0">
                    <h1 class="text-center text-4xl p-6 sm:py-[20%]">About Us</h1>
                </div>
                <div class="mx-4 pt-3 py-9">
                    <p>Our dairy buy milk from direct farmer in reasonable price. And our collector 
                        collect milk from farmer from their farm/home. We decide milk price of fat present
                        in the milk provided by farmer in front of them by testing milk fat in machine.
                        We do all transactins in transparant manner. Farmer and collector can view their 
                        provided milk and collected milk respectively and also can view payment status also.
                        If you want to become a member of out MilkEasy famaly please contact us on given contact
                        details.
                    </p>
                </div>
            </div>
        </div>

        <!-- // feedback form  -->
        <form action="coll_feedback.php" method="post">
            <div class=" flex flex-col bg-gray-300">

                <div class="w-[100%] bg-gray-300 rounded-lg">
                    <h1 class="text-center text-4xl p-4">Feedback</h1>
                </div>

                <input type="text" placeholder="First name" name="fname" class="outline outline-1 m-3 pl-2" required>
                <input type="text" placeholder="Last name" name="lname" class="outline outline-1 m-3 pl-2" required>
                <textarea placeholder="Message" cols="3" name="comment" rows="3" class="outline outline-1 m-3 pl-2"
                    required></textarea>
                <input type="submit" name="submit" value="submit"
                    class="outline outline-1 mb-3 mx-[40%] rounded-full bg-green-300 hover:bg-green-400 active:bg-green-500 md:h-7">

            </div>
        </form>

        <!-- //  contact us section  -->

        <div id="contactus" class="mt-3 pl-5 bg-gray-300">
            <div class="text-center text-3xl mb-4 mb-3">
                <h1 class="">Contact Us</h1>
            </div>
            <div class="">

                <div class="flex sm:flex-row flex-col">
                    <div class="basis-1/3 pb-4">
                        <div class="flex">
                            <h3 class=" pr-4"><i class="fa-solid fa-location-dot con-font"></i></h3>
                            <h3 class="text-xl">Address:</h3>
                        </div>
                        <p>Beside Imcc college, kothrud,<br> Pune -401037</p>
                    </div>
                    <div class="basis-1/3 pb-4">
                        <div class="flex">
                            <h3 class="pr-4"><i class="fa-solid fa-phone con-font"></i></h3>
                            <h3 class="text-xl">Phone:</h3>
                        </div>
                        <p>1234567890, 9876543210</p>
                    </div>
                    <div class="basis-1/3 pb-4">
                        <div class="flex">
                            <h3 class="pr-4"><i class="fa-solid fa-envelope con-font"></i></h3>
                            <h3 class="text-xl">Email:</h3>
                        </div>
                        <p>milkeasy1234@gmail.com</p>
                    </div>
                </div>
                <div class="con-info flex flex-row py-2 w-[100%] sm:w-1/3 sm:ml-[40%]">

                    <div class="basis-1/6"><a href="https://www.facebook.com/"><i
                                class="fa-brands fa-facebook social-media-icon"></i></a></div>
                    <div class="basis-1/6"><a href="https://www.linkedin.com/"><i
                                class="fa-brands fa-linkedin social-media-icon"></i></i></a></div>
                    <div class="basis-1/6"><a href="https://www.instagram.com/"><i
                                class="fa-brands fa-instagram social-media-icon"></i></a></div>
                    <div class="basis-1/6"><a href="https://www.twitter.com/"><i
                                class="fa-brands fa-twitter social-media-icon"></i></a></div>

                </div>
            </div>
        </div>

        <!-- // footer   -->

        <div class=" black flex flex-row bg-black ">
            <h3 class="text-center basis-full text-white">Copyright @2023 </h3>
        </div>

    </div>

</body>

</html>