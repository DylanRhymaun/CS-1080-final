<?php include 'database-connect.php';?>
<?php 
#VARIABLES
        $dataIsGood = false;
    $email = '';
    $firstName = '';
    $lastName = '';
    $website = 0;
    $art = 0;
    $writing = 0;
    $urgency = '';
    $urgencies = array('notUrgent', 'normal', 'veryUrgent');
    $description = '';
    $pets = '';
    $dog = '';
    $cat = '';
    $fish = '';
    $message = '';


#REMOVE SPECIAL CHARACTERS FROM INPUT
    function getData($field) {
        if (!isset($_POST[$field])) {
            $data = "";
        } else {
            $data = trim($_POST[$field]);
            $data = htmlspecialchars($data);
        }
        return $data;
    }
#VERIFY ALPHANUMERIC
    function verifyAlphaNum($testString) {
        return (preg_match("/^([[:alnum:]]|-|\/|\.| |\'|&|;|#)+$/", $testString));
    }
#SANITIZE
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;

    $email = getData('email');
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $firstName = getData('firstName');
    $lastName = getData('lastName');
        #$website = (int) getData('chkWebsite');
        #$art = (int) getData('chkArt');
        #$writing = (int) getData('chkWriting');
    $website = isset($_POST['chkWebsite']) ? 1 : 0;
    $art = isset($_POST['chkArt']) ? 1 : 0;
    $writing = isset($_POST['chkWriting']) ? 1 : 0;
    $urgency = getData('urgency');
    $description = getData('reasonForContact'); 
    $pets = getData('pets');
# VALIDATE
    print PHP_EOL . '<!-- Starting Validation -->' . PHP_EOL;
        $dataIsGood = true;
        
        if ($email == '') {
            $message .= '<p class="mistake">Please enter your email</p>';
            $dataIsGood = false;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message .= '<p class="mistake">Please enter a valid email</p>';
            $dataIsGood = false;
        }
        $totalChecked = 0;
        if($website !=1) $website = 0;
        $totalChecked += $website;

        if($art !=1) $art = 0;
        $totalChecked += $art;

        if($writing !=1) $writing = 0;
        $totalChecked += $writing;

        if($totalChecked == 0){
            $message .= '<p class="mistake">Please indicate the type of project</p>';
            $dataIsGood = false;
        }
        if ($urgency == '') {
            $urgency .= '<p class="mistake">Please indicate the urgency of the job</p>';
            $dataIsGood = false;
        } elseif (!in_array($urgency, $urgencies)) {
            $urgency .= '<p class="mistake">Invalid response</p>';
            $dataIsGood = false;
        }
        if ($description == '') {
            $message .= '<p class="mistake">Please tell us more about the job</p>';
            $dataIsGood = false;
        } elseif (!verifyAlphaNum($description)) {
            $message .= '<p class="mistake">Invalid characters, please correct</p>';
            $dataIsGood = false;
        }
        if ($pets !="dog" AND $pets !="cat" AND $pets !="fish"){
            $message .='<p class="mistake">Please choose the animal you would most like to keep as a pet</p>';
            $dataIsGood = false;
        }
# SAVING
        print '<!-- Starting Saving -->';
        if($dataIsGood){
            $sql = 'INSERT INTO tblContacts
            (fldEmail, fldFirstName, fldLastName, fldWebsite, fldArt, fldWriting, fldUrgency, fldDescription, fldPets)';

            $sql .= ' VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

            $data = array($email, $firstName, $lastName,  $website, $art, $writing, $urgency, $description, $pets);
        
        try {
            $statement = $pdo->prepare($sql);
            if($statement->execute($data)){
                $message .= '<p>Your information was successfully saved</p>';
# SENDEMAIL
                $to = $email;
                $from = 'Dylan Rhymaun <dylan.rhymaun@uvm.edu>';
                $subject = 'Thank you for your inquiry!';
                $mailMessage = '<p style ="font: 14pt arial;">Thank you for taking ';
                $mailMessage .= 'the time to reach out! I will be in touch soon.</p><br><p>Best,<br>';
                $mailMessage .='<span style="padding-left: 1em;">';
                $mailMessage .='Dylan Rhymaun</span></p>';
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
                $headers .= "From: " .$from . "\r\n"; 
                $mailSent = mail($to, $subject, $mailMessage, $headers);



            } else {
                $message .= '<p>Your information was NOT successfully saved</p>';
            }
        } catch(PDOException $e){
            $message .= '<p>Could not insert the record: ' . $e->getMessage() . '</p>';
            }
    }
}
?>






