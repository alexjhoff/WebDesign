<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta charset="utf-8"/>
        <title>Frugal Innovation Lab</title>
        <?php
            //startup db 
            $con = mysql_connect("dbserver.engr.scu.edu","gcook","00000957363");
            if (!$con)
                die('Could not connect: ' . mysql_error());
            
            mysql_select_db("sdb_gcook", $con);
            $row = mysql_fetch_array(mysql_query("show tables",$con));
            if(empty($row[0])) { //only runs on intial startup
                $sql1 = "CREATE TABLE props (DateSub VARCHAR(32) Primary Key, Proposal VARCHAR(200))";
                $sql2 = "CREATE TABLE donations (DateSub VARCHAR(32) Primary Key, Donor VARCHAR(200), Amount DECIMAL(10,2))";
                $sql3 = "CREATE TABLE forum (DateSub VARCHAR(32) Primary Key, User VARCHAR(20), Post VARCHAR(200))";

                if(!mysql_query($sql1,$con) ||!mysql_query($sql2,$con) || !mysql_query($sql3,$con))
                    die('Could not create Tables for proposals, donations and/or forum ' . mysql_error());
            }
            mysql_close($con);
            
        ?>

    </head>
    <body>

    <div>
    <ul id = "menubar">
        <li><a href = "main.php">Home</a></li>
        <li><a href = "projects.php">Projects</a></li>
        <li><a href = "FILTeam.html">Our Team</a></li>
        <li><a href = "quiz.html">FIL Quiz</a></li>
        <li><a href = "forum.php">Forum</a></li>
    </ul> 
    </div>    
    <div id = "main">
    <div  style="clear: both; width : 50%; margin : 10px; float: left; margin-left: 15%">
        <div = "info">
        <!-- static webpage content for start screen-->       
        <h2 style="font: arial, sans-serif;">The Frugal Innovation Lab develops accessible, affordable, adaptable, and appropriate technologies, products and solutions to address human needs in emerging markets.</h2><br/>
        <!-- throw in the  image with the three i's-->
        <img src="Instruction Innovation and Immersion.jpg" alt="ThreeIs" style="width:90%"><br/>
        <h3 style="font: arial, sans-serif;">Instruction</h3>
<h5 style="font: arial, sans-serif;">Courses are available for undergraduate and graduate students that help prepare with the necessary knowledge and skills to effectively address new economy market needs.</h5>
<h3 style="font: arial, sans-serif;">Innovation</h3>
<h5 style="font: arial, sans-serif;">The FIL is a collaborative space for students and faculty to work with industry partners and NGOs to research and implement new technologies for consumers in emerging markets.</h5>
<h3 style="font: arial, sans-serif;">Immersion</h3>
<h5 style="font: arial, sans-serif;">SCU students have incredible opportunities to participate in internships and work with social entrepreneurs around the world and witness, firsthand, challenges faced by marginalized communities.</h5>
        </div>

        <div id="Proposal">
            <form action="main.php" method="post">
            <fieldset>
                <legend style="font: arial, sans-serif;"> Project Proposal </legend>
                
                <p>
                <label for="stid" style="font: arial, sans-serif;">Proposal Information</label> </br><textarea rows="4" cols="50" name="prop"><?php
                    if(isset($_POST["prop"])) {
                        //connect to db
                        $con = mysql_connect("dbserver.engr.scu.edu","gcook","00000957363");
                        if (!$con)
                            die('Could not connect: ' . mysql_error());
                        mysql_select_db("sdb_gcook", $con);

                        $sql = "INSERT INTO props VALUES('".date(DATE_RFC2822)."','$_POST[prop]')";
                        if (!mysql_query($sql,$con))
                            die('Error: ' . mysql_error());
                        echo "Thank you for submitting that proposal! The team will take a look at it and post about it in the forum soon!";
                        mysql_close($con);
                        unset($_POST["prop"]);
                    }
                    else {
                        echo "Have any ideas on what we should work on next? Submit a proposal here!";
                    }
                ?></textarea><br>
                <input type="submit" style="font: arial, sans-serif;" name="submitProposal" onclick="submitProposal()"/>
                </p>

                </fieldset> 
            </form>

        </div>
    </div>
    <div id="side" style = "float: left; width : 20%; margin : 10px">    
        <div id="Donations" style="font: arial, sans-serif;">
            <h1 id ="one" style="font: arial, sans-serif;">Help Fund New Projects!</h1>
            <h3 id="two" style="font: arial, sans-serif;">$13.30 (Level 1)</h3>
            <p>Supports the wages and benefits of an undergraduate student to work for one hour on a FIL project!</p>
            <h3 id="two" style="font: arial, sans-serif;">$17.65 (Level 2)</h3>
            <p>Supports the wages and benefits of a graduate student to work for one hour on a FIL project!</p>
            <h3 id="two" style="font: arial, sans-serif;">$39.95 (Level 3)</h3>
            <p>Purchases one Raspberry Pi (or similar products) for the development of mobile applications, smart sensors, or other solutions for our field-based social enterprises.</p>
            <h3 id="two" style="font: arial, sans-serif;">$78.60 (Level 4)</h3>
            <p>Covers the average cost of admittance to a FIL related conference for a faculty/staff member.</p>
            <h3 id="two" style="font: arial, sans-serif;">$500 (Level 5)</h3>
            <p>Provides a Senior Design team with enough money to buy materials for their prototype.</p>
            <h3 id="two" style="font: arial, sans-serif;">$898 (Level 6)</h3>
            <p>Accommodates one student’s air fare to South America to field test their prototypes with FIL university and enterprise partners.</p>
            <h3 id="two" style="font: arial, sans-serif;">$1,500 (Level 7)</h3>
            <p>Makes you exceptionally awesome.</p>
    
            <form action="main.php" method="post">
                <fieldset>
                    <legend style="font: arial, sans-serif;">Make a Donation</legend>
                    <p>
                        <label for="stid" style="font: arial, sans-serif;">Donor Information</label> </br><textarea rows="4" cols="50" name="info"><?php
                            if(isset($_POST["info"]) && isset($_POST["donation"]) && !empty($_POST["donation"])) {
                                $con = mysql_connect("dbserver.engr.scu.edu","gcook","00000957363");
                                if (!$con)
                                    die('Could not connect: ' . mysql_error());
                                mysql_select_db("sdb_gcook", $con);

                                $sql = "INSERT INTO donations VALUES('".date(DATE_RFC2822)."','$_POST[info]','$_POST[donation]')";
                                if (!mysql_query($sql,$con))
                                    die('Error: ' . mysql_error());
                                echo "Thank you for submitting that donation of \$".$_POST['donation']."!";
                                mysql_close($con);
                                unset($_POST["info"]);
                                unset($_POST["donation"]);
                            }
                            else {
                                echo "Tell us a little about yourself! What makes you want to donate?";
                            }
                        ?></textarea><br>
                        <label style="font: arial, sans-serif;" for="stid">Donation Amount</label> <input type="number" name="donation" min="0" />
                        <input style="font: arial, sans-serif;" type="submit" name="submitDonation"/>
                    </p>
                </fieldset>	
            </form>

        </div>
    </div>
    <div id = "footer" style="font: arial, sans-serif; clear:both">
        <a href = "http://www.scu.edu/map/214/index.cfm">Campus Map</a><br>
        <a href = "http://www.scu.edu/engineering/frugal/">FIL Website</a><br>
        <p>Griffin Cook (gcook@scu.edu) and Alex Hoff (ahoff@scu.edu)<br/>COEN 161 Fall 2014 MWF 9:15 Section</p>
    </div>
</div>
    </body>
</html>
