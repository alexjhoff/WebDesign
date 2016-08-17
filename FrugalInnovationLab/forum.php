<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta charset="utf-8"/>
        <title>FIL Forum</title>
        <!--jquery accordion here. also jquery appendation here-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
        <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/>
        <script type='text/javascript'>            
            $(document).ready(function() {
                $("#posts").accordion();
            });</script>
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

    <div id="main" style = "clear:both">
        <h1 style="font: arial, sans-serif;">Forum Submissions</h1>
        <div id="Fone">
        <form action="forum.php" method="post">
            <fieldset>
                <legend style="font: arial, sans-serif;"> Forum Post Submission </legend>
                <p>
                <labelstyle="font: arial, sans-serif;" >Your Name</label><textarea rows="1" cols = "20" name="subname"></textarea><br/>
                <label for="stid"style="font: arial, sans-serif;" >Forum Post</label> </br><textarea rows="4" cols="50" name="submission"><?php
                    if(isset($_POST["submission"]) && isset($_POST["subname"])) {
                        //connect to db
                        $con = mysql_connect("dbserver.engr.scu.edu","gcook","00000957363");
                        if (!$con)
                            die('Could not connect: ' . mysql_error());
                        mysql_select_db("sdb_gcook", $con);

                        if(!empty($_POST["subname"]))
                            $name_of_submitter = $_POST["subname"];
                        else
                            $name_of_submitter = 'Anonymous';

                        $sql = "INSERT INTO forum VALUES('".date(DATE_RFC2822)."','$name_of_submitter','$_POST[submission]')";
                        if (!mysql_query($sql,$con))
                            die('Error: ' . mysql_error());
                        mysql_close($con);
                        unset($_POST["subname"]);
                        unset($_POST["submission"]);
                    }
                    else {
                        echo "Have any updates or questions about the projects going on in the FIL? Submit them here!";
                    }
                ?></textarea><br>
                <input style="font: arial, sans-serif;" type="submit" name="submitInput"/>
                </p>
            </fieldset>	
        </form>
        <div>
            <h3style="font: arial, sans-serif;" >Recent Posts</h3>
            <div id = "posts">            
                <?php
                    $con = mysql_connect("dbserver.engr.scu.edu","gcook","00000957363");
                    if (!$con)
                        die('Could not connect: ' . mysql_error());
                    mysql_select_db("sdb_gcook", $con);

                    $result = mysql_query("SELECT * FROM forum ORDER BY DateSub DESC");

                    while($row = mysql_fetch_array($result))
                    {
                        echo "<h5>" . $row[1] . "</h5>";
                        echo "<p>" . $row[2] . "</p>";
                    }
                    mysql_close($con);
                ?>
            </div>
        </div>
    </div>
    <div id = "footer" style="font: arial, sans-serif;">
        <p>Griffin Cook and Alex Hoff<br/>COEN 161 Fall 2014 MWF 9:15 Section</p>
    </div>
    </body>
</html>