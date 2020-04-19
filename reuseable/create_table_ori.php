<?php
include_once "connect_db.php";

echo "<h1>Success in database CONNECTION.....</h1><br/>";

$result="CREATE TABLE cv_table (
id int(11) NOT NULL auto_increment,
firstname varchar(255) NOT NULL,
othername varchar(255) NULL,
surname varchar(255) NOT NULL,
title varchar(255) NULL,
date_of_birth date NOT NULL default '0000-00-00',
gender varchar(255) NOT NULL,
marital_status varchar(255) NOT NULL,
religion varchar(255) NOT NULL,
nationality varchar(255) NOT NULL,
state_of_origin varchar(255) NOT NULL,
lga varchar(255) NOT NULL,
home_town varchar(255) NOT NULL,
work_experience varchar(255) NOT NULL,
year_of_experience varchar(255) NOT NULL,
language_spoken varchar(255) NOT NULL,
email varchar(255) NOT NULL,
nysc_completed varchar(255) NOT NULL,
nysc_certificate_number varchar(255) NOT NULL,
nysc_date_completed varchar(255) NOT NULL,
qualification varchar(255) NOT NULL,
contact_address1 varchar(255) NOT NULL,
contact_address2 varchar(255) NULL,
contact_city varchar(255) NOT NULL,
contact_state varchar(255) NOT NULL,
contact_country varchar(255) NOT NULL,
contact_zip varchar(255) NULL,
permanent_address1 varchar(255) NOT NULL,
permanent_address2 varchar(255) NULL,
permanent_city varchar(255) NOT NULL,
permanent_state varchar(255) NOT NULL,
permanent_country varchar(255) NOT NULL,
permanent_zip varchar(255) NULL,
phone varchar(255) NULL,
fax varchar(255) NULL,
date_submited date NOT NULL default '0000-00-00',
cvlink varchar(255) NOT NULL,
SystemTime timestamp,
jobId varchar(255) NOT NULL,

PRIMARY KEY (id),
UNIQUE KEY email (email)
)";



$result_feedback="CREATE TABLE result_feedback (
id int(11) NOT NULL auto_increment,

name varchar(255) NOT NULL,
company varchar(255) NULL,
phonenumber varchar(255) NOT NULL,
email varchar(255) NOT NULL,
subject varchar(255) NULL,
message varchar(255) NULL,
date_submited date NOT NULL default '0000-00-00',
PRIMARY KEY (id)

)";

$employee_atitude="CREATE TABLE employee_atitude_table (
id int(11) NOT NULL auto_increment,

user_sys_name varchar(255) NOT NULL,
port varchar(255) NULL,
user_ip_addr varchar(255) NOT NULL,
a_like varchar(255) NOT NULL,
comment varchar(255) NULL,
browser_ver varchar(255) NULL,
trainning varchar(255) NULL,
itdepartment varchar(255) NULL,

date_submited timestamp,
PRIMARY KEY (id)

)";

$hse="CREATE TABLE hse_table (
id int(11) NOT NULL auto_increment,

fatalities varchar(255) NOT NULL,
ppd varchar(255) NULL,
ptd varchar(255) NOT NULL,
lwc varchar(255) NOT NULL,
lti varchar(255) NULL,
rwc varchar(255) NULL,
mtc varchar(255) NULL,
trc varchar(255) NULL,
fac varchar(255) NULL,
nearmisses varchar(255) NULL,
rta varchar(255) NULL,
nad varchar(255) NULL,
no_of_personnel varchar(255) NULL,
total_manhour varchar(255) NULL,
no_of_induction varchar(255) NULL,
no_of_meeting varchar(255) NULL,
no_of_swim_test varchar(255) NULL,
no_of_opr_vehi varchar(255) NULL,
no_of_dirve_test varchar(255) NULL,

month varchar(255) NULL,
year varchar(255) NULL,



date_submited timestamp,
PRIMARY KEY (id)

)";


$news="CREATE TABLE news_table (
id int(11) NOT NULL auto_increment,

detail text(10000) NOT NULL,
title varchar(255) NULL,
year varchar(255) NOT NULL,
month varchar(255) NOT NULL,
status varchar(255) NOT NULL,
pic varchar(255) NOT NULL,
date_submited timestamp,
PRIMARY KEY (id)

)";

$news_pchs="CREATE TABLE news_table_pchs (
id int(11) NOT NULL auto_increment,

detail text(10000) NOT NULL,
title varchar(255) NULL,
year varchar(255) NOT NULL,
month varchar(255) NOT NULL,
status varchar(255) NOT NULL,
pic varchar(255) NOT NULL,
date_submited timestamp,
PRIMARY KEY (id)

)";

$search_table="CREATE TABLE sifax_search (
id int(11) NOT NULL auto_increment,

content text(10000) NOT NULL,
link varchar(255) NULL,
date_submited timestamp,
PRIMARY KEY (id)

)";


