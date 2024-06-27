-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 04:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bilciye`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `address_proc` (IN `ID` INT, IN `district_sp` VARCHAR(40), IN `village_sp` VARCHAR(40), IN `zone_sp` VARCHAR(40), IN `user_id_sp` INT, IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from address where district=district_sp and village=village_sp and zone=zone_sp) then 
select 'This info already exist' as msg;
else 
insert into address values(null,district_sp,village_sp,zone_sp,user_id_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from address where add_no=ID) then
update address set district=district_sp, village=village_sp, zone=zone_sp where add_no=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from address where add_no=ID) then
update address set deleted=1 where add_no=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `citizen_proc` (IN `ID` INT, IN `name_sp` VARCHAR(40), IN `tell_sp` VARCHAR(40), IN `home_id_sp` INT, IN `image_sp` VARCHAR(40), IN `password_sp` VARCHAR(40), IN `user_id_sp` INT, IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from citizen where name=name_sp and tell=tell_sp and home_id=home_id_sp and image=image_sp and password=password_sp) then 
select 'This info already exist' as msg;
else 
insert into citizen values(null,name_sp,tell_sp,home_id_sp,image_sp,password_sp,user_id_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from citizen where cit_id=ID) then
update citizen set name=name_sp, tell=tell_sp, home_id=home_id_sp, image=image_sp, password=password_sp where cit_id=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from citizen where cit_id=ID) then
update citizen set deleted=1 where cit_id=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `homes_proc` (IN `ID` INT, IN `add_no_sp` INT, IN `home_number_sp` VARCHAR(40), IN `home_type_sp` VARCHAR(40), IN `user_id_sp` INT, IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from homes where add_no=add_no_sp and home_number=home_number_sp and home_type=home_type_sp) then 
select 'This info already exist' as msg;
else 
insert into homes values(null,add_no_sp,home_number_sp,home_type_sp,user_id_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from homes where home_id=ID) then
update homes set add_no=add_no_sp, home_number=home_number_sp, home_type=home_type_sp where home_id=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from homes where home_id=ID) then
update homes set deleted=1 where home_id=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `industry_proc` (IN `ID` INT, IN `ind_name_sp` VARCHAR(40), IN `ind_tell_sp` VARCHAR(40), IN `add_no_sp` INT, IN `user_id_sp` INT, IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from industry where ind_name=ind_name_sp and ind_tell=ind_tell_sp and add_no=add_no_sp) then 
select 'This info already exist' as msg;
else 
insert into industry values(null,ind_name_sp,ind_tell_sp,add_no_sp,user_id_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from industry where ind_id=ID) then
update industry set ind_name=ind_name_sp, ind_tell=ind_tell_sp, add_no=add_no_sp where ind_id=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from industry where ind_id=ID) then
update industry set deleted=1 where ind_id=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `minstary_proc` (IN `ID` INT, IN `mins_name_sp` VARCHAR(40), IN `mins_email_sp` VARCHAR(40), IN `user_id_sp` INT, IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from minstary where mins_name=mins_name_sp and mins_email=mins_email_sp) then 
select 'This info already exist' as msg;
else 
insert into minstary values(null,mins_name_sp,mins_email_sp,user_id_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from minstary where mins_id=ID) then
update minstary set mins_name=mins_name_sp, mins_email=mins_email_sp where mins_id=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from minstary where mins_id=ID) then
update minstary set deleted=1 where mins_id=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `recycling_proc` (IN `ID` INT, IN `waste_id_sp` INT, IN `recy_type_sp` VARCHAR(40), IN `cit_id_sp` INT, IN `qty_sp` INT, IN `rate_sp` DOUBLE, IN `recy_date_sp` DATE, IN `user_id_sp` INT, IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from recycling where waste_id=waste_id_sp and recy_type=recy_type_sp and cit_id=cit_id_sp and qty=qty_sp and rate=rate_sp and recy_date=recy_date_sp) then 
select 'This info already exist' as msg;
else 
insert into recycling values(null,waste_id_sp,recy_type_sp,cit_id_sp,qty_sp,rate_sp,recy_date_sp,user_id_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from recycling where recy_id=ID) then
update recycling set waste_id=waste_id_sp, recy_type=recy_type_sp, cit_id=cit_id_sp, qty=qty_sp, rate=rate_sp, recy_date=recy_date_sp where recy_id=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from recycling where recy_id=ID) then
update recycling set deleted=1 where recy_id=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporting_proc` (IN `ID` INT, IN `cit_id_sp` INT, IN `criminal_photo_sp` VARCHAR(200), IN `description_sp` VARCHAR(100), IN `user_id_sp` INT, IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from reporting where cit_id=cit_id_sp and criminal_photo=criminal_photo_sp and description=description_sp) then 
select 'This info already exist' as msg;
else 
insert into reporting values(null,cit_id_sp,criminal_photo_sp,description_sp,user_id_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from reporting where rep_id=ID) then
update reporting set cit_id=cit_id_sp, criminal_photo=criminal_photo_sp, description=description_sp where rep_id=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from reporting where rep_id=ID) then
update reporting set deleted=1 where rep_id=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `users_proc` (IN `ID` INT, IN `username_sp` VARCHAR(40), IN `password_sp` VARCHAR(40), IN `usertype_sp` VARCHAR(40), IN `email_sp` VARCHAR(40), IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from users where username=username_sp and password=password_sp and usertype=usertype_sp and email=email_sp) then 
select 'This info already exist' as msg;
else 
insert into users values(null,username_sp,password_sp,usertype_sp,email_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from users where user_id=ID) then
update users set username=username_sp, password=password_sp, usertype=usertype_sp, email=email_sp where user_id=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from users where user_id=ID) then
update users set deleted=1 where user_id=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_address` ()   begin
select add_no ID, district District, village Village, zone Zone, users.username 'Username' from users, address where address.user_id=users.user_id and address.deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_citizen` ()   begin
select cit_id ID, name Name, tell Tell, concat(homes.home_number,', ',homes.home_type) Home, image Image, citizen.password Password, users.username Username from citizen,homes,users where citizen.home_id=homes.home_id and citizen.user_id=users.user_id and citizen.deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `View_Citizen_Points` (IN `num` INT)   begin
select citizen.name 'Citizen Name', round(sum((recycling.qty)*(recycling.rate)),2) Points from citizen,recycling where recycling.cit_id=citizen.cit_id and citizen.cit_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_homes` ()   begin
select home_id ID, concat(address.district,', ',address.village,', ',address.zone) Address, home_number 'Home Number', home_type 'Home Type', users.username Username from homes,address,users where homes.add_no=address.add_no and homes.user_id=users.user_id and homes.deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_industry` ()   begin
select ind_id ID, ind_name 'Name', ind_tell 'Tell', concat(address.district,', ',address.village,', ',address.zone) Address, users.username Username from industry, address, users where industry.add_no=address.add_no and industry.user_id=users.user_id and industry.deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_minstary` ()   begin
select mins_id ID, mins_name 'Name', mins_email 'Email', users.username Username from minstary, users where minstary.user_id=users.user_id and minstary.deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_recycling` ()   begin
select recy_id ID, waste.waste_type 'Waste Type', recy_type 'Recycling Type', citizen.name 'Citizen Name', qty 'Quantity', rate 'Rate', recy_date 'Date', users.username 'Username' from recycling,waste,citizen,users where recycling.waste_id=waste.waste_id and recycling.cit_id=citizen.cit_id and recycling.user_id=users.user_id and recycling.deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_reporting` ()   begin
select rep_id ID, citizen.name 'Citizen Name', criminal_photo 'Criminal Photo', description Description, users.username Username from reporting,citizen,users where reporting.cit_id=citizen.cit_id and reporting.user_id=users.user_id and reporting.deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_address` (IN `num` INT)   begin
select add_no ID, district District, village Village, zone Zone, users.username 'Username' from users, address where address.user_id=users.user_id and address.deleted=0 and add_no=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_citizen` (IN `num` INT)   begin
select cit_id ID, name Name, tell Tell, concat(homes.home_number,', ',homes.home_type) Home, image Image, citizen.password Password, users.username Username from citizen,homes,users where citizen.home_id=homes.home_id and citizen.user_id=users.user_id and citizen.deleted=0 and cit_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_home` (IN `num` INT)   begin
select home_id ID, concat(address.district,', ',address.village,', ',address.zone) Address, home_number 'Home Number', home_type 'Home Type', users.username Username from homes,address,users where homes.add_no=address.add_no and homes.user_id=users.user_id and homes.deleted=0 and home_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_industry` (IN `num` INT)   begin
select ind_id ID, ind_name 'Name', ind_tell 'Tell', concat(address.district,', ',address.village,', ',address.zone) Address, users.username Username from industry, address, users where industry.add_no=address.add_no and industry.user_id=users.user_id and industry.deleted=0 and ind_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_minstary` (IN `num` INT)   begin
select mins_id ID, mins_name 'Name', mins_email 'Email', users.username Username from minstary, users where minstary.user_id=users.user_id and minstary.deleted=0 and mins_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_recycling` (IN `num` INT)   begin
select recy_id ID, waste.waste_type 'Waste Type', recy_type 'Recycling Type', citizen.name 'Citizen Name', qty 'Quantity', rate 'Rate', recy_date 'Date', users.username 'Username' from recycling,waste,citizen,users where recycling.waste_id=waste.waste_id and recycling.cit_id=citizen.cit_id and recycling.user_id=users.user_id and recycling.deleted=0 and recy_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_reporting` (IN `num` INT)   begin
select rep_id ID, citizen.name 'Citizen Name', criminal_photo 'Criminal Photo', description Description, users.username Username from reporting,citizen,users where reporting.cit_id=citizen.cit_id and reporting.user_id=users.user_id and reporting.deleted=0 and rep_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_users` (IN `num` INT)   begin
select user_id ID, username 'Username', password 'Password', usertype 'Usertype', email 'Email' from users where deleted=0 and user_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_waste` (IN `num` INT)   begin
select waste_id 'ID', waste_type 'Waste Type', users.username 'Username' from waste,users where waste.user_id=users.user_id and waste.deleted=0 and waste_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_single_waste_request` (IN `num` INT)   begin
select request_id 'ID', citizen.name 'Citizen Name', industry.ind_name 'Industry Name', waste.waste_type 'Waste Type', request_date 'Date', users.username 'Username' from waste_request,citizen,industry,waste,users where waste_request.cit_id=citizen.cit_id and waste_request.ind_id=industry.ind_id and waste_request.waste_id=waste.waste_id and waste_request.user_id=users.user_id and waste_request.deleted=0 and request_id=num;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_users` ()   begin
select user_id ID, username 'Username', password 'Password', usertype 'Usertype', email 'Email' from users where deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_waste` ()   begin
select waste_id 'ID', waste_type 'Waste Type', users.username 'Username' from waste,users where waste.user_id=users.user_id and waste.deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_waste_request` ()   begin
select request_id 'ID', citizen.name 'Citizen Name', industry.ind_name 'Industry Name', waste.waste_type 'Waste Type', request_date 'Date', users.username 'Username' from waste_request,citizen,industry,waste,users where waste_request.cit_id=citizen.cit_id and waste_request.ind_id=industry.ind_id and waste_request.waste_id=waste.waste_id and waste_request.user_id=users.user_id and waste_request.deleted=0;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `waste_proc` (IN `ID` INT, IN `waste_type_sp` VARCHAR(40), IN `user_id_sp` INT, IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from waste where waste_type=waste_type_sp) then 
select 'This info already exist' as msg;
else 
insert into waste values(null,waste_type_sp,user_id_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from waste where waste_id=ID) then
update waste set waste_type=waste_type_sp where waste_id=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from waste where waste_id=ID) then
update waste set deleted=1 where waste_id=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `waste_request_proc` (IN `ID` INT, IN `cit_id_sp` INT, IN `ind_id_sp` INT, IN `waste_id_sp` INT, IN `request_date_sp` DATE, IN `user_id_sp` INT, IN `oper` VARCHAR(40))   begin
case 
when oper="insert" then 
if exists (select * from waste_request where cit_id=cit_id_sp and ind_id=ind_id_sp and waste_id=waste_id_sp and request_date=request_date_sp) then 
select 'This info already exist' as msg;
else 
insert into waste_request values(null,cit_id_sp,ind_id_sp,waste_id_sp,request_date_sp,user_id_sp,0);
select 'Inserted success' as msg;
end if;

