/*******************************************************************************************************************
 * @file schema.sq;
 * @author Kumar Aditya
 * @version 1.0
 * @date 15-05-2020
 * @rahuladitya303
********************************************************************************************************************/

CREATE TABLE `sensordata` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `temperature` DOUBLE NOT NULL,
    `humidity` DECIMAL NOT NULL,
    `datetime` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;
