<?php
/**
 * Created by PhpStorm.
 * User: geniuscrossain
 * Date: 2016/9/3
 * Time: 12:57
 */
require_once ("config.php");
$mysqli = new mysqli(HOST,USERNAME,PASSWORD);
CREATE TABLE `commentsubject`.`comment` ( `id` INT NOT NULL AUTO_INCREMENT , `nickname` CHAR NOT NULL , `email` VARCHAR(40) NOT NULL , `comment` TEXT NOT NULL , `commenttime` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
?>