<?php 
	include('dbConnect.php');

	$createContact = 
	"CREATE Table contacttb
	(
		ContactID int not null primary key Auto_Increment,
		ContactMessage varchar(255),
		Subject varchar(30),
		MemberID int,
		foreign key (MemberID) references membertb(MemberID)
	)";

	$result = mysqli_query($dbConnect, $createContact);

	if ($result)
	{
		echo "Contact table set up successfully.";
	}

	else
	{
		echo "Contact table set up fail.";
	}

	// $createJoin = 
	// "CREATE Table jointb
	// (
	// 	JoinID int not null primary key Auto_Increment,
	// 	JoinDate date,
	// 	Status varchar(30),
	// 	Email varchar(30),
	// 	PhoneNo varchar(30),
	// 	Description varchar(30),
	// 	PaymentType varchar(30),
	// 	MemberID int,
	// 	CampaignID int,
	// 	foreign key (MemberID) references membertb(MemberID),
	// 	foreign key (CampaignID) references campaigntb(CampaignID)
	// )";

	// $result = mysqli_query($dbConnect, $createJoin);

	// if ($result)
	// {
	// 	echo "Join table set up successfully.";
	// }

	// else
	// {
	// 	echo "Join table set up fail.";
	// }

	// $createMember = 
	// "CREATE Table membertb
	// (
	// 	MemberID int not null primary key Auto_Increment,
	// 	MemberFirstName varchar(30),
	// 	MemberLastName varchar(30),
	// 	MemberUserName varchar(30),
	// 	MemberEmail varchar(30),
	// 	MemberPh varchar(30),
	// 	MemberPassword varchar(30),
	// 	MemberRegisterMonth varchar(20),
	// 	MemberProfile varchar(255),
	// 	MemberAddress varchar(50)
	// )";

	// $result = mysqli_query($dbConnect, $createMember);

	// if ($result)
	// {
	// 	echo "Member table set up successfully.";
	// }

	// else
	// {
	// 	echo "Member table set up fail.";
	// }

	// $createTechnique = 
	// "CREATE Table techniquetb
	// (
	// 	TechniqueID int not null primary key Auto_Increment,
	// 	TechniqueName varchar(30),
	// 	TechniqueImg varchar(255),
	// 	Status varchar(30),
	// 	Tip1 varchar(255),
	// 	Tip2 varchar(255),
	// 	Tip3 varchar(255),
	// 	MediaAppID int,
	// 	foreign key (MediaAppID) references mediatb(MediaAppID)
	// )";

	// $result = mysqli_query($dbConnect, $createTechnique);

	// if ($result)
	// {
	// 	echo "Technique table set up successfully.";
	// }

	// else
	// {
	// 	echo "Technique table set up fail.";
	// }

	// $createMedia = 
	// "CREATE Table mediatb
	// (
	// 	MediaAppID int not null primary key Auto_Increment,
	// 	MediaAppName varchar(30),
	// 	MediaLogo varchar(255),
	// 	MediaLink varchar(255),
	// 	MediaRating int
	// )";

	// $result = mysqli_query($dbConnect, $createMedia);

	// if ($result)
	// {
	// 	echo "Media table set up successfully.";
	// }

	// else
	// {
	// 	echo "Media table set up fail.";
	// }

	// $createContact = 
	// "CREATE Table contacttb
	// (
	// 	ContactID int not null primary key Auto_Increment,
	// 	ContactTitle varchar(30),
	// 	ContactMessage varchar(200),
	// 	MemberID int,
	// 	MemberEmail varchar(30),
	// 	MemberUserName varchar(30),
	// 	MemberPhone varchar(20)
	// )";

	// $result = mysqli_query($dbConnect, $createContact);

	// if ($result)
	// {
	// 	echo "Contact table set up successfully.";
	// }

	// else
	// {
	// 	echo "Contact table set up fail.";
	// }

	// $createCampaignType = 
	// "CREATE Table campaignTypetb
	// (
	// 	CampaignTypeID int not null primary key Auto_Increment,
	// 	CampaignTypeName varchar(30)
	// )";

	// $result = mysqli_query($dbConnect, $createCampaignType);

	// if ($result)
	// {
	// 	echo "CampaignType table set up successfully.";
	// }

	// else
	// {
	// 	echo "CampaignType table set up fail.";
	// }

	// $createCampaign = 
	// "CREATE Table campaigntb
	// (
	// 	CampaignID int not null primary key Auto_Increment,
	// 	CampaignName varchar(30),
	// 	CampaignTypeID int,
	// 	MediaAppID int,
	// 	CampaignImage1 varchar(255),
	// 	CampaignImage2 varchar(255),
	// 	CampaignImage3 varchar(255),
	// 	CampaignAim varchar(255),
	// 	CampaignVision varchar(255),
	// 	CampaignDescription varchar(255),
	// 	CampaignStartDate date,
	// 	CampaignEndDate date,
	// 	CampaignFee int,
	// 	CampaignMap text,
	// 	Status varchar(30),
	// 	foreign key (CampaignTypeID) references campaigntypetb(CampaignTypeID),
	// 	foreign key (MediaAppID) references mediatb(MediaAppID)
	// )";

	// $result = mysqli_query($dbConnect, $createCampaign);

	// if ($result)
	// {
	// 	echo "Campaign table set up successfully.";
	// }

	// else
	// {
	// 	echo "Campaign table set up fail.";
	// }

	$createAdmin = 
	"CREATE Table admintb
	(
		AdminID int not null primary key Auto_Increment,
		AdminName varchar(30),
		AdminUserName varchar(30),
		AdminEmail varchar(30),
		AdminPassword varchar(20),
		AdminPh varchar(30),
		AdminAddress varchar(30)
	)";

	$result = mysqli_query($dbConnect, $createAdmin);

	if ($result)
	{
		echo "Admin table set up successfully.";
	}

	else
	{
		echo "Admin table set up fail.";
	}

	
 ?>