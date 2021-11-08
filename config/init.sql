DROP DATABASE IF EXISTS yaroslav_nakonechnyi_blog;

DROP USER IF EXISTS 'yaroslav_nakonechnyi_blog_user'@'%';

CREATE DATABASE yaroslav_nakonechnyi_blog;

CREATE USER 'yaroslav_nakonechnyi_blog_user'@'%' IDENTIFIED BY '45Ya!$""sT&P*C%RNSEhr';

GRANT ALL ON yaroslav_nakonechnyi_blog.* TO 'yaroslav_nakonechnyi_blog_user'@'%';