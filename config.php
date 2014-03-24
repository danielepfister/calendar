<?php
/*
    This file is a part of Basic PHP Events Lister.  Copyright (c) 2008 Mark MacCollin, Mevin Productions, www.mevin.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/ 


// Database info

// Your MySQL host
$dbhost='localhost';

//Your MySQL username
$dbuser='root';

//Your MySQL password
$dbpass='';

//Your MySQL database name
$dbname='sandbox';

//Maximum number of displayed events
$maxnum='99';

//Year to display on the main calendar page
$displayYear = '2013-2014';

/* URL to where the calendar webApp is listed with trailing slash
*/
$webAppLocation='http://localhost/_webApps/Nevada DECA/calendar/';   

/*
The salt variable helps the script to further obscure the hash of your password in the database.  
Your password is "hashed" before it is stored in the database, but it is possible that if a hacker 
were to obtain the hashed version of your password, he or she could reverse engineer the hash to 
show the actual password.  When you salt the hash, with your own unique code, you make it much more 
difficult (Have to avoid the use of the word impossible here :)) to obtain your password.  

That's a very long way of saying, put 5 or 6 characters of YOUR OWN nonsense in the salt variable to 
make your password more secure.  If you choose not to use your own salt, the system will still
work, but will be a little less secure.  Good times!!
*/ 

$salt='7h6oe!';

////////// END OF REQUIRED CONFIGURATION OPTIONS /////////////

// date formats  Go to http://us3.php.net/date to learn how to format the dates, to suite your site's requirements.
// The current format is: 06/30/2009

$current_month = date('m');
$month_after_next = ($current_month + 2);
$current_day = date('d');
$current_year = date('Y');
$next_year = ($current_year + 1);
$schoolYear = ($current_year."-".($current_year + 1));
$nextSchoolYear = (($current_year + 1)."-".($current_year + 2));
$lastSchoolYear = (($current_year - 1)."-".$current_year);

?>


