-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2025 at 05:25 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `httpastu_herocollections`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `loginid` varchar(1000) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `salt` varchar(500) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNo` varchar(50) DEFAULT NULL,
  `mobileNo` varchar(10) DEFAULT NULL,
  `LastLogin` varchar(1000) DEFAULT NULL,
  `logout_date` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(100) DEFAULT NULL,
  `strIP` varchar(100) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `Agencyid` int(11) NOT NULL,
  `agencyname` varchar(1000) DEFAULT NULL,
  `frommail` varchar(100) DEFAULT NULL,
  `fromePassword` varchar(50) DEFAULT NULL,
  `emailto` varchar(5000) DEFAULT NULL,
  `cc` varchar(5000) DEFAULT NULL,
  `stateid` int(11) NOT NULL DEFAULT '0',
  `locationid` int(11) NOT NULL DEFAULT '0',
  `districtId` int(11) NOT NULL DEFAULT '0',
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agencymanager`
--

CREATE TABLE `agencymanager` (
  `agencymanagerid` int(11) NOT NULL,
  `agencyname` varchar(1000) DEFAULT NULL,
  `employeename` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `loginId` varchar(1000) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `salt` varchar(1000) DEFAULT NULL,
  `LastLogin` varchar(50) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agencymanagerlocation`
--

CREATE TABLE `agencymanagerlocation` (
  `agencymanagerlocationid` int(11) NOT NULL,
  `iagencymanagerid` int(11) NOT NULL DEFAULT '0',
  `iLocationId` int(11) NOT NULL DEFAULT '0',
  `stateId` int(11) NOT NULL DEFAULT '0',
  `districtId` int(11) NOT NULL DEFAULT '0',
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `agncylocation`
--

CREATE TABLE `agncylocation` (
  `agncylocationid` int(11) NOT NULL,
  `agencyid` int(11) NOT NULL DEFAULT '0',
  `locationid` int(11) NOT NULL DEFAULT '0',
  `stateId` int(11) NOT NULL DEFAULT '0',
  `districtId` int(11) NOT NULL DEFAULT '0',
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `annexuremaster`
--

CREATE TABLE `annexuremaster` (
  `annexuremasterid` int(11) NOT NULL,
  `annexureid` varchar(250) DEFAULT NULL,
  `alpsid` varchar(250) DEFAULT NULL,
  `agencyid` int(11) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applicationid` int(11) NOT NULL,
  `uniqueId` varchar(1000) DEFAULT NULL,
  `agency` varchar(1000) DEFAULT NULL,
  `excelfilename` varchar(1000) DEFAULT NULL,
  `excelnameid` int(11) NOT NULL DEFAULT '0',
  `locationid` varchar(1000) DEFAULT NULL,
  `stateid` varchar(1000) DEFAULT NULL,
  `LAN_NUMBER` int(11) NOT NULL DEFAULT '0',
  `PRODUCT` varchar(1000) DEFAULT NULL,
  `SrNo` int(11) NOT NULL DEFAULT '0',
  `Account_No` varchar(1000) DEFAULT NULL,
  `App_Id` varchar(1000) DEFAULT NULL,
  `Bkt` varchar(1000) DEFAULT NULL,
  `Customer_Name` varchar(1000) DEFAULT NULL,
  `Fathers_name` varchar(1000) DEFAULT NULL,
  `Asset_Make` varchar(1000) DEFAULT NULL,
  `Branch` varchar(1000) DEFAULT NULL,
  `State` varchar(1000) DEFAULT NULL,
  `Due_Month` varchar(1000) DEFAULT NULL,
  `Allocation_Date` varchar(1000) DEFAULT NULL,
  `Allocation_CODE` varchar(1000) DEFAULT NULL,
  `Bounce_Reason` varchar(1000) DEFAULT NULL,
  `Loan_amount` varchar(1000) DEFAULT NULL,
  `Loan_booking_Date` varchar(1000) DEFAULT NULL,
  `Loan_maturity_date` varchar(1000) DEFAULT NULL,
  `Frist_Emi_Date` varchar(1000) DEFAULT NULL,
  `Due_date` varchar(1000) DEFAULT NULL,
  `Emi_amount` varchar(1000) DEFAULT NULL,
  `Installment_Overdue_Amount` varchar(1000) DEFAULT NULL,
  `Bcc` varchar(1000) DEFAULT NULL,
  `Lpp` varchar(1000) DEFAULT NULL,
  `Total_penlty` varchar(1000) DEFAULT NULL,
  `Principal_outstanding` varchar(1000) DEFAULT NULL,
  `Vehicle_Registration_No` varchar(1000) DEFAULT NULL,
  `Supplier` varchar(1000) DEFAULT NULL,
  `Tenure` varchar(1000) DEFAULT NULL,
  `Customer_Address` text,
  `Contact_Number` varchar(1000) DEFAULT NULL,
  `Collection_Manager` varchar(1000) DEFAULT NULL,
  `State_Manager` varchar(1000) DEFAULT NULL,
  `Ref_1_Name` varchar(1000) DEFAULT NULL,
  `Contact_Detail` varchar(1000) DEFAULT NULL,
  `Ref_2_Name` varchar(1000) DEFAULT NULL,
  `Contact_Detail_ref2` varchar(1000) DEFAULT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `is_assignto_am` int(11) NOT NULL DEFAULT '1',
  `agencyid` int(11) DEFAULT '0',
  `assign_am_datetime` varchar(50) DEFAULT NULL,
  `agencymanagerid` int(11) NOT NULL DEFAULT '0',
  `am_accaptance` int(11) NOT NULL DEFAULT '1',
  `is_assignto_as` int(11) NOT NULL DEFAULT '1',
  `assign_as_datetime` varchar(50) DEFAULT NULL,
  `agencysupervisorid` int(11) NOT NULL DEFAULT '0',
  `is_assignto_fos` int(11) NOT NULL DEFAULT '0',
  `assign_fos_datetime` varchar(50) DEFAULT NULL,
  `fosid` int(11) NOT NULL DEFAULT '0',
  `fos_completed` int(11) NOT NULL DEFAULT '0',
  `fos_completed_status` int(11) NOT NULL DEFAULT '0',
  `fos_comment` varchar(1000) DEFAULT NULL,
  `AlternetMobileNo` varchar(250) DEFAULT NULL,
  `ptp_datetime` varchar(50) DEFAULT NULL,
  `fos_submit_datetime` varchar(50) DEFAULT NULL,
  `Payment_Collected_Date` varchar(50) DEFAULT NULL,
  `Payment_Collected_Amount` int(11) DEFAULT '0',
  `LastPaymentDate` varchar(50) DEFAULT NULL,
  `penal` int(11) NOT NULL DEFAULT '0',
  `totalamt` int(11) NOT NULL DEFAULT '0',
  `updatedate` varchar(50) DEFAULT NULL,
  `Pincode` varchar(50) DEFAULT NULL,
  `reason` varchar(1000) DEFAULT NULL,
  `runsheet` int(11) NOT NULL DEFAULT '0',
  `runsheetsequnce` int(11) NOT NULL DEFAULT '1000',
  `PTP_Date` varchar(250) DEFAULT NULL,
  `PTP_Amount` varchar(250) DEFAULT NULL,
  `Time_Slot` varchar(250) DEFAULT NULL,
  `annexureid` varchar(15) DEFAULT NULL,
  `customer_city` varchar(100) DEFAULT NULL,
  `customer_city_id` int(11) DEFAULT NULL,
  `withdraw_date` varchar(50) DEFAULT NULL,
  `return_date` varchar(50) DEFAULT NULL,
  `withdraw_reason` varchar(250) DEFAULT NULL,
  `visit_address` text,
  `alternate_contact_number` varchar(60) DEFAULT NULL,
  `is_photo_uploaded` int(11) NOT NULL DEFAULT '0',
  `excel_return_date` varchar(50) DEFAULT NULL,
  `error_upload` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicationlog`
--

CREATE TABLE `applicationlog` (
  `applicationlogid` int(11) NOT NULL,
  `app_id` int(11) NOT NULL DEFAULT '0',
  `emp_id` int(11) NOT NULL DEFAULT '0',
  `emp_type` varchar(1000) DEFAULT NULL,
  `action_name` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicationphotos`
--

CREATE TABLE `applicationphotos` (
  `applicationphotosid` int(11) NOT NULL,
  `applicationid` int(11) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bkt`
--

CREATE TABLE `bkt` (
  `bktid` int(11) NOT NULL,
  `bktname` varchar(1000) NOT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centralmanager`
--

CREATE TABLE `centralmanager` (
  `centralmanagerid` int(11) NOT NULL,
  `employeeName` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `phoneNo` varchar(50) DEFAULT NULL,
  `mobileNo` varchar(20) DEFAULT NULL,
  `loginId` varchar(1000) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `salt` varchar(1000) DEFAULT NULL,
  `LastLogin` varchar(50) DEFAULT NULL,
  `canaddagency` int(11) NOT NULL DEFAULT '0',
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `centralmanagerlocation`
--

CREATE TABLE `centralmanagerlocation` (
  `centralmanagerlocationid` int(11) NOT NULL,
  `icentralmanagerid` int(11) NOT NULL DEFAULT '0',
  `iLocationId` int(11) NOT NULL DEFAULT '0',
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `colleted_application`
--

CREATE TABLE `colleted_application` (
  `applicationid` int(11) NOT NULL,
  `uniqueId` varchar(1000) DEFAULT NULL,
  `agency` varchar(1000) DEFAULT NULL,
  `excelfilename` varchar(1000) DEFAULT NULL,
  `excelnameid` int(11) NOT NULL DEFAULT '0',
  `locationid` varchar(1000) DEFAULT NULL,
  `stateid` varchar(1000) DEFAULT NULL,
  `LAN_NUMBER` int(11) NOT NULL DEFAULT '0',
  `PRODUCT` varchar(1000) DEFAULT NULL,
  `SrNo` int(11) NOT NULL DEFAULT '0',
  `Account_No` varchar(1000) DEFAULT NULL,
  `App_Id` varchar(1000) DEFAULT NULL,
  `Bkt` varchar(1000) DEFAULT NULL,
  `Customer_Name` varchar(1000) DEFAULT NULL,
  `Fathers_name` varchar(1000) DEFAULT NULL,
  `Asset_Make` varchar(1000) DEFAULT NULL,
  `Branch` varchar(1000) DEFAULT NULL,
  `State` varchar(1000) DEFAULT NULL,
  `Due_Month` varchar(1000) DEFAULT NULL,
  `Allocation_Date` varchar(1000) DEFAULT NULL,
  `Allocation_CODE` varchar(1000) DEFAULT NULL,
  `Bounce_Reason` varchar(1000) DEFAULT NULL,
  `Loan_amount` varchar(1000) DEFAULT NULL,
  `Loan_booking_Date` varchar(1000) DEFAULT NULL,
  `Loan_maturity_date` varchar(1000) DEFAULT NULL,
  `Frist_Emi_Date` varchar(1000) DEFAULT NULL,
  `Due_date` varchar(1000) DEFAULT NULL,
  `Emi_amount` varchar(1000) DEFAULT NULL,
  `Installment_Overdue_Amount` varchar(1000) DEFAULT NULL,
  `Bcc` varchar(1000) DEFAULT NULL,
  `Lpp` varchar(1000) DEFAULT NULL,
  `Total_penlty` varchar(1000) DEFAULT NULL,
  `Principal_outstanding` varchar(1000) DEFAULT NULL,
  `Vehicle_Registration_No` varchar(1000) DEFAULT NULL,
  `Supplier` varchar(1000) DEFAULT NULL,
  `Tenure` varchar(1000) DEFAULT NULL,
  `Customer_Address` varchar(1000) DEFAULT NULL,
  `Contact_Number` varchar(1000) DEFAULT NULL,
  `Collection_Manager` varchar(1000) DEFAULT NULL,
  `State_Manager` varchar(1000) DEFAULT NULL,
  `Ref_1_Name` varchar(1000) DEFAULT NULL,
  `Contact_Detail` varchar(1000) DEFAULT NULL,
  `Ref_2_Name` varchar(1000) DEFAULT NULL,
  `Contact_Detail_ref2` varchar(1000) DEFAULT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `is_assignto_am` int(11) NOT NULL DEFAULT '1',
  `agencyid` int(11) DEFAULT '0',
  `assign_am_datetime` varchar(50) DEFAULT NULL,
  `agencymanagerid` int(11) NOT NULL DEFAULT '0',
  `am_accaptance` int(11) NOT NULL DEFAULT '1',
  `is_assignto_as` int(11) NOT NULL DEFAULT '1',
  `assign_as_datetime` varchar(50) DEFAULT NULL,
  `agencysupervisorid` int(11) NOT NULL DEFAULT '0',
  `is_assignto_fos` int(11) NOT NULL DEFAULT '0',
  `assign_fos_datetime` varchar(50) DEFAULT NULL,
  `fosid` int(11) NOT NULL DEFAULT '0',
  `fos_completed` int(11) NOT NULL DEFAULT '0',
  `AlternetMobileNo` varchar(250) DEFAULT NULL,
  `fos_completed_status` int(11) NOT NULL DEFAULT '0',
  `fos_comment` varchar(1000) DEFAULT NULL,
  `ptp_datetime` varchar(50) DEFAULT NULL,
  `fos_submit_datetime` varchar(50) DEFAULT NULL,
  `Payment_Collected_Date` varchar(50) DEFAULT NULL,
  `Payment_Collected_Amount` int(11) DEFAULT '0',
  `LastPaymentDate` varchar(50) DEFAULT NULL,
  `penal` int(11) NOT NULL DEFAULT '0',
  `totalamt` int(11) NOT NULL DEFAULT '0',
  `updatedate` varchar(50) DEFAULT NULL,
  `Pincode` varchar(50) DEFAULT NULL,
  `reason` varchar(1000) DEFAULT NULL,
  `runsheet` int(11) NOT NULL DEFAULT '0',
  `runsheetsequnce` int(11) NOT NULL DEFAULT '1000',
  `PTP_Date` varchar(250) DEFAULT NULL,
  `PTP_Amount` varchar(250) DEFAULT NULL,
  `Time_Slot` varchar(250) DEFAULT NULL,
  `annexureid` varchar(15) DEFAULT NULL,
  `customer_city` varchar(100) DEFAULT NULL,
  `customer_city_id` int(11) DEFAULT NULL,
  `withdraw_date` varchar(25) DEFAULT NULL,
  `return_date` varchar(25) DEFAULT NULL,
  `withdraw_reason` varchar(250) DEFAULT NULL,
  `visit_address` varchar(250) DEFAULT NULL,
  `alternate_contact_number` varchar(60) DEFAULT NULL,
  `is_photo_uploaded` int(11) NOT NULL DEFAULT '0',
  `excel_return_date` varchar(50) DEFAULT NULL,
  `error_upload` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `companyemployee`
--

CREATE TABLE `companyemployee` (
  `companyemployeeid` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `loginid` varchar(250) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `salt` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `districtId` int(11) NOT NULL,
  `districtName` varchar(250) DEFAULT NULL,
  `stateId` int(11) NOT NULL DEFAULT '0',
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `error_application`
--

CREATE TABLE `error_application` (
  `applicationid` int(11) NOT NULL,
  `uniqueId` varchar(1000) DEFAULT NULL,
  `agency` varchar(1000) DEFAULT NULL,
  `excelfilename` varchar(1000) DEFAULT NULL,
  `excelnameid` int(11) NOT NULL DEFAULT '0',
  `locationid` varchar(1000) DEFAULT NULL,
  `stateid` varchar(1000) DEFAULT NULL,
  `LAN_NUMBER` int(11) NOT NULL DEFAULT '0',
  `PRODUCT` varchar(1000) DEFAULT NULL,
  `SrNo` int(11) NOT NULL DEFAULT '0',
  `Account_No` varchar(1000) DEFAULT NULL,
  `App_Id` varchar(1000) DEFAULT NULL,
  `Bkt` varchar(1000) DEFAULT NULL,
  `Customer_Name` varchar(1000) DEFAULT NULL,
  `Fathers_name` varchar(1000) DEFAULT NULL,
  `Asset_Make` varchar(1000) DEFAULT NULL,
  `Branch` varchar(1000) DEFAULT NULL,
  `State` varchar(1000) DEFAULT NULL,
  `Due_Month` varchar(1000) DEFAULT NULL,
  `Allocation_Date` varchar(1000) DEFAULT NULL,
  `Allocation_CODE` varchar(1000) DEFAULT NULL,
  `Bounce_Reason` varchar(1000) DEFAULT NULL,
  `Loan_amount` varchar(1000) DEFAULT NULL,
  `Loan_booking_Date` varchar(1000) DEFAULT NULL,
  `Loan_maturity_date` varchar(1000) DEFAULT NULL,
  `Frist_Emi_Date` varchar(1000) DEFAULT NULL,
  `Due_date` varchar(1000) DEFAULT NULL,
  `Emi_amount` varchar(1000) DEFAULT NULL,
  `Installment_Overdue_Amount` varchar(1000) DEFAULT NULL,
  `Bcc` varchar(1000) DEFAULT NULL,
  `Lpp` varchar(1000) DEFAULT NULL,
  `Total_penlty` varchar(1000) DEFAULT NULL,
  `Principal_outstanding` varchar(1000) DEFAULT NULL,
  `Vehicle_Registration_No` varchar(1000) DEFAULT NULL,
  `Supplier` varchar(1000) DEFAULT NULL,
  `Tenure` varchar(1000) DEFAULT NULL,
  `Customer_Address` text,
  `Contact_Number` varchar(1000) DEFAULT NULL,
  `Collection_Manager` varchar(1000) DEFAULT NULL,
  `State_Manager` varchar(1000) DEFAULT NULL,
  `Ref_1_Name` varchar(1000) DEFAULT NULL,
  `Contact_Detail` varchar(1000) DEFAULT NULL,
  `Ref_2_Name` varchar(1000) DEFAULT NULL,
  `Contact_Detail_ref2` varchar(1000) DEFAULT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `is_assignto_am` int(11) NOT NULL DEFAULT '1',
  `agencyid` int(11) DEFAULT '0',
  `assign_am_datetime` varchar(50) DEFAULT NULL,
  `agencymanagerid` int(11) NOT NULL DEFAULT '0',
  `am_accaptance` int(11) NOT NULL DEFAULT '1',
  `is_assignto_as` int(11) NOT NULL DEFAULT '1',
  `assign_as_datetime` varchar(50) DEFAULT NULL,
  `agencysupervisorid` int(11) NOT NULL DEFAULT '0',
  `is_assignto_fos` int(11) NOT NULL DEFAULT '0',
  `assign_fos_datetime` varchar(50) DEFAULT NULL,
  `fosid` int(11) NOT NULL DEFAULT '0',
  `fos_completed` int(11) NOT NULL DEFAULT '0',
  `fos_completed_status` int(11) NOT NULL DEFAULT '0',
  `fos_comment` varchar(1000) DEFAULT NULL,
  `AlternetMobileNo` varchar(250) DEFAULT NULL,
  `ptp_datetime` varchar(50) DEFAULT NULL,
  `fos_submit_datetime` varchar(50) DEFAULT NULL,
  `Payment_Collected_Date` varchar(50) DEFAULT NULL,
  `Payment_Collected_Amount` int(11) DEFAULT '0',
  `LastPaymentDate` varchar(50) DEFAULT NULL,
  `penal` int(11) NOT NULL DEFAULT '0',
  `totalamt` int(11) NOT NULL DEFAULT '0',
  `updatedate` varchar(50) DEFAULT NULL,
  `Pincode` varchar(50) DEFAULT NULL,
  `reason` varchar(1000) DEFAULT NULL,
  `runsheet` int(11) NOT NULL DEFAULT '0',
  `runsheetsequnce` int(11) NOT NULL DEFAULT '1000',
  `PTP_Date` varchar(250) DEFAULT NULL,
  `PTP_Amount` varchar(250) DEFAULT NULL,
  `Time_Slot` varchar(250) DEFAULT NULL,
  `annexureid` varchar(15) DEFAULT NULL,
  `customer_city` varchar(100) DEFAULT NULL,
  `customer_city_id` int(11) DEFAULT NULL,
  `withdraw_date` varchar(50) DEFAULT NULL,
  `return_date` varchar(50) DEFAULT NULL,
  `withdraw_reason` varchar(250) DEFAULT NULL,
  `visit_address` text,
  `alternate_contact_number` varchar(60) DEFAULT NULL,
  `is_photo_uploaded` int(11) NOT NULL DEFAULT '0',
  `excel_return_date` varchar(50) DEFAULT NULL,
  `error_upload` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `excelname`
--

CREATE TABLE `excelname` (
  `excelnameid` int(11) NOT NULL,
  `excelname` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formdetail`
--

CREATE TABLE `formdetail` (
  `formDetailId` int(11) NOT NULL,
  `formId` int(11) NOT NULL DEFAULT '0',
  `excelColumnName` varchar(1000) DEFAULT NULL,
  `dbColumnName` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formtype`
--

CREATE TABLE `formtype` (
  `formId` int(11) NOT NULL,
  `formName` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foshistory`
--

CREATE TABLE `foshistory` (
  `foshistoryid` int(11) NOT NULL,
  `appid` int(11) DEFAULT NULL,
  `fosid` varchar(250) DEFAULT NULL,
  `status` varchar(1000) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `ptp_datetime` varchar(50) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fosstatusdrropdown`
--

CREATE TABLE `fosstatusdrropdown` (
  `fosstatusdrropdownid` int(11) NOT NULL,
  `status` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationId` int(11) NOT NULL,
  `locationName` varchar(1000) DEFAULT NULL,
  `stateId` int(11) NOT NULL DEFAULT '0',
  `cityId` int(11) NOT NULL DEFAULT '0',
  `districtId` int(11) NOT NULL DEFAULT '0',
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productname` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returncasehistory`
--

CREATE TABLE `returncasehistory` (
  `returncasehistory` int(11) NOT NULL,
  `appid` int(11) DEFAULT NULL,
  `acno` varchar(1000) DEFAULT NULL,
  `agnecyname` varchar(1000) DEFAULT NULL,
  `agencyid` int(11) DEFAULT NULL,
  `reason` varchar(1000) DEFAULT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateId` int(11) NOT NULL,
  `stateName` varchar(100) NOT NULL,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TABLE28`
--

CREATE TABLE `TABLE28` (
  `COL 1` varchar(11) DEFAULT NULL,
  `COL 2` varchar(21) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tchistory`
--

CREATE TABLE `tchistory` (
  `tchistoryid` int(11) NOT NULL,
  `applicationid` int(11) DEFAULT NULL,
  `tcid` int(11) DEFAULT NULL,
  `ptpredate` varchar(50) DEFAULT NULL,
  `tccomment` text,
  `strEntryDate` varchar(50) DEFAULT NULL,
  `strIP` varchar(20) DEFAULT NULL,
  `istatus` int(11) NOT NULL DEFAULT '1',
  `isDelete` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `appid` varchar(250) DEFAULT NULL,
  `fosid` varchar(250) DEFAULT NULL,
  `iFosId` int(11) DEFAULT NULL,
  `iApplicationId` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`Agencyid`);

--
-- Indexes for table `agencymanager`
--
ALTER TABLE `agencymanager`
  ADD PRIMARY KEY (`agencymanagerid`);

--
-- Indexes for table `agencymanagerlocation`
--
ALTER TABLE `agencymanagerlocation`
  ADD PRIMARY KEY (`agencymanagerlocationid`);

--
-- Indexes for table `agncylocation`
--
ALTER TABLE `agncylocation`
  ADD PRIMARY KEY (`agncylocationid`);

--
-- Indexes for table `annexuremaster`
--
ALTER TABLE `annexuremaster`
  ADD PRIMARY KEY (`annexuremasterid`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applicationid`);

--
-- Indexes for table `applicationlog`
--
ALTER TABLE `applicationlog`
  ADD PRIMARY KEY (`applicationlogid`);

--
-- Indexes for table `applicationphotos`
--
ALTER TABLE `applicationphotos`
  ADD PRIMARY KEY (`applicationphotosid`);

--
-- Indexes for table `bkt`
--
ALTER TABLE `bkt`
  ADD PRIMARY KEY (`bktid`);

--
-- Indexes for table `centralmanager`
--
ALTER TABLE `centralmanager`
  ADD PRIMARY KEY (`centralmanagerid`);

--
-- Indexes for table `centralmanagerlocation`
--
ALTER TABLE `centralmanagerlocation`
  ADD PRIMARY KEY (`centralmanagerlocationid`);

--
-- Indexes for table `colleted_application`
--
ALTER TABLE `colleted_application`
  ADD PRIMARY KEY (`applicationid`);

--
-- Indexes for table `companyemployee`
--
ALTER TABLE `companyemployee`
  ADD PRIMARY KEY (`companyemployeeid`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtId`);

--
-- Indexes for table `error_application`
--
ALTER TABLE `error_application`
  ADD PRIMARY KEY (`applicationid`);

--
-- Indexes for table `excelname`
--
ALTER TABLE `excelname`
  ADD PRIMARY KEY (`excelnameid`);

--
-- Indexes for table `formdetail`
--
ALTER TABLE `formdetail`
  ADD PRIMARY KEY (`formDetailId`);

--
-- Indexes for table `formtype`
--
ALTER TABLE `formtype`
  ADD PRIMARY KEY (`formId`);

--
-- Indexes for table `foshistory`
--
ALTER TABLE `foshistory`
  ADD PRIMARY KEY (`foshistoryid`);

--
-- Indexes for table `fosstatusdrropdown`
--
ALTER TABLE `fosstatusdrropdown`
  ADD PRIMARY KEY (`fosstatusdrropdownid`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `returncasehistory`
--
ALTER TABLE `returncasehistory`
  ADD PRIMARY KEY (`returncasehistory`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateId`);

--
-- Indexes for table `tchistory`
--
ALTER TABLE `tchistory`
  ADD PRIMARY KEY (`tchistoryid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`iApplicationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `Agencyid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agencymanager`
--
ALTER TABLE `agencymanager`
  MODIFY `agencymanagerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agencymanagerlocation`
--
ALTER TABLE `agencymanagerlocation`
  MODIFY `agencymanagerlocationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agncylocation`
--
ALTER TABLE `agncylocation`
  MODIFY `agncylocationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annexuremaster`
--
ALTER TABLE `annexuremaster`
  MODIFY `annexuremasterid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applicationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicationlog`
--
ALTER TABLE `applicationlog`
  MODIFY `applicationlogid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicationphotos`
--
ALTER TABLE `applicationphotos`
  MODIFY `applicationphotosid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bkt`
--
ALTER TABLE `bkt`
  MODIFY `bktid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `centralmanager`
--
ALTER TABLE `centralmanager`
  MODIFY `centralmanagerid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `centralmanagerlocation`
--
ALTER TABLE `centralmanagerlocation`
  MODIFY `centralmanagerlocationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companyemployee`
--
ALTER TABLE `companyemployee`
  MODIFY `companyemployeeid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `districtId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `error_application`
--
ALTER TABLE `error_application`
  MODIFY `applicationid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `excelname`
--
ALTER TABLE `excelname`
  MODIFY `excelnameid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formdetail`
--
ALTER TABLE `formdetail`
  MODIFY `formDetailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formtype`
--
ALTER TABLE `formtype`
  MODIFY `formId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foshistory`
--
ALTER TABLE `foshistory`
  MODIFY `foshistoryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fosstatusdrropdown`
--
ALTER TABLE `fosstatusdrropdown`
  MODIFY `fosstatusdrropdownid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returncasehistory`
--
ALTER TABLE `returncasehistory`
  MODIFY `returncasehistory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tchistory`
--
ALTER TABLE `tchistory`
  MODIFY `tchistoryid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
