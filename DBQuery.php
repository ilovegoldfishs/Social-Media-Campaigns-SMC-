<?php
include('DBConnect.php');
// create admin table
// $admintb = "CREATE TABLE admintable
// 	(
// 		AdminID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
// 		AdminName varchar(30),
// 		AdminEmail varchar(30),
// 		AdminPassword varchar(30),
//         AdminLastLogin datetime,
//         AdminPhoto varchar(255)
// 	)";

// $myquery = mysqli_query($dbconnect, $admintb);

// if ($myquery) {
// 	echo "<script>window.alert('AdminTable Created Successfully')</script>";
// } else {
// 	echo "<script>window.alert('AdminTable Created Failed')</script>";
// }

//create socialmedia table
// $mediatb = "CREATE TABLE socialmediatable
// 	(
// 		MediaID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
// 		MediaName varchar(30),
// 		MediaLink varchar(255),
// 		MediaPhoto text
// 	)";

// $myquery = mysqli_query($dbconnect, $mediatb);

// if ($myquery) {
// 	echo "<script>window.alert('Socailmedia Table Created Successfully')</script>";
// } else {
// 	echo "<script>window.alert('Socialmedia Table Created Failed')</script>";
// }

//Technique Table
// $tectb = "CREATE TABLE techniquetable
//     (
//      TechniqueID int not null primary key auto_increment,
//      TechniqueName varchar(50),
//      Description  varchar(100),
//      Feature  varchar(100),
//      mediaID int,
//      foreign key(mediaID) references socialmediatable(MediaID)
//      ON DELETE CASCADE
// 	 ON UPDATE CASCADE
//     )";

// $myquery = mysqli_query($dbconnect, $tectb);

// if ($myquery) {
// 	echo "<script>window.alert('Technique Table Created Successfully')</script>";
// } else {
// 	echo "<script>window.alert('Technique Table Created Failed')</script>";
// }

//create campingtype table//
// $camTypetb="CREATE TABLE campaigntypetble
// (
//  CamTypeID int not null primary key auto_increment,
//  CamTypeName varchar(70),
//  CamTypeObj varchar(100)
// )";

// $query=mysqli_query($dbconnect,$camTypetb);

// if ($query)
// {
//      echo "<script>window.alert('Campaigntype Table Created Successfully')</script>";
// }
// else 
// {
//     echo "<script>window.alert('Campaigntype Table Created Failed')</script>";
// }

//create Campaign table
// $camTypetb="CREATE TABLE campaigntable
// (
//  CampaignID int not null primary key auto_increment,
//  MediaID int,
//  CamTypeID int,
//  CampaignName varchar(70),
//  CampaignDescription varchar(100),
//  CampaignLocation text,
//  CampaignAim text,
//  CampaignVision text,
//  StartDate DateTime,
//  EndDate DateTime,
//  Status varchar(20),
//  Budget INT,
//  CreatedAt DateTime,
//  UpdatedAt DateTime,
//  CampaginPhoto1 varchar(255),
//  CampaginPhoto2 varchar(255),
//  CampaginPhoto3 varchar(255),
//  CampaginPhoto4 varchar(255),
//  Week1 varchar(80),
//  Week2 varchar(80),
//  Week3 varchar(80),
//  Week4 varchar(80),
//  Week5 varchar(80),
//  Reward1 varchar(100),
//  Reward2 varchar(100),
//  Reward3 varchar(100),
//  Reward4 varchar(100),
//  Reward5 varchar(100),
//  FOREIGN KEY (MediaID) REFERENCES socialmediatable (MediaID)
//  ON DELETE CASCADE
//  ON UPDATE CASCADE,
//  FOREIGN KEY (CamTypeID) REFERENCES campaigntypetble (CamTypeID)
//  ON DELETE CASCADE
//  ON UPDATE CASCADE
// )";

// $query=mysqli_query($dbconnect,$camTypetb);

// if ($query)
// {
//      echo "<script>window.alert('Campaign Table Created Successfully')</script>";
// } else 
// {
//     echo "<script>window.alert('Campaign Table Created Failed')</script>";
// }

//create member table
// $member = "CREATE TABLE membertable
// (
//     MemberID int not null primary key auto_increment,
//     firstname varchar(15),
//     Surname varchar(15),
//     MemberEmail varchar(30),
//     MemberPassword varchar(30),
//     PhoneNo varchar(30),
//     MembersignupDate datetime,
//     MemberloginDate datetime,
//     Comment text,
//     DateofBirth datetime,
//     Gender varchar(30),
//     profile varchar(255)
// )";

// $query=mysqli_query($dbconnect,$member);

// if ($query)
// {
//      echo "<script>window.alert('Memebr Table Created Successfully')</script>";
// }

// else 
// {
//     echo "<script>window.alert('Memebr Table Created Failed')</script>";
// }

//create Join table
// $join = "CREATE TABLE jointable
// (
//     JoinID int not null primary key auto_increment,
//     MemberID int,
//     CampaignID int,
//     CardNumber varchar(20),
//     Amount int,
//     FOREIGN KEY (MemberID) REFERENCES membertable (MemberID)
//     ON DELETE CASCADE
//     ON UPDATE CASCADE,
//     FOREIGN KEY (CampaignID) REFERENCES campaigntable (CampaignID)
//     ON DELETE CASCADE
//     ON UPDATE CASCADE
// )";

// $query=mysqli_query($dbconnect,$join);

// if ($query)
// {
//      echo "<script>window.alert('Join Table Created Successfully')</script>";
// }

// else 
// {
//     echo "<script>window.alert('Join Table Created Failed')</script>";
// }
?>
