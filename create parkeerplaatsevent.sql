CREATE TABLE if not exists `parkeerplaatsevent` (
                                                    `id_sensor` int(11) NOT NULL,
                                                    `id_stalling` int(11) NOT NULL,
                                                    `id_blok` varchar(4) NOT NULL,
                                                    `toevoeg_moment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                                    `bezet` tinyint(1) NOT NULL,
                                                    PRIMARY KEY (`id_sensor`,`toevoeg_moment`),
                                                    KEY `fk_verzinzelf3_idx` (`id_stalling`,`id_blok`),
                                                    CONSTRAINT `fk_verzinzelf4` FOREIGN KEY (`id_stalling`, `id_blok`) REFERENCES `stalling` (`id_stalling`, `id_blok`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

delete from parkeerplaatsevent;

insert into parkeerplaatsevent values (1, 1, 'A1', 20190303065000, 1);
insert into parkeerplaatsevent values (1, 1, 'A1', 20190504052823, 0);
insert into parkeerplaatsevent values (2, 1, 'A1', 20190301075000, 1);
insert into parkeerplaatsevent values (2, 1, 'A1', 20190504093120, 0);
insert into parkeerplaatsevent values (2, 1, 'A1', 20190504223024, 1);
insert into parkeerplaatsevent values (2, 1, 'A1', 20190505075407, 0);
insert into parkeerplaatsevent values (2, 1, 'A1', 20190505145056, 1);
insert into parkeerplaatsevent values (2, 1, 'A1', 20190506072508, 0);
insert into parkeerplaatsevent values (2, 1, 'A1', 20190506184828, 1);
insert into parkeerplaatsevent values (4, 1, 'A1', 20190301093000, 1);
insert into parkeerplaatsevent values (4, 1, 'A1', 20190504065819, 0);
insert into parkeerplaatsevent values (5, 2, 'A1', 20190301102000, 1);
insert into parkeerplaatsevent values (5, 1, 'A1', 20190506132039, 0);
insert into parkeerplaatsevent values (6, 2, 'A1', 20190303153500, 1);
insert into parkeerplaatsevent values (6, 1, 'A1', 20190505120604, 0);
insert into parkeerplaatsevent values (6, 2, 'A1', 20190506021455, 1);
insert into parkeerplaatsevent values (6, 2, 'A1', 20190506215858, 0);
insert into parkeerplaatsevent values (7, 2, 'A1', 20190303171000, 1);
insert into parkeerplaatsevent values (7, 1, 'A1', 20190504133304, 0);
insert into parkeerplaatsevent values (7, 2, 'A1', 20190504173018, 1);
insert into parkeerplaatsevent values (7, 2, 'A1', 20190505001320, 0);
insert into parkeerplaatsevent values (7, 2, 'A1', 20190506221823, 1);
insert into parkeerplaatsevent values (8, 3, 'A1', 20190301171500, 0);
insert into parkeerplaatsevent values (8, 1, 'A1', 20190504135207, 1);
insert into parkeerplaatsevent values (8, 3, 'A1', 20190505204635, 0);
insert into parkeerplaatsevent values (9, 4, 'A1', 20190302173500, 1);
insert into parkeerplaatsevent values (9, 1, 'A1', 20190504081343, 0);
insert into parkeerplaatsevent values (9, 4, 'A1', 20190504224912, 1);
insert into parkeerplaatsevent values (10, 5, 'A2', 20190301180000, 1);
insert into parkeerplaatsevent values (11, 5, 'A2', 20190301184500, 1);
insert into parkeerplaatsevent values (11, 5, 'A2', 20190506011034, 0);
insert into parkeerplaatsevent values (11, 5, 'A2', 20190506160301, 1);
insert into parkeerplaatsevent values (12, 5, 'A2', 20190302200000, 1);
insert into parkeerplaatsevent values (12, 5, 'A2', 20190504110220, 0);
insert into parkeerplaatsevent values (12, 5, 'A2', 20190506155240, 1);
insert into parkeerplaatsevent values (13, 6, 'A2', 20190303201000, 0);
insert into parkeerplaatsevent values (13, 6, 'A2', 20190504062256, 1);
insert into parkeerplaatsevent values (13, 6, 'A2', 20190506033156, 0);
insert into parkeerplaatsevent values (14, 6, 'A2', 20190303210000, 0);
insert into parkeerplaatsevent values (14, 6, 'A2', 20190504233902, 1);
insert into parkeerplaatsevent values (15, 7, 'A3', 20190302232000, 1);
insert into parkeerplaatsevent values (15, 7, 'A3', 20190504181013, 0);
insert into parkeerplaatsevent values (15, 7, 'A3', 20190505030134, 1);
insert into parkeerplaatsevent values (15, 7, 'A3', 20190505193808, 0);