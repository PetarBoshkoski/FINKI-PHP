<?php
$host = 'localhost';
$db = 'lab03';
$user = 'root';
$pass = '';
$charset="utf8mb4";

$conn = null;
try {
    $conn = new PDO("mysql:host=$host;dbname=$db; charset=$charset", $user, $pass);
   $sql ="
    DROP TABLE IF EXISTS `news` ;
    CREATE TABLE IF NOT EXISTS `news` (
      `news_id` INT NOT NULL AUTO_INCREMENT,
      `date` DATETIME NOT NULL,
      `news_title` VARCHAR(45) NOT NULL,
      `full_text` TEXT NOT NULL,
      PRIMARY KEY (`news_id`))
    ENGINE = InnoDB;
    
     DROP TABLE IF EXISTS `comments` ;
     CREATE TABLE IF NOT EXISTS `comments` (
          `comment_id` INT NOT NULL AUTO_INCREMENT,
          `news_id` INT NOT NULL,
          `author` VARCHAR(45) NOT NULL,
          `comment` TINYTEXT NOT NULL,
          `approved` TINYINT(1) NULL DEFAULT 0,
          PRIMARY KEY (`comment_id`),
          INDEX `nid_idx` (`news_id` ASC),
          CONSTRAINT `news_id`
            FOREIGN KEY (`news_id`)
            REFERENCES `news` (`news_id`)
            ON DELETE CASCADE
            ON UPDATE CASCADE)
    ENGINE = InnoDB;
            
    SET SQL_MODE=@OLD_SQL_MODE;
    SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
    SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;";
    $conn->query($sql);

} catch (PDOException $pe){
    die("Could not connect: ". $pe->getMessage());
}