when oper="update" then 
if exists (select * from waste_request where request_id=ID) then
update waste_request set cit_id=cit_id_sp, ind_id=ind_id_sp, waste_id=waste_id_sp, request_date=request_date_sp where request_id=ID;
select 'Updated success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

when oper="delete" then 
if exists (select * from waste_request where waste_id=ID) then
update waste_request set deleted=1 where waste_id=ID;
select 'Deleted success' as msg;
else 
select concat('This ID(',ID,') is not exist') as msg;
end if;

end case;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `add_no` int(11) NOT NULL,
  `district` varchar(40) NOT NULL,
  `village` varchar(40) NOT NULL,
  `zone` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_no`, `district`, `village`, `zone`, `user_id`, `deleted`) VALUES
(1, 'Yaaqshid', 'Towfiiq', 'Afnaan', 1, 1),
(2, 'Hiliwaa', 'Suuqa Xoolaha', 'Sarta Miinada', 1, 0),
(3, 'Wadajir', 'Xaawo Taako', 'Suuqa weyn', 1, 0),
(4, 'Wadajir', 'Macmacaanka', 'Suuqa weyn', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE `citizen` (
  `cit_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `tell` varchar(40) NOT NULL,
  `home_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`cit_id`, `name`, `tell`, `home_id`, `image`, `password`, `user_id`, `deleted`) VALUES
(1, 'Xaliimo Muuse Cali', '617562437', 1, 'wfds.jpg', '12345', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `home_id` int(11) NOT NULL,
  `add_no` int(11) NOT NULL,
  `home_number` varchar(50) NOT NULL,
  `home_type` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`home_id`, `add_no`, `home_number`, `home_type`, `user_id`, `deleted`) VALUES
(1, 2, 'BT65237', 'xaafad', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `ind_id` int(11) NOT NULL,
  `ind_name` varchar(40) NOT NULL,
  `ind_tell` varchar(40) NOT NULL,
  `add_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `minstary`
