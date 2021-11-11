DROP TABLE IF EXISTS `category_post_author`;
#--
DROP TABLE IF EXISTS `author`;
#---
DROP TABLE IF EXISTS `daily_statistics`;
#---
DROP TABLE IF EXISTS `category`;
#---
DROP TABLE IF EXISTS `post`;
#---
CREATE TABLE `post` (
    `post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post ID',
    `name` varchar(63) NOT NULL COMMENT 'Name',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    `description` varchar(4095) DEFAULT NULL COMMENT 'Description',
    `date` date NOT NULL COMMENT 'Date',
    PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Post Entity';
#--
CREATE TABLE `category` (
    `category_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Category ID',
    `name` varchar(63) NOT NULL COMMENT 'Name',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Entity';
#--
CREATE TABLE `author` (
    `author_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Author ID',
    `firstname` varchar(63) NOT NULL COMMENT 'First Name',
    `lastname` varchar(63) NOT NULL COMMENT 'Last Name',
    PRIMARY KEY (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Author Entity';
#--
CREATE TABLE `category_post_author` (
    `category_post_author_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Category Post Author ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `author_id` int unsigned NOT NULL COMMENT 'Author ID',
    `category_id` int unsigned NOT NULL COMMENT 'Category ID',
    PRIMARY KEY (`category_post_author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Post Author Entity';
#--
CREATE TABLE `daily_statistics` (
    `daily_statistics_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Daily StatisticsID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `date` date NOT NULL COMMENT 'Date',
    `views` int unsigned NOT NULL COMMENT 'Views ID',
    PRIMARY KEY (`daily_statistics_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Daily Statistics  Entity';
#--
INSERT INTO `post` (`name`, `url`, `description`, `date`)
VALUES  ( 'Post 1', 'post 1', 'This is post 1', '2021-11-01'),
        ( 'Post 2', 'post 2', 'This is post 2', '2021-11-01'),
        ( 'Post 3', 'post 3', 'This is post 3', '2021-11-01'),
        ( 'Post 4', 'post 4', 'This is post 4', '2021-11-01'),
        ( 'Post 5', 'post 5', 'This is post 5', '2021-11-01'),
        ( 'Post 6', 'post 6', 'This is post 6', '2021-11-01'),
        ( 'Post 7', 'post 7', 'This is post 7', '2021-11-01'),
        ( 'Post 8', 'post 8', 'This is post 8', '2021-11-01'),
        ( 'Post 9', 'post 9', 'This is post 9', '2021-11-01'),
        ( 'Post 10', 'post 10', 'This is post 10', '2021-11-01'),
        ( 'Post 11', 'post 11', 'This is post 11', '2021-11-01'),
        ( 'Post 12', 'post 12', 'This is post 12', '2021-11-01'),
        ( 'Post 13', 'post 13', 'This is post 13', '2021-11-01'),
        ( 'Post 14', 'post 14', 'This is post 14', '2021-11-01'),
        ( 'Post 15', 'post 15', 'This is post 15', '2021-11-01');
#--
INSERT INTO `category` (`name`, `url`)
VALUES  ('Sport', 'sport'),
        ('Movies', 'movies'),
        ('World news', 'world news'),
        ('Music', 'music'),
        ('Technology', 'technology');
#--
INSERT INTO `author` (`firstname`, `lastname`)
VALUES  ('Brian', 'Tompset'),
        ('Brock', 'Adams'),
        ('Aakash', 'Kag'),
        ('Erick', 'Bush'),
        ('Alan', 'Adams'),
        ('Nick', 'Oli'),
        ('Charls', 'Tor'),
        ('Anna', 'Kulack'),
        ('Jon', 'Palyi'),
        ('Max', 'Grinchuk'),
        ('Vita', 'Sas'),
        ('Vadim', 'Badzim'),
        ('Ulya', 'Shevchenko'),
        ('Victor', 'Marvel'),
        ('Antony', 'Taison');
#--
INSERT INTO `category_post_author` (`post_id`, `author_id`, `category_id`)
VALUES  ('1', '15', '1'),
        ('2', '14', '2'),
        ('3', '13', '3'),
        ('4', '12', '4'),
        ('5', '11', '5'),
        ('6', '10', '3'),
        ('7', '9', '1'),
        ('8', '8', '3'),
        ('9', '7', '4'),
        ('10', '6', '5'),
        ('11', '5', '2'),
        ('12', '4', '2'),
        ('13', '3', '4'),
        ('14', '2', '3'),
        ('15', '1', '1');
#--
INSERT INTO `daily_statistics` (`post_id`, `date`, `views`)
VALUES  ('1', '2021-11-01', '3'),
        ('2', '2021-11-01', '2'),
        ('3', '2021-11-01', '1'),
        ('4', '2021-11-01', '4'),
        ('5', '2021-11-01', '3'),
        ('6', '2021-11-01', '4'),
        ('7', '2021-11-01', '5'),
        ('8', '2021-11-01', '3'),
        ('9', '2021-11-01', '1'),
        ('10', '2021-11-01', '2'),
        ('11', '2021-11-01', '1'),
        ('12', '2021-11-01', '4'),
        ('13', '2021-11-01', '4'),
        ('14', '2021-11-01', '1'),
        ('15', '2021-11-01', '5');
#--
ALTER TABLE `category_post_author`
    ADD CONSTRAINT `FK_CATEGORY_POST_AUTHOR_AUTHOR_ID` FOREIGN KEY (`author_id`)
        REFERENCES `author` (`author_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_CATEGORY_POST_AUTHOR_POST_ID` FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_CATEGORY_POST_AUTHOR_CATEGORY_ID` FOREIGN KEY (`category_id`)
        REFERENCES `category` (`category_id`) ON DELETE CASCADE;
#--
ALTER TABLE `daily_statistics`
    ADD CONSTRAINT `FK_DAILY_STATISTICS_POST_ID` FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;