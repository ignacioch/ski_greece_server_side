
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- skicenter
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `skicenter`;

CREATE TABLE `skicenter`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `englishName` VARCHAR(255) NOT NULL,
    `snow_down` INTEGER,
    `snow_up` INTEGER,
    `temp` DOUBLE,
    `website` VARCHAR(255),
    `weatherurl` VARCHAR(255),
    `open` INTEGER(1),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB
    DEFAULT CHARACTER SET utf8
    COLLATE utf8_general_ci;

-- ---------------------------------------------------------------------
-- track
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `track`;

CREATE TABLE `track`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `skicenter_id` INTEGER NOT NULL,
    `difficulty` VARCHAR(40),
    `length` INTEGER,
    `open` INTEGER(1),
    PRIMARY KEY (`id`),
    INDEX `track_FI_1` (`skicenter_id`),
    CONSTRAINT `track_FK_1`
        FOREIGN KEY (`skicenter_id`)
        REFERENCES `skicenter` (`id`)
) ENGINE=InnoDB
    DEFAULT CHARACTER SET utf8
    COLLATE utf8_general_ci;

-- ---------------------------------------------------------------------
-- lift
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `lift`;

CREATE TABLE `lift`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255),
    `open` INTEGER(1),
    `skicenter_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `lift_FI_1` (`skicenter_id`),
    CONSTRAINT `lift_FK_1`
        FOREIGN KEY (`skicenter_id`)
        REFERENCES `skicenter` (`id`)
) ENGINE=InnoDB
    DEFAULT CHARACTER SET utf8
    COLLATE utf8_general_ci;

-- ---------------------------------------------------------------------
-- offer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `offer`;

CREATE TABLE `offer`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `urlimage` VARCHAR(255),
    `comments` VARCHAR(255),
    `skicenter_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `offer_FI_1` (`skicenter_id`),
    CONSTRAINT `offer_FK_1`
        FOREIGN KEY (`skicenter_id`)
        REFERENCES `skicenter` (`id`)
) ENGINE=InnoDB
    DEFAULT CHARACTER SET utf8
    COLLATE utf8_general_ci;

-- ---------------------------------------------------------------------
-- camera
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `camera`;

CREATE TABLE `camera`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `url` VARCHAR(255),
    `skicenter_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `camera_FI_1` (`skicenter_id`),
    CONSTRAINT `camera_FK_1`
        FOREIGN KEY (`skicenter_id`)
        REFERENCES `skicenter` (`id`)
) ENGINE=InnoDB
    DEFAULT CHARACTER SET utf8
    COLLATE utf8_general_ci;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
