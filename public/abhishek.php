<?php
    /*
    ** Define a couple of functions for
    ** starting and ending an HTML document
    */
    function startPage()
    {
        print("<html>\n");
        print("<head>\n");
        print("<title>Listing 24-1</title>\n");
        print("</head>\n");
        print("<body>\n");
    }

    function endPage()
    {
        print("</body>\n");
        print("</html>\n");
    }
    /*
    ** test for username/password
    */
    if(($_SERVER['PHP_AUTH_USER'] == "darky") AND
        ($_SERVER['PHP_AUTH_PW'] == "darkshadow"))
    {
        startPage();

	echo "
	  1. Machine learning specialisation <br>
2. Competitive Programming <br>
3. Javascript Pro <br>
4. Go Expert <br>
5. MS, PhD <br>

	";

        endPage();
    }
    else
    {
        //Send headers to cause a browser to request
        //username and password from user
        header("WWW-Authenticate: " .
            "Basic realm=\"Leon's Protected Area\"");
        header("HTTP/1.0 401 Unauthorized");

        //Show failure text, which browsers usually
        //show only after several failed attempts
        print("This page is protected by HTTP " .
            "Authentication.<br>\nUse <b>leon</b> " .
            "for the username, and <b>secret</b> " .
            "for the password.<br>\n");
    }
?>