<?php include 'includes/top.php'; ?>
<main>
<video id="video-background" autoplay muted loop>
            <source src="videos/seagullFinal.mp4" type="video/mp4">
</video>
<section class="sidebar">
<?php include 'includes/header.php';
        include 'includes/nav.php'; ?>
<h2>Get in touch with me:</h2>
        <form action="#" id="contactForm" method="post">
            <fieldset>
                <legend>What is your email?</legend>
                <p>
                    <label class="required" for="email">Email:</label>
                    <input id="email" maxlength="40" name="email" onfocus="this.select()" tabindex="300" type="email" placeholder="name@domain.com" value="<?php echo htmlspecialchars($email); ?>">
                </p>
            </fieldset>

            <fieldset>
                <legend>What is your name?</legend>
                <p>
                    <label class="required" for="firstName">First Name:</label>
                    <input id="firstName" maxlength="40" name="firstName" onfocus="this.select()" tabindex="300" type="text" placeholder="First Name" value="<?php echo htmlspecialchars($firstName); ?>">
                </p>
                <p>
                    <label class="required" for="lastName">Last Name:</label>
                    <input id="lastName" maxlength="40" name="lastName" onfocus="this.select()" tabindex="300" type="text" placeholder="Last Name" value="<?php echo htmlspecialchars($lastName); ?>">
                </p>
            </fieldset>

            <fieldset class="checkbox">
                <legend>What type of project do you need help with?</legend>
                <p>
                    <input id="chkWebsite" name="chkWebsite" tabindex="510"
                    <?php if ($website) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkWebsite">Website</label>
                </p>
                <p>
                    <input id="chkArt" name="chkArt" tabindex="510"
                    <?php if ($art) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkArt">Art/Graphics/Photography</label>
                </p>
                <p>
                    <input id="chkWriting" name="chkWriting" tabindex="510"
                    <?php if ($writing) print 'checked'; ?>
                    type="checkbox" value="1">
                    <label for="chkWriting">Writing</label>
                </p>
            </fieldset>

            <fieldset class="listbox">
                <legend>How would you describe the urgency of this request?</legend>
                <p>
                    <select id="urgency" name="urgency" tabindex="120">
                        <option
                        <?php if ($urgency == "notUrgent") print 'selected';?>
                            value="notUrgent">Not Urgent (2-4 Weeks)</option>
                        <option
                        <?php if ($urgency == "normal") print 'selected';?>
                            value="normal">Normal Urgency (2 Weeks)</option>
                        <option
                        <?php if ($urgency == "veryUrgent") print 'selected';?>
                            value="veryUrgent">Extremely urgent (1 Week)</option>
                    </select>
                </p>
            </fieldset>

            <fieldset class="textarea">
            <legend>Please provide more information about your needs here:</legend>
                <p>
                    <label for="reasonForContact"></label>
                    <textarea id="reasonForContact" name="reasonForContact" tabindex="200"><?php print $description; ?></textarea>
                </p>
            </fieldset>

            <fieldset class="radio">
                <legend>Which would you have as a pet?</legend>
                <p>
                    <input type="radio" id="petsDog" name="pets" value="dog" tabindex="120"
                    <?php if($pets == "dog") print 'checked'; ?>
                    required>
                    <label class="radio-field" for="petsDog">Dog</label>
                </p>
                <p>
                    <input type="radio" id="petsCat" name="pets" value="cat" tabindex="120"
                    <?php if($pets == "cat") print 'checked'; ?>
                    required>
                    <label class="radio-field" for="petsCat">Cat</label>
                </p>
                <p>
                    <input type="radio" id="petsFish" name="pets" value="fish" tabindex="120"
                    <?php if($pets == "fish") print 'checked'; ?>
                    required>
                    <label class="radio-field" for="petsFish">Fish</label>
                </p>
            </fieldset>

            <fieldset class="buttons">
                <input id="btnSubmit" name="btnSubmit" tabindex="900" type="submit" value="Register">
            </fieldset>
        </form>
<br>
            <?php
                print $message;
                if ($mailSent) {
                    print "<p>A copy has been emailed to you for your records</p>";
                    print $mailMessage;
                }

            ?>
        </section>














        <section class="art">
            <h2 style="color: transparent;">Invisible heading to get around validation error</h2>
        </section>
    </main>
<?php include 'includes/footer.php'; ?>