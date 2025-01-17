<html lang="en">
<head>
    <title>DeliveryPartner-Register - MedEx</title>
    <link rel="stylesheet" href="/css/delivery/deliregisterpage.css">
</head>
<body>
<div class="container">

    <img class="logo" src="/res/logo/logo.svg">


    <body>
    <h1>  Delivery Partner Registration</h1>
    <form action="/delivery/register" method="post">
        <div class="middle">
            <!--           <div class="user__details">-->
            <div class="details personal">
                <span class="title">Personal Details</span>
                <div class="field">
                    <div class="input_field">
                        <label>User ID</label>
                        <input type="text" placeholder="D001" name="id" id="id" required/>
                    </div>
                    <div class="input_field">
                        <label>Username</label>
                        <input type="text" placeholder="johnWC98" name="username" id="username" required>
                    </div>
                    <div class="input_field">
                        <label>Full Name</label>
                        <input type="text" placeholder="E.g: John Doily" name="name" id="name" pattern="[a-z A-Z]{0,}" title="only use characters" required>
                    </div>


                    <div class="input_field">
                        <label>Email</label>
                        <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="johnsmith@hotmail.com" required>

                    </div>
                    <div class="input_field">
                        <label>Contact Number</label>
                        <input type="tel" pattern="[][0-9]{}" placeholder="E.g: 071-2345678" id="contactnumber" name="contactnumber" required>
                    </div>
                    <div class="input_field">
                        <label>Password</label>
                        <input type="password" name="password" id="password" pattern=".{8,}" title="password must contain at least 8 characters" placeholder="********" required>
                    </div>
                    <div class="input_field">
                        <label>Confirm Password</label>

                        <input type="password" name="retypepassword" id="retypepassword" pattern=".{8,}" title="password must contain at least 8 characters" placeholder="********" required>
                    </div>
                    <div class="input_field">
                        <label>Address</label>

                        <input type="text" name="address" id="address" placeholder="No.12,colombo road, nugegoda" required>
                    </div>
                    <div class="input_field">
                        <label>Deliverable Cities</label>
                        <input type="text" id="deliveryLocations" name="deliveryLocations" placeholder="colombo,kandy,pilimathalawa,mawanalle" required>
                    </div>
                    <div class="input_field">
                        <label>Driving License ID</label>
                        <input type="text" name="licenseId" id="licenseId" placeholder="*************" required>
                    </div>
                    <div class="input_field">
                        <label>Driving License Name</label>
                        <input type="text" name="drivingLicenseName" id="drivingLicenseName" placeholder="eg. J.K. Doily" required>
                    </div>
                    <div class="details vehicle">
                        <span class="title">Vehicle Details</span>
                        <div class="field">

                            <div class="input_field">
                                <label>Vehicle Type</label>
                                <input type="text" id="vehicleType" name="vehicleType" placeholder="Demo Batta" required>
                            </div>

                            <div class="input_field">
                                <label>Vehicle Register Number</label>
                                <input type="text" pattern="[a-zA-Z]{2,3}-[0-9a-zA-Z]{2,3}-[0-9]{4}" id="vehicleNo" name="vehicleNo" placeholder="eg: CP-BCD-2345" required>
                            </div>
                            <div class="input_field">
                                <label>Max Load</label>

                                <input type="text" name="maxLoad" id="maxLoad" placeholder="40Kg" required>
                            </div>
                            <div class="input_field">
                                <label>Refrigerators</label>

                                <input type="checkbox" id="refrigeration" name="refrigeration" required>
                            </div>
<!--                            <div class="input_field">-->
<!--                                <label>Upload Vehicle License</label>-->
<!--                                <input type="file" id="uploadvehiclelicense" name="uploadvehiclelicense" required>-->
<!--                            </div>-->
<!--                            <div class="input_field">-->
<!--                                <label>Upload Driving License</label>-->
<!--                                <input type="file" id="uploaddrivinglicense" name="uploaddrivinglicense" required>-->
<!--                            </div>-->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-reg">

            <button type="submit" class="btn" name="reg-btn" id="reg-btn">Register</button>
            <a href="/delivery/login" >already registered?</a>
        </div>


</div>
</div>
</form>


</div>

</body>
</html>