--

CREATE TABLE `minstary` (
  `mins_id` int(11) NOT NULL,
  `mins_name` varchar(40) NOT NULL,
  `mins_email` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recycling`
--

CREATE TABLE `recycling` (
  `recy_id` int(11) NOT NULL,
  `waste_id` int(11) NOT NULL,
  `recy_type` varchar(40) NOT NULL,
  `cit_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` double NOT NULL,
  `recy_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recycling`
--

INSERT INTO `recycling` (`recy_id`, `waste_id`, `recy_type`, `cit_id`, `qty`, `rate`, `recy_date`, `user_id`, `deleted`) VALUES
(1, 1, 'plastic', 1, 10, 0.004, '2024-04-05', 1, 0),
(2, 1, 'electronics', 1, 20, 0.6, '2024-04-05', 1, 0),
(3, 1, 'plastic', 1, 15, 0.04, '2024-04-05', 1, 0),
(4, 1, 'plastic', 1, 9, 0.06, '2024-04-06', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reporting`
--

CREATE TABLE `reporting` (
  `rep_id` int(11) NOT NULL,
  `cit_id` int(11) NOT NULL,
  `criminal_photo` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `usertype` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `usertype`, `email`, `deleted`) VALUES
(1, 'ismail', '123', 'admin', 'isma@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `waste`
--

CREATE TABLE `waste` (
  `waste_id` int(11) NOT NULL,
  `waste_type` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waste`
--

INSERT INTO `waste` (`waste_id`, `waste_type`, `user_id`, `deleted`) VALUES
(1, 'Recycling', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `waste_request`
--

CREATE TABLE `waste_request` (
  `request_id` int(11) NOT NULL,
  `cit_id` int(11) NOT NULL,
  `ind_id` int(11) NOT NULL,
  `waste_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`add_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`cit_id`),
  ADD KEY `cons_citizen_fk` (`home_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`home_id`),
  ADD KEY `cons_home_fk` (`add_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`ind_id`),
  ADD KEY `cons_ind_fk` (`add_no`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `minstary`
--
ALTER TABLE `minstary`
  ADD PRIMARY KEY (`mins_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recycling`
--
ALTER TABLE `recycling`
  ADD PRIMARY KEY (`recy_id`),
  ADD KEY `cons_recy_fk` (`cit_id`),
  ADD KEY `waste_id` (`waste_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reporting`
--
ALTER TABLE `reporting`
  ADD PRIMARY KEY (`rep_id`),
  ADD KEY `cons_rep_fk` (`cit_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `waste`
--
ALTER TABLE `waste`
  ADD PRIMARY KEY (`waste_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `waste_request`
--
ALTER TABLE `waste_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `cons_req_fk1` (`cit_id`),
  ADD KEY `cons_req_fk2` (`ind_id`),
  ADD KEY `cons_req_fk3` (`waste_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `add_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `citizen`
--
ALTER TABLE `citizen`
  MODIFY `cit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `ind_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `minstary`
--
ALTER TABLE `minstary`
  MODIFY `mins_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recycling`
--
ALTER TABLE `recycling`
  MODIFY `recy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reporting`
--
ALTER TABLE `reporting`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waste`
--
ALTER TABLE `waste`
  MODIFY `waste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waste_request`
--
ALTER TABLE `waste_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `citizen`
--
ALTER TABLE `citizen`
  ADD CONSTRAINT `citizen_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cons_citizen_fk` FOREIGN KEY (`home_id`) REFERENCES `homes` (`home_id`) ON UPDATE CASCADE;

--
-- Constraints for table `homes`
--
ALTER TABLE `homes`
  ADD CONSTRAINT `cons_home_fk` FOREIGN KEY (`add_no`) REFERENCES `address` (`add_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `homes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `industry`
--
ALTER TABLE `industry`
  ADD CONSTRAINT `cons_ind_fk` FOREIGN KEY (`add_no`) REFERENCES `address` (`add_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `industry_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `minstary`
--
ALTER TABLE `minstary`
  ADD CONSTRAINT `minstary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `recycling`
--
ALTER TABLE `recycling`
  ADD CONSTRAINT `cons_recy_fk` FOREIGN KEY (`cit_id`) REFERENCES `citizen` (`cit_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recycling_ibfk_1` FOREIGN KEY (`waste_id`) REFERENCES `waste` (`waste_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recycling_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `reporting`
--
ALTER TABLE `reporting`
  ADD CONSTRAINT `cons_rep_fk` FOREIGN KEY (`cit_id`) REFERENCES `citizen` (`cit_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reporting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `waste`
--
ALTER TABLE `waste`
  ADD CONSTRAINT `waste_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `waste_request`
--
ALTER TABLE `waste_request`
  ADD CONSTRAINT `cons_req_fk1` FOREIGN KEY (`cit_id`) REFERENCES `citizen` (`cit_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cons_req_fk2` FOREIGN KEY (`ind_id`) REFERENCES `industry` (`ind_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cons_req_fk3` FOREIGN KEY (`waste_id`) REFERENCES `waste` (`waste_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `waste_request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