$sifax_ip_view ="CREATE TABLE sifax_ip_view (
id int(11) NOT NULL auto_increment,

year varchar(255) NULL,
day varchar(255) NULL,
month varchar(255) NULL,
ip varchar(255) NULL,
pagename varchar(255) NULL,
country_code varchar(255) NULL,
    country_name varchar(255) NULL,
    region_code varchar(255) NULL,
    region_name varchar(255) NULL,
    city_name varchar(255) NULL,
    latitude varchar(255) NULL,
    longitude varchar(255) NULL,
    metro_code varchar(255) NULL,
    area_code varchar(255) NULL,
    time_zone varchar(255) NULL,
    continent_code varchar(255) NULL,
    postal_code varchar(255) NULL,
    isp_name varchar(255) NULL,
    organization_name varchar(255) NULL,
    domain varchar(255) NULL,
    as_number varchar(255) NULL,
    netspeed varchar(255) NULL,
    user_type varchar(255) NULL,
    accuracy_radius varchar(255) NULL,
    country_confidence varchar(255) NULL,
    city_confidence varchar(255) NULL,
    region_confidence varchar(255) NULL,
    postal_confidence varchar(255) NULL,
    error varchar(255) NULL,

date_submited timestamp,
PRIMARY KEY (id)

)";

















if (mysql_query($result)){
    echo "Success in TABLE creation!.....
    <br/><br/><br/><b>That completes the table setup, now delete the file <br/>
    named 'create_Table.php' and you are ready to move on. Let's go!</b>".'<br/><br/><br/>';
}else{
    echo "no TABLE created for cv. You have problems in the system already, backtrack and try again!".mysql_error().'<br/><br/><br/>';
}

if (mysql_query($result_feedback)){
    echo "Success in TABLE creation!.....
    <br/><br/><br/><b>That completes the table setup, now delete the file <br/>
    named 'create_Table.php' and you are ready to move on. Let's go!</b>".'<br/><br/><br/>';
}else{
    echo "no TABLE created for feedback. You have problems in the system already, backtrack and try again!".mysql_error().'<br/><br/><br/>';
}

if (mysql_query($employee_atitude)){
    echo "Success in  employee_atitude TABLE creation!.....
    <br/><br/><br/><b>That completes the table setup, now delete the file <br/>
    named 'create_Table.php' and you are ready to move on. Let's go!</b>".'<br/><br/><br/>';
}else{
    echo "no TABLE created for feedback. You have problems in the system already, backtrack and try again!".mysql_error().'<br/><br/><br/>';
}


if (mysql_query($hse)){
    echo "Success in  HSE TABLE creation!.....
    <br/><br/><br/><b>That completes the table setup, now delete the file <br/>
    named 'create_Table.php' and you are ready to move on. Let's go!</b>".'<br/><br/><br/>';
}else{
    echo "no TABLE created for feedback. You have problems in the system already, backtrack and try again!".mysql_error().'<br/><br/><br/>';
}



if (mysql_query($search_table)){
    echo "Success in  search_table creation!.....
    <br/><br/><br/><b>That completes the table setup, now delete the file <br/>
    named 'create_Table.php' and you are ready to move on. Let's go!</b>".'<br/><br/><br/>';
}else{
    echo "no TABLE created for feedback. You have problems in the system already, backtrack and try again!".mysql_error().'<br/><br/><br/>';
}


if (mysql_query($news)){
    echo "Success in  NEWS TABLE creation!.....
    <br/><br/><br/><b>That completes the table setup, now delete the file <br/>
    named 'create_Table.php' and you are ready to move on. Let's go!</b>".'<br/><br/><br/>';
}else{
    echo "no TABLE created for feedback. You have problems in the system already, backtrack and try again!".mysql_error().'<br/><br/><br/>';
}





if (mysql_query($news_pchs)){
    echo "Success in  NEWS TABLE creation!.....
    <br/><br/><br/><b>That completes the table setup, now delete the file <br/>
    named 'create_Table.php' and you are ready to move on. Let's go!</b>".'<br/><br/><br/>';
}else{
    echo "no TABLE created for feedback. You have problems in the system already, backtrack and try again!".mysql_error().'<br/><br/><br/>';
}


if (mysql_query($sifax_ip_view)){
    echo "Success in  IP Table TABLE creation!.....
    <br/><br/><br/><b>That completes the table setup, now delete the file <br/>
    named 'create_Table.php' and you are ready to move on. Let's go!</b>".'<br/><br/><br/>';
}else{
    echo "no TABLE created for feedback. You have problems in the system already, backtrack and try again!".mysql_error().'<br/><br/><br/>';
}




$add_pic_desc_coll = "ALTER TABLE  `news_table_pchs` ADD  `pic_desc` VARCHAR( 1000 ) NOT NULL AFTER  `pic`";

if (mysql_query($add_pic_desc_coll)){  echo "Success in Picture descriction collom added";}


 mkdir("cv_folder", 0755);
exit();
?>