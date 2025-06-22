<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/customer.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="customer.js"></script>
    
</head>
<body>


    <?php include'header.php'?>
    
<form action="customer.php" onsubmit="requirementSubmit()">
    <div class="customer">
        <div class="support">Customer Support
        <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit aut illum fugiat non volu</P>

        </div>
        <div class="image"> <img src="/images/Support.png" alt="customer support image"></div>
    </div>

    <div>
        <div class="how">How can we Help?</div>

        <div class="background">
            

            <div class="inform">

            <form action="">
                <fieldset>
                    <legend >submit your inquiry</legend>
                    <div class="items">
                        <label for="name" class="name">Name</label><br>
                        <input type="text" name="name" id="Name" required>
                    </div>
                    <div class="items" >
                        <label for="Email" class="name">E-Mail</label><br>
                        <input type="Email" name="Emial" id="Email" required>
                    </div>
                    <div class="items">
                        <label for="number" class="name">Contact No</label><br>
                        <input type="tel"  id="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required placeholder="XXX-XXX-XXXX" />
                    </div>
                    <div class="items">
                        <label for="number" class="name">Request/inquires type</label>
                        <select name="select" id="select"  >
                            <option value="one">Existing Wash Contract</option>
                            <option value="two">Ongoing service issues</option>
                            <option value="three">Proposal Request</option>
                            <option value="four">Delivery issues</option>
                        </select>
                    </div>
                    <div class="items" >
                        <label for="number"class="name" >Message</label><br>
                        <textarea name="text" id="text" cols="50" rows="10"></textarea>
                    </div>
                    <div class="buttons">
                        <button >submit</button>
                        <button>Reset</button>
                    </div>


                </fieldset>
            </form>

            </div>
            
        </div>
    </div>

    


    <?php include'footer.php'?>
    
</body>
</html>