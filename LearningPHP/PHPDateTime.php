<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>PHP Date and Time</title>
  </head>
  <body>
    <?php
            date_default_timezone_set('UTC');
            
            echo date('h:i:s:u a, l F jS Y e');
            
            /* Echos the date
    039                     h : 12 hr format
    040                     H : 24 hr format
    041                     i : Minutes
    042                     s : Seconds
    043                     u : Microseconds
    044                     a : Lowercase am or pm
    045                     l : Full text for the day
    046                     F : Full text for the month
    047                     j : Day of the month
    048                     S : Suffix for the day st, nd, rd, etc.
    049                     Y : 4 digit year
    050                 */
            
      ?>
  </body>
</html>
