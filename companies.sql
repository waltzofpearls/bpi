-- Explicitly set a charset
SET NAMES utf8;

CREATE TABLE IF NOT EXISTS `companies` (
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
);

TRUNCATE TABLE `companies`;

INSERT INTO `companies` (`name`, `description`) VALUES
('Abarca', 'Abarca is a premiere insurance company, offering coverage to millions.'),
('Aetna', 'Aetna is also a wonderful insurance company.'),
('Blue Cross', 'Blue Cross is an even better company.');

-- For Question 2
-- 1. Add new column `id` to `companies` table.
-- CREATE TABLE IF NOT EXISTS `companies` (
--   `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   `name` varchar(100) NOT NULL,
--   `description` text NOT NULL
-- );
--
-- 2. Add mew table `states`, which will be consisted of two columns `id` and `name`.
-- CREATE TABLE IF NOT EXISTS `states` (
--   `id` int(2) NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   `name` varchar(50) NOT NULL
-- );
--
-- 3. Add new table `company_states` that will store one (`company`) to many (`states`)
--    relations with two columns `company_id` and `state_id`.
-- CREATE TABLE IF NOT EXISTS `company_states` (
--   `company_id` int(10) NOT NULL,
--   `state_id` int(2) NOT NULL,
--   CONSTRAINT `uc_company_state` UNIQUE (`company_id`, `state_id`)
-- );
