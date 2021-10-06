#lines

INSERT INTO `looper`.`lines` (`kind`) VALUES ('Single line text');
INSERT INTO `looper`.`lines` (`kind`) VALUES ('List of single lines');
INSERT INTO `looper`.`lines` (`kind`) VALUES ('Multi-line text');

#state

INSERT INTO `looper`.`states` (`name`) VALUES ('Building');
INSERT INTO `looper`.`states` (`name`) VALUES ('Answering');
INSERT INTO `looper`.`states` (`name`) VALUES ('Closed');


#exercises

INSERT INTO `looper`.`exercises` (`title`) VALUES ('nom');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('tz');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('54');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('ztzu');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('tt');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('t5646z');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('t');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('ztzru');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('z657u');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('657');

#fields

INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('0 ou 5', '1');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('tz0 ou 5rz', '2');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('t0 ou 5zrz', '2');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('tzr0 ou 5z', '1');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('tzrz', '4');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('tzrz0 ou 5', '4');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('0 ou 5tzrz', '7');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('t0 ou 5zr0 ou 5z', '7');


#answer

INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '1');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '2');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '1');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '4');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '2');