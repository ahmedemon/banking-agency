-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 04, 2021 at 03:07 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `somiti_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` bigint UNSIGNED NOT NULL,
  `associate_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `areas_branch_id_foreign` (`branch_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_of_purchase` date NOT NULL,
  `retired_date` date NOT NULL,
  `asset_in_year` int NOT NULL,
  `category` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` int NOT NULL,
  `description` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cost` int NOT NULL,
  `model_number` int NOT NULL,
  `warrenty_gurentee` tinyint(1) NOT NULL,
  `asset_in_month` int NOT NULL,
  `supplier_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept_type` tinyint(1) NOT NULL,
  `percent` decimal(8,2) NOT NULL,
  `serial` int NOT NULL,
  `capture` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual_number` int NOT NULL,
  `vou_scan_copy` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_lists`
--

DROP TABLE IF EXISTS `bank_lists`;
CREATE TABLE IF NOT EXISTS `bank_lists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` int NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch_lists`
--

DROP TABLE IF EXISTS `branch_lists`;
CREATE TABLE IF NOT EXISTS `branch_lists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_lists`
--

INSERT INTO `branch_lists` (`id`, `name`, `address`, `hotline`, `created_at`, `updated_at`) VALUES
(1, 'Main Branch', 'Khulna', '0132567890', NULL, NULL),
(2, 'Khulna Branch', 'Khulna', '0132567890', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `closing_accounts`
--

DROP TABLE IF EXISTS `closing_accounts`;
CREATE TABLE IF NOT EXISTS `closing_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fdr_id` bigint UNSIGNED NOT NULL,
  `fdr_account` int NOT NULL,
  `start_date` date NOT NULL,
  `passed_month` int NOT NULL,
  `fdr_payable_amount` int NOT NULL,
  `final_profit` int NOT NULL,
  `note` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `closing_accounts_fdr_id_foreign` (`fdr_id`),
  KEY `closing_accounts_fdr_account_foreign` (`fdr_account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `current_accounts`
--

DROP TABLE IF EXISTS `current_accounts`;
CREATE TABLE IF NOT EXISTS `current_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `account` int NOT NULL,
  `deposit_amount` int DEFAULT NULL,
  `withdraw` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `posted_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `current_accounts_account_foreign` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `director_lists`
--

DROP TABLE IF EXISTS `director_lists`;
CREATE TABLE IF NOT EXISTS `director_lists` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int NOT NULL,
  `designation` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int NOT NULL,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `biography` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `director_photo` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_diposits`
--

DROP TABLE IF EXISTS `fixed_diposits`;
CREATE TABLE IF NOT EXISTS `fixed_diposits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` int NOT NULL,
  `scheme_id` bigint UNSIGNED NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `months` tinyint NOT NULL,
  `amount` int NOT NULL,
  `percent` decimal(8,2) NOT NULL,
  `note` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capture` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capture2` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fixed_diposits_account_foreign` (`account`),
  KEY `fixed_diposits_scheme_id_foreign` (`scheme_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_diposit_profits`
--

DROP TABLE IF EXISTS `fixed_diposit_profits`;
CREATE TABLE IF NOT EXISTS `fixed_diposit_profits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fdr_id` bigint UNSIGNED NOT NULL,
  `profit` int DEFAULT NULL,
  `month` int NOT NULL,
  `year` int NOT NULL,
  `withdraw` int NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fixed_diposit_profits_fdr_id_foreign` (`fdr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_diposit_schemes`
--

DROP TABLE IF EXISTS `fixed_diposit_schemes`;
CREATE TABLE IF NOT EXISTS `fixed_diposit_schemes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL,
  `duration` int NOT NULL,
  `profit` int NOT NULL,
  `note` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_ac_transactions`
--

DROP TABLE IF EXISTS `general_ac_transactions`;
CREATE TABLE IF NOT EXISTS `general_ac_transactions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `account` int NOT NULL,
  `deposit` int DEFAULT NULL,
  `withdraw` int DEFAULT NULL,
  `profit` int DEFAULT NULL,
  `note` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processed_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `general_ac_transactions_account_foreign` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '2021-11-04',
  `expire_date` date NOT NULL,
  `scheme` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` int NOT NULL,
  `loan_amount` int NOT NULL,
  `percent` int NOT NULL,
  `installment` int NOT NULL,
  `collection_start` int NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `open_fee` int DEFAULT NULL,
  `insurance_fee` int DEFAULT NULL,
  `penalty_capital` int DEFAULT NULL,
  `sequence` int DEFAULT NULL,
  `ledger_no` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `security_docs` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_duration` int DEFAULT NULL,
  `reference_acc` int DEFAULT NULL,
  `processed_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_at` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loans_account_id_foreign` (`account_id`),
  KEY `loans_category_id_foreign` (`category_id`),
  KEY `loans_reference_acc_foreign` (`reference_acc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_applications`
--

DROP TABLE IF EXISTS `loan_applications`;
CREATE TABLE IF NOT EXISTS `loan_applications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `member_id` int NOT NULL,
  `member_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_f_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_m_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expect_loan_details` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acount_type` int NOT NULL,
  `loan_reason` int NOT NULL,
  `previous_loan` int NOT NULL,
  `loan_collection_method` int NOT NULL,
  `bank_check_details` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_number` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_age` int NOT NULL,
  `current_address` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_phone` int NOT NULL,
  `bank_account` int NOT NULL,
  `loan_type` int NOT NULL,
  `total_deposit` int NOT NULL,
  `expect_loan_amount` int NOT NULL,
  `expect_loan_amount_percentage` decimal(8,2) NOT NULL,
  `yearly_income` int NOT NULL,
  `member_profession` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_year` int NOT NULL,
  `total_salary` int NOT NULL,
  `family_member` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_or_owner` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_ownership` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licence_issue_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_application_references`
--

DROP TABLE IF EXISTS `loan_application_references`;
CREATE TABLE IF NOT EXISTS `loan_application_references` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ref1_nid_no` int DEFAULT NULL,
  `ref1_name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref1_profession` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref1_have_previous_loan` int DEFAULT NULL,
  `ref1_releation` int DEFAULT NULL,
  `ref1_mobile_no` int DEFAULT NULL,
  `ref1_quranted_sign` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_categories`
--

DROP TABLE IF EXISTS `loan_categories`;
CREATE TABLE IF NOT EXISTS `loan_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_rate` int NOT NULL,
  `duration` int NOT NULL,
  `max_amount` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_closing_accounts`
--

DROP TABLE IF EXISTS `loan_closing_accounts`;
CREATE TABLE IF NOT EXISTS `loan_closing_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` int NOT NULL,
  `closing_date` date NOT NULL,
  `penalty` int NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `collect` int NOT NULL,
  `note` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processed_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_at` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loan_closing_accounts_account_foreign` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_installments`
--

DROP TABLE IF EXISTS `loan_installments`;
CREATE TABLE IF NOT EXISTS `loan_installments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `loan_id` bigint UNSIGNED NOT NULL,
  `installment_no` int NOT NULL,
  `date` date NOT NULL DEFAULT '2021-11-04',
  `amount` int NOT NULL,
  `penalty` int DEFAULT NULL,
  `note` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processed_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loan_installments_loan_id_foreign` (`loan_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` int DEFAULT NULL,
  `join` date DEFAULT NULL,
  `area_id` bigint UNSIGNED NOT NULL,
  `m_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_mobile` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_birthday` date DEFAULT NULL,
  `m_father` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_mother` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_companion` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_nid` int DEFAULT NULL,
  `m_gender` int DEFAULT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_mobile` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_village` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_post` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_thana` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_district` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_village` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_post` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_thana` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_district` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_photo` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_signature` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_attachment` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_fee` int DEFAULT NULL,
  `form_fee` int DEFAULT NULL,
  `regular_savings` int NOT NULL DEFAULT '50',
  `active` tinyint(1) DEFAULT NULL,
  `is_active_generalac` int NOT NULL DEFAULT '1',
  `n_name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_relation` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_father` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_mother` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_nid` int DEFAULT NULL,
  `n_mobile` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_photo` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_village` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_post` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_thana` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `n_district` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `members_account_unique` (`account`),
  KEY `members_area_id_foreign` (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_06_070244_create_permission_tables', 1),
(6, '2021_10_07_045936_create_staffs_table', 1),
(7, '2021_10_09_071245_create_staff_roles_table', 1),
(8, '2021_10_09_095235_create_branch_lists_table', 1),
(9, '2021_10_09_170505_create_areas_table', 1),
(10, '2021_10_10_103647_create_director_lists_table', 1),
(11, '2021_10_10_105953_create_members_table', 1),
(12, '2021_10_11_112706_create_outloans_table', 1),
(13, '2021_10_12_061341_create_bank_lists_table', 1),
(14, '2021_10_12_081106_create_savings_schemes_table', 1),
(15, '2021_10_12_081518_create_savings_table', 1),
(16, '2021_10_12_084000_create_voucher_categories_table', 1),
(17, '2021_10_12_100316_create_loan_categories_table', 1),
(18, '2021_10_12_122138_create_fixed_diposit_schemes_table', 1),
(19, '2021_10_13_034149_create_savings_balances_table', 1),
(20, '2021_10_13_120333_create_assets_table', 1),
(21, '2021_10_14_095638_create_fixed_diposits_table', 1),
(22, '2021_10_17_034318_create_profits_table', 1),
(23, '2021_10_17_053620_create_loans_table', 1),
(24, '2021_10_17_192137_create_general_ac_transactions_table', 1),
(25, '2021_10_18_042209_create_loan_applications_table', 1),
(26, '2021_10_18_042309_create_loan_application_references_table', 1),
(27, '2021_10_18_045201_create_loan_installments_table', 1),
(28, '2021_10_20_085239_add_role_column_to_user_table', 1),
(29, '2021_10_23_103953_create_closing_accounts_table', 1),
(30, '2021_10_24_103840_create_current_accounts_table', 1),
(31, '2021_10_27_165405_create_loan_closing_accounts_table', 1),
(32, '2021_10_30_114305_create_savings_closings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `outloans`
--

DROP TABLE IF EXISTS `outloans`;
CREATE TABLE IF NOT EXISTS `outloans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int NOT NULL,
  `company` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int DEFAULT NULL,
  `interest` int DEFAULT NULL,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

DROP TABLE IF EXISTS `savings`;
CREATE TABLE IF NOT EXISTS `savings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheme_id` bigint UNSIGNED NOT NULL,
  `account_id` int NOT NULL,
  `start_date` date NOT NULL,
  `opening_charge` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_after` int DEFAULT NULL,
  `ledger_no` int DEFAULT NULL,
  `installment` int NOT NULL,
  `savings_amount` int NOT NULL,
  `interest_percent` int NOT NULL,
  `penalty` int DEFAULT NULL,
  `expire_date` date NOT NULL,
  `holiday` tinyint(1) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `savings_code_unique` (`code`),
  KEY `savings_scheme_id_foreign` (`scheme_id`),
  KEY `savings_account_id_foreign` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savings_balances`
--

DROP TABLE IF EXISTS `savings_balances`;
CREATE TABLE IF NOT EXISTS `savings_balances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `savings_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL DEFAULT '2021-11-04',
  `deposit` int DEFAULT NULL,
  `withdraw` int DEFAULT NULL,
  `profit` int DEFAULT NULL,
  `penalty` int DEFAULT NULL,
  `note` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processed_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `savings_balances_code_unique` (`code`),
  KEY `savings_balances_savings_id_foreign` (`savings_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savings_closings`
--

DROP TABLE IF EXISTS `savings_closings`;
CREATE TABLE IF NOT EXISTS `savings_closings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `savings_id` bigint UNSIGNED NOT NULL,
  `withdraw` int NOT NULL,
  `note` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `savings_closings_savings_id_foreign` (`savings_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `savings_schemes`
--

DROP TABLE IF EXISTS `savings_schemes`;
CREATE TABLE IF NOT EXISTS `savings_schemes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` int NOT NULL,
  `note` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `join` date DEFAULT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `father` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` bigint DEFAULT NULL,
  `gender` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` tinyint DEFAULT NULL,
  `user_role` tinyint DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `branch` tinyint DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `interview` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_money` int DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `house` int DEFAULT NULL,
  `medical` int DEFAULT NULL,
  `convenience` int DEFAULT NULL,
  `transport` int DEFAULT NULL,
  `mobile_bill` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_roles`
--

DROP TABLE IF EXISTS `staff_roles`;
CREATE TABLE IF NOT EXISTS `staff_roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_designation` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staff_roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_roles`
--

INSERT INTO `staff_roles` (`id`, `name`, `guard_name`, `role_designation`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', 'Admin', '2021-11-03 21:07:02', '2021-11-03 21:07:02'),
(2, 'manager', 'web', 'Manager', '2021-11-03 21:07:02', '2021-11-03 21:07:02'),
(3, 'field-officer', 'web', 'Field Officer', '2021-11-03 21:07:02', '2021-11-03 21:07:02'),
(4, 'accountant', 'web', 'Accountant', '2021-11-03 21:07:02', '2021-11-03 21:07:02'),
(5, 'other', 'web', 'Other', '2021-11-03 21:07:02', '2021-11-03 21:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '2021-11-03 21:07:02', '$2y$10$lkOGtbipTMYzGCSWeUSuz.Y5M7WmN6gTCZUYBNmUfuOpCCM3ZgaSy', '1y6vKeZuzE', NULL, NULL),
(2, 'Arman Arif', 'armanarif', 'dev@armanarif.com', '2021-11-03 21:07:03', '$2y$10$.JfLkBFhQgyzCownWg2vM.eCr33LX0s37TGQobTCQ1N2ayvOVpjee', 'U5Lp2BVWkj', NULL, NULL),
(3, 'Ahmed Emon', 'ahmedemon', 'ahmedemon@gmail.com', '2021-11-03 21:07:03', '$2y$10$xEj/WwTse9zCk3/0VuLGQeM9tdnUi6leGIOdurdhrBvo4ZNfEwmxO', 'DFsK7hVjze', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_categories`
--

DROP TABLE IF EXISTS `voucher_categories`;
CREATE TABLE IF NOT EXISTS `voucher_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_link` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
