<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MedEx | Laboratary Registration</title>

    <link href="../scss/vendor/demo.css" rel="stylesheet" />
    <link href="../css/supplier/formcss.css" rel="stylesheet" />
    <script src="../js/g28-style.js"></script>
    <!-- Font awesome kit -->
    <script src="https://kit.fontawesome.com/9b33f63a16.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #e4e8e5; width:100%;">
    <div style="padding:5%;">
        <div class="card g-col-2 g-row-2-start-3"
            style=" box-shadow: 0 3px 10px rgb(0 0 0 / 0.2); border-radius: 20px;">
            <div class="card-body" style="display:flex; flex-direction: row;">
                <div style="width: 25%; padding: 1%; background-color: #B1D4E0; border-radius: 20px;">
                    <img src="/res/lab-register.svg" alt="Registeration">
                </div>
                <div style="width: 75%; padding: 2%;">
                    <form action="/lab/register" method="post" enctype="multipart/form-data"
                        style="display: flex; flex-direction: row; width: 100%;">
                        <div style="width: 50%;">
                            <h4> Laboratary Registration</h4>
                            <input type="text" name="name" class="input-box" placeholder="Enter Laboratory Name"
                                required><br>
                            <input type="text" name="username" class="input-box" placeholder="Enter Userame"
                                required><br>
                            <input type="password" name="pswd" class="input-box" placeholder="Enter Password"
                                required><br>
                            <input type="password" name="re-pswd" class="input-box" placeholder="Re-enter Password"
                                required><br>
                            <input type="text" name="email" class="input-box" placeholder="Enter Email" required><br>
                            <input type="text" name="address" class="input-box" placeholder="Enter Address"
                                required><br>

                        </div>
                        <div style="width: 50%;">
                            <input type="text" name="mobile" class="input-box" placeholder="Enter Mobile Phone Number"
                                required><br>
                            <input type="text" name="labcertid" class="input-box"
                                placeholder="Enter Laboratory Certificate ID" required><br>
                            <input type="text" name="busiRegNum" class="input-box"
                                placeholder="Enter Business Registration Number" required><br>
                            Business Registration Certificate <small>(3Mb - jpg,jpeg,png,pdf) </small><br><input
                                type="file" name="BusRegiCert" id="BusRegiCert" required accept="image/*,.pdf"><br><br>
                            Laboratary Registration Certificate <small>(3Mb - jpg,jpeg,png,pdf) </small><br><input
                                type="file" name="LabRegiCert" id="LabRegiCert" required accept="image/*,.pdf"><br><br>
                            <input type="submit" value="Create Account" class="btn btn--primary">
                        </div>
                        <form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>