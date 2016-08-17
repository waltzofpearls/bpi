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
-- 1. Add ndw column company_id to companies table,
-- 2. Add mew tabble countries, which will be consisted of two columns country_id and name.
-- 3. Add new table company_countries that will store one (company) to many (countries)
--    relations with two columns company_id and country_id.
