CREATE TABLE Carta
(
	ID char(5) PRIMARY KEY,
	Idolizzata tinyint(1) NOT NULL default false, 
	Liv_max tinyint NOT NULL,
	Skill varchar(250),
	Attributo varchar(20) NOT NULL,
	Rarita varchar(2) NOT NULL,
	Center_skill varchar(30),
	Stamina tinyint NOT NULL, 
	Smile int NOT NULL,
	Pure int NOT NULL,
	Cool int NOT NULL,
	Set_appartenenza varchar(20),
	Nome_idol varchar(20) NOT NULL,
	Cognome_idol varchar(20) NOT NULL, 
	Rappresentazione varchar(100) default NULL
);

INSERT INTO Carta (ID, Idolizzata, Liv_max, Skill, Attributo, Rarita, Center_skill, Stamina, Smile, Pure, Cool, Set_appartenenza, Nome_idol, Cognome_idol, Rappresentazione) VALUES
('0031b', 0, 40, 'Ogni 10 secondi dà la possibilità del 36% di aumentare il tuo punteggio di 200', 'Smile', 'R', 'Smile Power', 3, 2580, 1280, 1600, 'Beach', 'Umi', 'Sonoda','umiBaseBeach.png'), 
('0031i', 1, 60, 'Ogni 8 secondi dà la possibilità del 36% di aumentare il tuo punteggio di 250', 'Smile', 'R', 'Smile Power', 4, 3350, 2050, 2370, 'Beach', 'Umi', 'Sonoda','umiIdolBeach.png'),
('0043b', 0, 40, 'C è la possibilità del 36% che la tua Stamina aumenti di 1 quando arrivi ad una combo di 17 note', 'Pure', 'R', 'Pure Power', 3, 1020, 3100, 1280, 'Maid Set', 'Nozomi', 'Tojo','nozomiBaseMaid.png'),
('0043i', 1, 60, 'C è la possibilità del 36% che la tua Stamina aumenti di 1 quando arrivi ad una combo di 15 note', 'Pure', 'R', 'Pure Power', 4, 1790, 3870, 2050, 'Maid Set', 'Nozomi', 'Tojo','nozomiIdolMaid.png'), 
('0049b', 0, 40, 'Possibilità del 36% di aumentare il punteggio di 200 dopo 15 Perfect', 'Cool', 'R', 'Cool Power', 3, 1390, 1020, 2900, 'Wonderful Rush', 'Umi', 'Sonoda','umiBaseWonderful.png'),
('0049i', 1, 60, 'Possibilità del 36% di aumentare il punteggio di 249 dopo 15 Perfect', 'Cool', 'R', 'Cool Power', 4, 2160, 1790, 3670, 'Wonderful Rush', 'Umi', 'Sonoda','umiIdolWonderful.png'),
('0268b', 0, 30, NULL, 'Smile', 'N', NULL, 3, 1520, 300, 560, NULL, 'Yuri', 'Midou','yuriBase.png'), 
('0268i', 1, 40, NULL, 'Smile', 'N', NULL, 4, 1900, 490, 800, NULL, 'Yuri', 'Midou','yuriIdol.png'),
('0287b', 0, 30, NULL, 'Cool', 'N', NULL, 2, 320, 410, 1620, NULL, 'Shun', 'Kurosaki','shunBase.png'),
('0287i', 1, 40, NULL, 'Cool', 'N', NULL, 3, 390, 480, 1920, NULL, 'Shun', 'Kurosaki','shunIdol.png'),
('0284b', 0, 40,'Ogni 20 note c è la possibilità del 36% che il timing rallenti', 'Smile', 'R', 'Smile Power', 3, 3240, 1290, 1020, 'Bokura wa', 'Honoka', 'Kosaka','honokaBaseBokura.png'),
('0284i', 1, 60, 'Ogni 15 note c è la possibilità del 36% che il timing rallenti', 'Smile', 'R', 'Smile Power', 4, 4010, 2060, 1790, 'Bokura wa', 'Honoka', 'Kosaka','honokaIdolBokura.png'),
('0286b', 0, 40, 'Ogni 20 note c è il 36% di probabilità che il tuo punteggio aumenti di 220', 'Pure', 'R', 'Pure Power', 3, 1040, 3250, 1260, 'Old Version', 'Kotori', 'Minami','kotoriBaseOld.png'),
('0286i', 1, 60, 'Ogni 20 note c è il 36% di probabilità che il tuo punteggio aumenti di 250', 'Pure', 'R', 'Pure Power', 4, 1810, 4020, 2030, 'Old Version', 'Kotori', 'Minami','kotoriIdolOld.png'), 
('0441b', 0, 60, 'Ogni 11 secondi c è la possibilità di recuperare 4 punti stamina', 'Cool', 'SR', 'Cool Heart', 3, 2620, 2470, 3800, 'Christmas Set', 'Rin', 'Hoshizora','rinBaseChristmas.png'),  
('0441i', 1, 80, 'Ogni 10 secondi c è la possibilità di recuperare 4 punti stamina', 'Cool', 'SR', 'Cool Heart', 4, 3730, 3580, 4910, 'Christmas Set', 'Rin', 'Hoshizora','rinIdolChristmas.png'),
('0753b', 0, 30, NULL, 'Smile', 'N', NULL, 3, 1560, 450, 320, 'White Day Set', 'Konoe', 'Kanata','kanataBase.png'), 
('0753i', 1, 40, NULL, 'Smile', 'N', NULL, 4, 1950, 560, 450, 'White Day Set', 'Konoe', 'Kanata','kanataIdol.png'),
('0802b', 0, 40, 'Ogni 10 secondi dà la possibilità del 36% di aumentare il tuo punteggio di 200', 'Pure', 'R', 'Pure Power', 3, 1400, 2340, 1630, 'Rainy Season ver', 'Ruby', 'Kurosawa','rubyBaseRainy.png'),
('0802i', 1, 60, 'Ogni 10 secondi dà la possibilità del 36% di aumentare il tuo punteggio di 250', 'Pure', 'R', 'Pure Power', 4, 1560, 4030, 1830, 'Rainy Season ver', 'Ruby', 'Kurosawa','rubyIdolRainy.png'),
('0803b', 0, 60, 'Ogni 15 note c è la possibilità di aumentare il tuo punteggio di 400', 'Cool', 'SR', 'Cool Heart', 3, 2500, 2750, 3600, 'Rainy Season ver', 'Hanamaru', 'Kunikida','hanamaruBaseRainy.png'),
('0803i', 1, 80, 'Ogni 15 note c è la possibilità di aumentare il tuo punteggio di 450', 'Cool', 'SR', 'Cool Heart', 4, 2810, 3100, 4850, 'Rainy Season ver', 'Hanamaru', 'Kunikida','hanamaruIdolRainy.png'),
('0804b', 0, 60, 'Ogni 10 note c è la possibilità del 36% che il timing rallenti', 'Smile', 'SR', 'Smile Power', 3, 3120, 1450, 2020, 'Rainy Season ver', 'Yoshiko', 'Tsushima','yoshikoBaseRainy.png'),
('0804i', 1, 80, 'Ogni 8 note c è la possibilità del 36% che il timing rallenti', 'Smile', 'SR', 'Smile Power', 4, 3920, 1950, 2420, 'Rainy Season ver', 'Yoshiko', 'Tsushima','yoshikoIdolRainy.png'),
('0350b', 0, 80, 'Ogni 17 perfect il timing rallenta per 3 secondi', 'Cool', 'UR', 'Cool Princess', 4, 3640, 4230, 5010, 'Marine Set', 'Umi', 'Sonoda','umiBaseMarine.png'),
('0350i', 1, 100, 'Ogni 15 perfect il timing rallenta per 3 secondi', 'Cool', 'UR', 'Cool Princess', 4, 3900, 4750, 5520, 'Marine Set', 'Umi', 'Sonoda','umiIdolMarine.png'),
('0351b', 0, 80, 'Ogni 20 secondi c è la possibilità del 10% di recuperare tutta la stamina', 'Smile', 'UR', 'Smile Princess', 4, 3450, 4520, 3120, 'Yukata Set', 'Mari', 'Ohara','mariBaseYukata.png'),
('0351i', 1, 100, 'Ogni 15 secondi c è la possibilità del 20% di recuperare tutta la stamina', 'Smile', 'UR', 'Smile Princess', 4, 3740, 5310, 3850, 'Yukata Set', 'Mari', 'Ohara','mariIdolYukata.png'), 
('1065b', 1, 70, 'Ogni 20 note hai una possibilità del 24% di trasformare i good in great', 'Smile', 'SSR', 'Smile Star', 4, 4820, 4100, 3110, 'Christmas Set', 'Kanan', 'Matsuura','kananBaseChristmas.png'), 
('1065i', 1, 90, 'Ogni 15 note hai una possibilità del 30% di trasformare i good in great', 'Smile', 'SSR', 'Smile Star', 4, 5120, 4220, 3410, 'Christmas Set', 'Kanan', 'Matsuura','kananIdolChristmas.png'),
('1068i', 1, 80, 'Ogni 15 note hai una possibilità del 26% di trasformare i good in great', 'Smile','SR', 'Smile Heart', 4, 4820, 3410, 3930, 'Skate Set', 'Riko', 'Matsuura','rikoBaseSkate.png'), 
('1069i', 1, 80, 'Ogni 20 note hai una possibilità del 30% di guadagnare 365 punti', 'Pure', 'SR', 'Pure Heart', 4, 3260, 4770, 4130, 'Skate Set', 'Dia', 'Kurosawa','diaIdolSkate.png'), 
('1044i', 1, 80, 'Ogni 25 note hai una possibilità del 33% di guadagnare 380 punti', 'Cool', 'SR', 'Cool Heart', 4, 3360, 4030, 4770, 'Helper Set', 'You', 'Watanabe','youIdolHelper.png'), 
('1043i', 1, 80, 'Ogni 21 note hai una possibilità del 26% di trasformare i good in great', 'Pure', 'SR', 'Pure Heart', 4, 3950, 4820, 3410, 'Helper Set', 'Chika', 'Takami','chikaIdolHelper.png'), 
('1032i', 1, 80, 'Ogni 20 combo hai una possibilità del 33% di guadagnare 390 punti', 'Pure', 'SR', 'Pure Heart', 4, 3840, 4760, 3580, 'Rock Set', 'Rin', 'Hoshizora','rinIdolRock.png'), 
('1033i', 1, 80, 'Ogni 15 note hai una possibilità del 30% di trasformare i good in great', 'Smile', 'SR', 'Smile Heart', 4, 4820, 3410, 3950, 'Rock Set', 'Nozomi', 'Tojo','nozomiIdolRock.png'), 
('1009i', 1, 80, 'Ogni 23 note hai una possibilità del 33% di guadagnare 410 punti', 'Smile', 'SR', 'Smile Heart', 4, 4760, 3830, 3570, 'Moon Set', 'Honoka', 'Kousaka','honokaIdolMoon.png'), 
('1010i', 1, 80, 'Ogni 20 note hai una possibilità del 32% di trasformare i good in great e', 'Pure', 'SR', 'Pure Heart', 4, 3420, 4820, 3940, 'Moon Set', 'Nico', 'Yazawa','nicoIdolMoon.png'), 
('0999i', 1, 80, 'Ogni 22 perfects hai una possibilità del 38% di guadagnare 340 punti', 'Pure', 'SR', 'Pure Heart', 4, 3570, 4680, 3910, 'Diving Set', 'Kanan', 'Matsuura','kananIdolDiving.png'), 
('1000i', 1, 80, 'Ogni 26 note hai una possibilità del 36% di trasformare i good in great', 'Smile', 'SR', 'Smile Heart', 4, 4810, 3410, 3960, 'Diving Set', 'Mari', 'Ohara','mariIdolDiving.png'); 
 
ylt28c379415h4giylt28c379415h4giylt28c379415h4gi