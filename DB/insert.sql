#lines

INSERT INTO `looper`.`lines` (`kind`) VALUES ('Single line text');
INSERT INTO `looper`.`lines` (`kind`) VALUES ('List of single lines');
INSERT INTO `looper`.`lines` (`kind`) VALUES ('Multi-line text');

#state

INSERT INTO `looper`.`states` (`name`) VALUES ('Building');
INSERT INTO `looper`.`states` (`name`) VALUES ('Answering');
INSERT INTO `looper`.`states` (`name`) VALUES ('Closed');


#exercices

INSERT INTO `looper`.`exercices` (`title`) VALUES ('nom');
INSERT INTO `looper`.`exercices` (`title`) VALUES ('tz');
INSERT INTO `looper`.`exercices` (`title`) VALUES ('54');
INSERT INTO `looper`.`exercices` (`title`) VALUES ('ztzu');
INSERT INTO `looper`.`exercices` (`title`) VALUES ('tt');
INSERT INTO `looper`.`exercices` (`title`) VALUES ('t5646z');
INSERT INTO `looper`.`exercices` (`title`) VALUES ('t');
INSERT INTO `looper`.`exercices` (`title`) VALUES ('ztzru');
INSERT INTO `looper`.`exercices` (`title`) VALUES ('z657u');
INSERT INTO `looper`.`exercices` (`title`) VALUES ('657');

#fields

INSERT INTO `looper`.`fields` (`label`, `exercices_id`) VALUES ('0 ou 5', '1');
INSERT INTO `looper`.`fields` (`label`, `exercices_id`) VALUES ('tz0 ou 5rz', '2');
INSERT INTO `looper`.`fields` (`label`, `exercices_id`) VALUES ('t0 ou 5zrz', '2');
INSERT INTO `looper`.`fields` (`label`, `exercices_id`) VALUES ('tzr0 ou 5z', '1');
INSERT INTO `looper`.`fields` (`label`, `exercices_id`) VALUES ('tzrz', '4');
INSERT INTO `looper`.`fields` (`label`, `exercices_id`) VALUES ('tzrz0 ou 5', '4');
INSERT INTO `looper`.`fields` (`label`, `exercices_id`) VALUES ('0 ou 5tzrz', '7');
INSERT INTO `looper`.`fields` (`label`, `exercices_id`) VALUES ('t0 ou 5zr0 ou 5z', '7');


#answer

INSERT INTO `looper`.`answers` (`answer`, `fields_id`, `exercices_id`) VALUES ('546', '1', '1');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`, `exercices_id`) VALUES ('546', '2', '2');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`, `exercices_id`) VALUES ('546', '1', '4');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`, `exercices_id`) VALUES ('546', '4', '6');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`, `exercices_id`) VALUES ('546', '2', '3');