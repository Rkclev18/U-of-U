-- Team Table Info

INSERT INTO `Team` (`Type`, `Email`, `EstablishedDate`)
VALUES
    ('Football', 'football@utah.edu', '1892-09-15'),
    ('Basketball', 'basketball@utah.edu', '1907-11-11'),
    ('Soccer', 'soccer@utah.edu', '1994-08-15'),
    ('Volleyball', 'volleyball@utah.edu', '1973-08-20'),
    ('Track and Field', 'trackandfield@utah.edu', '1898-01-01'),
    ('Swimming and Diving', 'swimminganddiving@utah.edu', '1973-08-20'),
    ('Gymnastics', 'gymnastics@utah.edu', '1973-08-20'),
    ('Tennis', 'tennis@utah.edu', '1973-08-20'),
    ('Cross Country', 'crosscountry@utah.edu', '1898-01-01'),
    ('Lacrosse', 'lacrosse@utah.edu', '2003-02-13');
	
-- Athlete Table Info

INSERT INTO `Athlete` (`LastName`, `FirstName`, `Position`, `AcademicLevel`, `Contact`, `TeamId`)
VALUES
-- Team 1 (Football)
('Smith', 'John', 'Quarterback', 'Senior', '801-555-1212', 1),
('Johnson', 'Jane', 'Running Back', 'Junior', '801-555-1213', 1),
('Williams', 'Michael', 'Wide Receiver', 'Sophomore', '801-555-1214', 1),
('Brown', 'Emily', 'Offensive Line', 'Freshman', '801-555-1215', 1),
('Davis', 'David', 'Defensive Line', 'Senior', '801-555-1216', 1),
('Miller', 'Maria', 'Linebacker', 'Junior', '801-555-1217', 1),
('Wilson', 'William', 'Defensive Back', 'Sophomore', '801-555-1218', 1),
('Moore', 'Michelle', 'Kicker', 'Freshman', '801-555-1219', 1),
('Taylor', 'Thomas', 'Punter', 'Senior', '801-555-1220', 1),
('Anderson', 'Anna', 'Long Snapper', 'Junior', '801-555-1221', 1),

-- Team 2 (Basketball)
('Jordan', 'Michael', 'Guard', 'Senior', '801-555-1212', 2),
('Kobe', 'Bryant', 'Guard', 'Junior', '801-555-1213', 2),
('LeBron', 'James', 'Forward', 'Sophomore', '801-555-1214', 2),
('Curry', 'Stephen', 'Guard', 'Freshman', '801-555-1215', 2),
('Durant', 'Kevin', 'Forward', 'Senior', '801-555-1216', 2),
('Irving', 'Kyrie', 'Guard', 'Junior', '801-555-1217', 2),
('Harden', 'James', 'Guard', 'Sophomore', '801-555-1218', 2),
('Embiid', 'Joel', 'Center', 'Freshman', '801-555-1219', 2),
('Jokic', 'Nikola', 'Center', 'Senior', '801-555-1220', 2),
('Doncic', 'Luka', 'Guard', 'Junior', '801-555-1221', 2),

('Messi', 'Lionel', 'Forward', 'Senior', '801-555-1212', 3),
('Ronaldo', 'Cristiano', 'Forward', 'Junior', '801-555-1213', 3),
('Neymar', 'Neymar', 'Forward', 'Sophomore', '801-555-1214', 3),
('Mbappé', 'Kylian', 'Forward', 'Freshman', '801-555-1215', 3),
('Salah', 'Mohamed', 'Forward', 'Senior', '801-555-1216', 3),
('Haaland', 'Erling', 'Forward', 'Junior', '801-555-1217', 3),
('Lewandowski', 'Robert', 'Forward', 'Sophomore', '801-555-1218', 3),
('Kane', 'Harry', 'Forward', 'Freshman', '801-555-1219', 3),
('Benzema', 'Karim', 'Forward', 'Senior', '801-555-1220', 3),
('Vinícius Júnior', 'Vinícius Júnior', 'Forward', 'Junior', '801-555-1221', 3),

-- Team 4 (Volleyball)
('Kim, Yeon-koung', 'Kim Yeon-koung', 'Outside Hitter', 'Senior', '801-555-0301', 4),
('Egonu, Paola', 'Paola Egonu', 'Opposite Hitter', 'Senior', '801-555-0302', 4),
('Boskovic, Tijana', 'Tijana Boskovic', 'Opposite Hitter', 'Senior', '801-555-0303', 4),
('Carli Lloyd', 'Carli Lloyd', 'Setter', 'Senior', '801-555-0304', 4),
('Zhu Ting', 'Zhu Ting', 'Outside Hitter', 'Senior', '801-555-0305', 4),
('Gabi Guimarães', 'Gabi Guimarães', 'Opposite Hitter', 'Senior', '801-555-0306', 4),
('Karakurt, Eda Erdem', 'Eda Erdem Dundar', 'Outside Hitter', 'Junior', '801-555-0307', 4),
('Ognjenovic, Brankica', 'Brankica Mihajlović', 'Setter', 'Senior', '801-555-0308', 4),
('Larson, Jordan', 'Jordan Larson', 'Outside Hitter', 'Senior', '801-555-0309', 4),
('Robinson, Michelle', 'Michelle Robinson', 'Middle Blocker', 'Senior', '801-555-0310', 4),

-- Team 5 (Track and Field)
('Bolt, Usain', 'Usain Bolt', 'Sprinter', 'Senior', '801-555-0401', 5),
('Fraser-Pryce, Shelly-Ann', 'Shelly-Ann Fraser-Pryce', 'Sprinter', 'Senior', '801-555-0402', 5),
('Kipchoge, Eliud', 'Eliud Kipchoge', 'Distance Runner', 'Senior', '801-555-0403', 5),
('Mutaz Essa Barshim', 'Mutaz Essa Barshim', 'High Jumper', 'Senior', '801-555-0404', 5),
('Allyson Felix', 'Allyson Felix', 'Sprinter', 'Senior', '801-555-0405', 5),
('Sydney McLaughlin', 'Sydney McLaughlin', 'Hurdler', 'Junior', '801-555-0406', 5),
('Armand Duplantis', 'Armand Duplantis', 'Pole Vaulter', 'Junior', '801-555-0407', 5),
('Ryan Crouser', 'Ryan Crouser', 'Shot Putter', 'Senior', '801-555-0408', 5),
('Katie Ledecky', 'Katie Ledecky', 'Swimmer', 'Senior', '801-555-0409', 5),
('Caeleb Dressel', 'Caeleb Dressel', 'Swimmer', 'Senior', '801-555-0410', 5),


-- Team 6 (Swimming and Diving)
('Ledecky, Katie', 'Katie Ledecky', 'Freestyle, Distance', 'Senior', '801-555-0501', 6),
('Dressel, Caeleb', 'Caeleb Dressel', 'Sprint, Butterfly', 'Senior', '801-555-0502', 6),
('Pellegrini, Federica', 'Federica Pellegrini', 'Freestyle', 'Senior', '801-555-0503', 6),
('Sun Yang', 'Sun Yang', 'Freestyle, Butterfly', 'Senior', '801-555-0504', 6),
('Hopkin, Adam Peaty', 'Adam Peaty', 'Breaststroke', 'Senior', '801-555-0505', 6),
('McLaughlin, Ryan', 'Ryan McLaughlin', 'Backstroke', 'Senior', '801-555-0506', 6),
('Liu Xiang', 'Liu Xiang', 'Hurdler', 'Senior', '801-555-0507', 6),
('Daley, Tom', 'Tom Daley', 'Diver', 'Senior', '801-555-0508', 6),
('Wu Minxia', 'Wu Minxia', 'Diver', 'Senior', '801-555-0509', 6),
('Shi Tingmao', 'Shi Tingmao', 'Diver', 'Senior', '801-555-0510', 6),

-- Team 7 (Gymnastics)
('Simone Biles', 'Simone Biles', 'All-Around', 'Senior', '801-555-0601', 7),
('Sunisa Lee', 'Sunisa Lee', 'All-Around', 'Junior', '801-555-0602', 7),
('Jade Carey', 'Jade Carey', 'Vault, Floor', 'Senior', '801-555-0603', 7),
('Nile Wilson', 'Nile Wilson', 'All-Around', 'Senior', '801-555-0604', 7),
('Kohei Uchimura', 'Kohei Uchimura', 'All-Around', 'Senior', '801-555-0605', 7),
('Xiao Ruoteng', 'Xiao Ruoteng', 'All-Around', 'Senior', '801-555-0606', 7),
('Suni Lee', 'Suni Lee', 'All-Around', 'Junior', '801-555-0607', 7),
('Jordan Chiles', 'Jordan Chiles', 'All-Around', 'Junior', '801-555-0608', 7),
('Grace McCallum', 'Grace McCallum', 'All-Around', 'Junior', '801-555-0609', 7),
('Leanne Wong', 'Leanne Wong', 'All-Around', 'Junior', '801-555-0610', 7),

-- Team 8 (Tennis)
('Novak Djokovic', 'Novak Djokovic', 'Singles, Doubles', 'Senior', '801-555-0701', 8),
('Rafael Nadal', 'Rafael Nadal', 'Singles, Doubles', 'Senior', '801-555-0702', 8),
('Roger Federer', 'Roger Federer', 'Singles, Doubles', 'Senior', '801-555-0703', 8),
('Serena Williams', 'Serena Williams', 'Singles, Doubles', 'Senior', '801-555-0704', 8),
('Naomi Osaka', 'Naomi Osaka', 'Singles, Doubles', 'Senior', '801-555-0705', 8),
('Iga Swiatek', 'Iga Swiatek', 'Singles, Doubles', 'Junior', '801-555-0706', 8),
('Carlos Alcaraz', 'Carlos Alcaraz', 'Singles, Doubles', 'Junior', '801-555-0707', 8),
('Daniil Medvedev', 'Daniil Medvedev', 'Singles, Doubles', 'Senior', '801-555-0708', 8),
('Aryna Sabalenka', 'Aryna Sabalenka', 'Singles, Doubles', 'Senior', '801-555-0709', 8),
('Ons Jabeur', 'Ons Jabeur', 'Singles, Doubles', 'Senior', '801-555-0710', 8),

-- Team 9 (Cross Country)
('Eliud Kipchoge', 'Eliud Kipchoge', 'Distance Runner', 'Senior', '801-555-0801', 9),
('Sifan Hassan', 'Sifan Hassan', 'Distance Runner', 'Senior', '801-555-0802', 9),
('Joshua Cheptegei', 'Joshua Cheptegei', 'Distance Runner', 'Senior', '801-555-0803', 9),
('Letesenbet Gidey', 'Letesenbet Gidey', 'Distance Runner', 'Senior', '801-555-0804', 9),
('Grant Fisher', 'Grant Fisher', 'Distance Runner', 'Senior', '801-555-0805', 9),
('Karissa Schweizer', 'Karissa Schweizer', 'Distance Runner', 'Senior', '801-555-0806', 9),
('Cole Hocker', 'Cole Hocker', 'Middle-Distance Runner', 'Junior', '801-555-0807', 9),
('Ciara ORourke', 'Ciara ORourke', 'Middle-Distance Runner', 'Junior', '801-555-0808', 9),
('Weini Kelati', 'Weini Kelati', 'Distance Runner', 'Senior', '801-555-0809', 9),
('Conner Mantz', 'Conner Mantz', 'Distance Runner', 'Senior', '801-555-0810', 9),

-- Team 10 (Lacrosse)
('Connor Fields', 'Connor Fields', 'Attack', 'Senior', '801-555-0901', 10),
('Lyle Thompson', 'Lyle Thompson', 'Attack', 'Senior', '801-555-0902', 10),
('Paul Rabil', 'Paul Rabil', 'Attack', 'Senior', '801-555-0903', 10),
('Matt Rambo', 'Matt Rambo', 'Attack', 'Senior', '801-555-0904', 10),
('Zed Williams', 'Zed Williams', 'Attack', 'Junior', '801-555-0905', 10),
('Michael Sowers', 'Michael Sowers', 'Attack', 'Senior', '801-555-0906', 10),
('Joel Waterman', 'Joel Waterman', 'Defense', 'Senior', '801-555-0907', 10),
('Brodie Merrill', 'Brodie Merrill', 'Defense', 'Senior', '801-555-0908', 10),
('Paul Rabil', 'Paul Rabil', 'Faceoff Specialist', 'Senior', '801-555-0909', 10),
('Trevor Baptiste', 'Trevor Baptiste', 'Faceoff Specialist', 'Senior', '801-555-0910', 10);
	
-- Scholarship Table Info


INSERT INTO `Scholarship` (`AthleteId`, `Amount`, `Date`, `Donor`, `Type`, `TeamId`)
VALUES
-- Team 1 (Football)
(1, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 1),
(2, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 1),
(3, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 1),
(4, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 1),
(5, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 1),
(6, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 1),
(7, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 1),
(8, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 1),
(9, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 1),
(10, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 1),

-- Team 2 (Basketball)
(11, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 2),
(12, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 2),
(13, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 2),
(14, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 2),
(15, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 2),
(16, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 2),
(17, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 2),
(18, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 2),
(19, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 2),
(20, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 2),

-- Team 3 (Soccer)
(21, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 3),
(22, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 3),
(23, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 3),
(24, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 3),
(25, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 3),
(26, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 3),
(27, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 3),
(28, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 3),
(29, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 3),
(30, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 3),

-- Team 4 (Volleyball)
(31, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 4),
(32, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 4),
(33, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 4),
(34, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 4),
(35, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 4),
(36, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 4),
(37, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 4),
(38, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 4),
(39, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 4),
(40, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 4),

-- Team 5 (Track and Field)
(41, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 5),
(42, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 5),
(43, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 5),
(44, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 5),
(45, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 5),
(46, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 5),
(47, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 5),
(48, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 5),
(49, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 5),
(50, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 5),

-- Team 6 (Swimming and Diving)
(51, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 6),
(52, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 6),
(53, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 6),
(54, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 6),
(55, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 6),
(56, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 6),
(57, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 6),
(58, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 6),
(59, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 6),
(60, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 6),

-- Team 7 (Gymnastics)
(61, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 7),
(62, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 7),
(63, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 7),
(64, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 7),
(65, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 7),
(66, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 7),
(67, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 7),
(68, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 7),
(69, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 7),
(70, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 7),

-- Team 8 (Tennis)
(71, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 8),
(72, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 8),
(73, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 8),
(74, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 8),
(75, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 8),
(76, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 8),
(77, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 8),
(78, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 8),
(79, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 8),
(80, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 8),

-- Team 9 (Cross Country)
(81, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 9),
(82, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 9),
(83, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 9),
(84, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 9),
(85, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 9),
(86, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 9),
(87, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 9),
(88, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 9),
(89, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 9),
(90, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 9),

-- Team 10 (Lacrosse)
(91, 10000, '2023-09-01', 'U of U Alumni Association', 'Academic', 10),
(92, 5000, '2024-01-01', 'Anonymous Donor', 'Athletic', 10),
(93, 8000, '2023-10-15', 'Utah Athletics Booster Club', 'Academic and Athletic', 10),
(94, 7000, '2024-02-01', 'Local Business Owner', 'Athletic', 10),
(95, 9000, '2023-11-01', 'U of U Faculty Member', 'Academic', 10),
(96, 6000, '2024-03-15', 'Anonymous Donor', 'Athletic', 10),
(97, 12000, '2023-12-01', 'U of U Alumni Association', 'Academic and Athletic', 10),
(98, 4000, '2024-04-01', 'Local Sports Fan', 'Athletic', 10),
(99, 11000, '2023-08-15', 'U of U Faculty Member', 'Academic', 10),
(100, 5500, '2024-05-01', 'Anonymous Donor', 'Athletic', 10);
	
-- Event Table Info

INSERT INTO `Event` (`EventName`, `TeamId`, `Venue`, `Date`, `Income`, `Expenses`, `Opponent`)
VALUES
    ('Football Game', 1, 'Rice-Eccles Stadium', '2023-11-25', 100000, 50000, 'UCLA Bruins'),
    ('Basketball Game', 2, 'Jon M. Huntsman Center', '2024-02-12', 80000, 40000, 'Arizona Wildcats'),
    ('Soccer Game', 3, 'Ute Soccer Field', '2023-10-21', 50000, 25000, 'Colorado Buffaloes'),
    ('Basketball Game', 4, 'Jon M. Huntsman Center', '2024-03-02', 70000, 35000, 'USC Trojans'),
    ('Football Game', 5, 'Rice-Eccles Stadium', '2024-04-13', 60000, 30000, 'Oregon Ducks'),
    ('Swimming Meet', 6, 'Utah Natatorium', '2023-11-18', 40000, 20000, 'Cal Bears'),
    ('Basketball Game', 7, 'Jon M. Huntsman Center', '2024-01-27', 55000, 27500, 'UCLA Bruins'),
    ('Tennis Match', 8, 'Eccles Tennis Center', '2023-09-29', 30000, 15000, 'Colorado Buffaloes'),
    ('Football Game', 9, 'Rice-Eccles Stadium', '2024-03-23', 45000, 22500, 'Oregon Ducks'),
    ('Lacrosse Game', 10, 'Ute Lacrosse Field', '2023-04-15', 25000, 12500, 'Stanford Cardinal');
	
-- Employee Table Info

INSERT INTO `Employee` (`LastName`, `FirstName`, `Title`, `Address`, `StartDate`, `EndDate`, `Type`, `Cost`, `TeamId`)
VALUES
  -- Team 1 (Football)
  ('Smith', 'John', 'Head Coach', '123 Main St', '2015-01-01', '2025-12-31', 'Salary', 200000, 1),
  ('Johnson', 'Jane', 'Assistant Coach', '456 Elm St', '2018-07-01', '2024-06-30', 'Salary', 120000, 1),
  ('Williams', 'Michael', 'Strength and Conditioning Coach', '789 Oak St', '2020-03-15', '2026-02-28', 'Salary', 90000, 1),
  ('Brown', 'Emily', 'Athletic Trainer', '101 Pine St', '2017-11-01', '2023-10-31', 'Hourly', 30, 1),
  ('Davis', 'David', 'Equipment Manager', '234 Cedar St', '2019-05-15', '2025-04-30', 'Hourly', 25, 1),
  ('Miller', 'Maria', 'Sports Information Director', '567 Spruce St', '2016-09-01', '2022-08-31', 'Salary', 100000, 1),
  ('Wilson', 'William', 'Academic Advisor', '890 Maple St', '2018-02-15', '2024-01-31', 'Salary', 80000, 1),
  ('Moore', 'Michelle', 'Nutritionist', '123 Birch St', '2020-11-01', '2026-10-31', 'Hourly', 40, 1),
  ('Taylor', 'Thomas', 'Sports Psychologist', '456 Fir St', '2017-03-15', '2023-02-28', 'Salary', 70000, 1),
  ('Anderson', 'Anna', 'Team Physician', '789 Hemlock St', '2019-09-01', '2025-08-31', 'Salary', 150000, 1),
  
  -- Team 2 (Basketball)
('Jordan', 'Michael', 'Head Coach', '123 Elm St', '2010-01-01', '2025-12-31', 'Salary', 250000, 2),
('Kobe', 'Bryant', 'Assistant Coach', '456 Oak St', '2018-07-01', '2024-06-30', 'Salary', 150000, 2),
('LeBron', 'James', 'Strength and Conditioning Coach', '789 Pine St', '2019-03-15', '2026-02-28', 'Salary', 100000, 2),
('Curry', 'Stephen', 'Athletic Trainer', '101 Cedar St', '2017-11-01', '2023-10-31', 'Hourly', 35, 2),
('Durant', 'Kevin', 'Equipment Manager', '234 Spruce St', '2019-05-15', '2025-04-30', 'Hourly', 28, 2),
('Irving', 'Kyrie', 'Sports Information Director', '567 Maple St', '2016-09-01', '2022-08-31', 'Salary', 120000, 2),
('Harden', 'James', 'Academic Advisor', '890 Birch St', '2018-02-15', '2024-01-31', 'Salary', 90000, 2),
('Embiid', 'Joel', 'Nutritionist', '123 Fir St', '2020-11-01', '2026-10-31', 'Hourly', 45, 2),
('Jokic', 'Nikola', 'Sports Psychologist', '456 Hemlock St', '2017-03-15', '2023-02-28', 'Salary', 85000, 2),
('Doncic', 'Luka', 'Team Physician', '789 Pine St', '2019-09-01', '2025-08-31', 'Salary', 180000, 2),

-- Team 3 (Soccer)
('Beckham', 'David', 'Head Coach', '123 Oak St', '2010-01-01', '2025-12-31', 'Salary', 250000, 3),
('Ronaldo', 'Cristiano', 'Assistant Coach', '456 Pine St', '2018-07-01', '2024-06-30', 'Salary', 150000, 3),
('Messi', 'Lionel', 'Strength and Conditioning Coach', '789 Cedar St', '2019-03-15', '2026-02-28', 'Salary', 100000, 3),
('Neymar', 'Neymar', 'Athletic Trainer', '101 Spruce St', '2017-11-01', '2023-10-31', 'Hourly', 35, 3),
('Mbappé', 'Kylian', 'Equipment Manager', '234 Maple St', '2019-05-15', '2025-04-30', 'Hourly', 28, 3),
('Salah', 'Mohamed', 'Sports Information Director', '567 Birch St', '2016-09-01', '2022-08-31', 'Salary', 120000, 3),
('Haaland', 'Erling', 'Academic Advisor', '890 Fir St', '2018-02-15', '2024-01-31', 'Salary', 90000, 3),
('Lewandowski', 'Robert', 'Nutritionist', '123 Hemlock St', '2020-11-01', '2026-10-31', 'Hourly', 45, 3),
('Kane', 'Harry', 'Sports Psychologist', '456 Pine St', '2017-03-15', '2023-02-28', 'Salary', 85000, 3),
('Benzema', 'Karim', 'Team Physician', '789 Cedar St', '2019-09-01', '2025-08-31', 'Salary', 180000, 3),

-- Team 4 (Volleyball)
('Larsen', 'Lindsey', 'Head Coach', '123 Oak St', '2010-01-01', '2025-12-31', 'Salary', 250000, 4),
('Robinson', 'Kara', 'Assistant Coach', '456 Pine St', '2018-07-01', '2024-06-30', 'Salary', 150000, 4),
('Hughes', 'Michelle', 'Strength and Conditioning Coach', '789 Cedar St', '2019-03-15', '2026-02-28', 'Salary', 100000, 4),
('Clark', 'Taylor', 'Athletic Trainer', '101 Spruce St', '2017-11-01', '2023-10-31', 'Hourly', 35, 4),
('Lewis', 'Jordan', 'Equipment Manager', '234 Maple St', '2019-05-15', '2025-04-30', 'Hourly', 28, 4),
('Hill', 'Kayla', 'Sports Information Director', '567 Birch St', '2016-09-01', '2022-08-31', 'Salary', 120000, 4),
('Adams', 'Madison', 'Academic Advisor', '890 Fir St', '2018-02-15', '2024-01-31', 'Salary', 90000, 4),
('Bennett', 'Emily', 'Nutritionist', '123 Hemlock St', '2020-11-01', '2026-10-31', 'Hourly', 45, 4),
('Carter', 'Olivia', 'Sports Psychologist', '456 Pine St', '2017-03-15', '2023-02-28', 'Salary', 85000, 4),
('Evans', 'Sophie', 'Team Physician', '789 Cedar St', '2019-09-01', '2025-08-31', 'Salary', 180000, 4),

-- Team 5 (Track and Field)
('Bolt', 'Usain', 'Head Coach', '123 Oak St', '2010-01-01', '2025-12-31', 'Salary', 250000, 5),
('Gatlin', 'Justin', 'Assistant Coach', '456 Pine St', '2018-07-01', '2024-06-30', 'Salary', 150000, 5),
('Blake', 'Yohan', 'Strength and Conditioning Coach', '789 Cedar St', '2019-03-15', '2026-02-28', 'Salary', 100000, 5),
('Felix', 'Allyson', 'Athletic Trainer', '101 Spruce St', '2017-11-01', '2023-10-31', 'Hourly', 35, 5),
('Thompson', 'Shelly-Ann', 'Equipment Manager', '234 Maple St', '2019-05-15', '2025-04-30', 'Hourly', 28, 5),
('Fraser-Pryce', 'Shelly-Ann', 'Sports Information Director', '567 Birch St', '2016-09-01', '2022-08-31', 'Salary', 120000, 5),
('Bolt', 'Yohan', 'Academic Advisor', '890 Fir St', '2018-02-15', '2024-01-31', 'Salary', 90000, 5),
('Gatlin', 'Justin', 'Nutritionist', '123 Hemlock St', '2020-11-01', '2026-10-31', 'Hourly', 45, 5),
('Blake', 'Yohan', 'Sports Psychologist', '456 Pine St', '2017-03-15', '2023-02-28', 'Salary', 85000, 5),
('Felix', 'Allyson', 'Team Physician', '789 Cedar St', '2019-09-01', '2025-08-31', 'Salary', 180000, 5),

-- Team 6 (Swimming and Diving)
('Phelps', 'Michael', 'Head Coach', '123 Oak St', '2010-01-01', '2025-12-31', 'Salary', 250000, 6),
('Ledecky', 'Katie', 'Assistant Coach', '456 Pine St', '2018-07-01', '2024-06-30', 'Salary', 150000, 6),
('Lochte', 'Ryan', 'Strength and Conditioning Coach', '789 Cedar St', '2019-03-15', '2026-02-28', 'Salary', 100000, 6),
('Franklin', 'Missy', 'Athletic Trainer', '101 Spruce St', '2017-11-01', '2023-10-31', 'Hourly', 35, 6),
('Dressel', 'Caeleb', 'Equipment Manager', '234 Maple St', '2019-05-15', '2025-04-30', 'Hourly', 28, 6),
('Ledecky', 'Katie', 'Sports Information Director', '567 Birch St', '2016-09-01', '2022-08-31', 'Salary', 120000, 6),
('Phelps', 'Michael', 'Academic Advisor', '890 Fir St', '2018-02-15', '2024-01-31', 'Salary', 90000, 6),
('Ledecky', 'Katie', 'Nutritionist', '123 Hemlock St', '2020-11-01', '2026-10-31', 'Hourly', 45, 6),
('Lochte', 'Ryan', 'Sports Psychologist', '456 Pine St', '2017-03-15', '2023-02-28', 'Salary', 85000, 6),
('Franklin', 'Missy', 'Team Physician', '789 Cedar St', '2019-09-01', '2025-08-31', 'Salary', 180000, 6),

-- Team 7 (Gymnastics)
('Biles', 'Simone', 'Head Coach', '123 Oak St', '2010-01-01', '2025-12-31', 'Salary', 250000, 7),
('Liu', 'Xiuqing', 'Assistant Coach', '456 Pine St', '2018-07-01', '2024-06-30', 'Salary', 150000, 7),
('Chiles', 'Sunisa', 'Strength and Conditioning Coach', '789 Cedar St', '2019-03-15', '2026-02-28', 'Salary', 100000, 7),
('Biles', 'Simone', 'Athletic Trainer', '101 Spruce St', '2017-11-01', '2023-10-31', 'Hourly', 35, 7),
('Chiles', 'Sunisa', 'Equipment Manager', '234 Maple St', '2019-05-15', '2025-04-30', 'Hourly', 28, 7),
('Liu', 'Xiuqing', 'Sports Information Director', '567 Birch St', '2016-09-01', '2022-08-31', 'Salary', 120000, 7),
('Biles', 'Simone', 'Academic Advisor', '890 Fir St', '2018-02-15', '2024-01-31', 'Salary', 90000, 7),
('Chiles', 'Sunisa', 'Nutritionist', '123 Hemlock St', '2020-11-01', '2026-10-31', 'Hourly', 45, 7),
('Liu', 'Xiuqing', 'Sports Psychologist', '456 Pine St', '2017-03-15', '2023-02-28', 'Salary', 85000, 7),
('Biles', 'Simone', 'Team Physician', '789 Cedar St', '2019-09-01', '2025-08-31', 'Salary', 180000, 7),

-- Team 8 (Tennis)
('Nadal', 'Rafael', 'Head Coach', '123 Oak St', '2010-01-01', '2025-12-31', 'Salary', 250000, 8),
('Federer', 'Roger', 'Assistant Coach', '456 Pine St', '2018-07-01', '2024-06-30', 'Salary', 150000, 8),
('Djokovic', 'Novak', 'Strength and Conditioning Coach', '789 Cedar St', '2019-03-15', '2026-02-28', 'Salary', 100000, 8),
('Osaka', 'Naomi', 'Athletic Trainer', '101 Spruce St', '2017-11-01', '2023-10-31', 'Hourly', 35, 8),
('Barty', 'Ashleigh', 'Equipment Manager', '234 Maple St', '2019-05-15', '2025-04-30', 'Hourly', 28, 8),
('Serena', 'Williams', 'Sports Information Director', '567 Birch St', '2016-09-01', '2022-08-31', 'Salary', 120000, 8),
('Nadal', 'Rafael', 'Academic Advisor', '890 Fir St', '2018-02-15', '2024-01-31', 'Salary', 90000, 8),
('Federer', 'Roger', 'Nutritionist', '123 Hemlock St', '2020-11-01', '2026-10-31', 'Hourly', 45, 8),
('Djokovic', 'Novak', 'Sports Psychologist', '456 Pine St', '2017-03-15', '2023-02-28', 'Salary', 85000, 8),
('Osaka', 'Naomi', 'Team Physician', '789 Cedar St', '2019-09-01', '2025-08-31', 'Salary', 180000, 8),

-- Team 9 (Cross Country)
('Kipchoge', 'Eliud', 'Head Coach', '123 Oak St', '2010-01-01', '2025-12-31', 'Salary', 250000, 9),
('Bekele', 'Kenenisa', 'Assistant Coach', '456 Pine St', '2018-07-01', '2024-06-30', 'Salary', 150000, 9),
('Gebrselassie', 'Haile', 'Strength and Conditioning Coach', '789 Cedar St', '2019-03-15', '2026-02-28', 'Salary', 100000, 9),
('Dibaba', 'Tirunesh', 'Athletic Trainer', '101 Spruce St', '2017-11-01', '2023-10-31', 'Hourly', 35, 9),
('Bekele', 'Kenenisa', 'Equipment Manager', '234 Maple St', '2019-05-15', '2025-04-30', 'Hourly', 28, 9),
('Dibaba', 'Genzebe', 'Sports Information Director', '567 Birch St', '2016-09-01', '2022-08-31', 'Salary', 120000, 9),
('Kipchoge', 'Eliud', 'Academic Advisor', '890 Fir St', '2018-02-15', '2024-01-31', 'Salary', 90000, 9),
('Bekele', 'Kenenisa', 'Nutritionist', '123 Hemlock St', '2020-11-01', '2026-10-31', 'Hourly', 45, 9),
('Dibaba', 'Tirunesh', 'Sports Psychologist', '456 Pine St', '2017-03-15', '2023-02-28', 'Salary', 85000, 9),
('Kipchoge', 'Eliud', 'Team Physician', '789 Cedar St', '2019-09-01', '2025-08-31', 'Salary', 180000, 9),

-- Team 10 (Lacrosse)
('Powell', 'Gary', 'Head Coach', '123 Oak St', '2010-01-01', '2025-12-31', 'Salary', 250000, 10),
('Crosse', 'John', 'Assistant Coach', '456 Pine St', '2018-07-01', '2024-06-30', 'Salary', 150000, 10),
('Smith', 'Alex', 'Strength and Conditioning Coach', '789 Cedar St', '2019-03-15', '2026-02-28', 'Salary', 100000, 10),
('Jones', 'Emily', 'Athletic Trainer', '101 Spruce St', '2017-11-01', '2023-10-31', 'Hourly', 35, 10),
('Brown', 'Michael', 'Equipment Manager', '234 Maple St', '2019-05-15', '2025-04-30', 'Hourly', 28, 10),
('Davis', 'Sarah', 'Sports Information Director', '567 Birch St', '2016-09-01', '2022-08-31', 'Salary', 120000, 10),
('Miller', 'William', 'Academic Advisor', '890 Fir St', '2018-02-15', '2024-01-31', 'Salary', 90000, 10),
('Moore', 'Michelle', 'Nutritionist', '123 Hemlock St', '2020-11-01', '2026-10-31', 'Hourly', 45, 10),
('Taylor', 'Thomas', 'Sports Psychologist', '456 Pine St', '2017-03-15', '2023-02-28', 'Salary', 85000, 10),
('Anderson', 'Anna', 'Team Physician', '789 Cedar St', '2019-09-01', '2025-08-31', 'Salary', 180000, 10);


-- Equipment Table Info

INSERT INTO `Equipment` (`TeamId`, `Type`, `AnnualCost`, `Year`)
VALUES
-- Team 1 (Football)
(1, 'Helmets', 10000, 2023),
(1, 'Shoulder Pads', 8000, 2023),
(1, 'Cleats', 5000, 2023),
(1, 'Jerseys', 3000, 2023),
(1, 'Pants', 2000, 2023),
(1, 'Gloves', 1500, 2023),
(1, 'Mouthguards', 500, 2023),
(1, 'Balls', 200, 2023),
(1, 'Weightlifting Equipment', 10000, 2023),
(1, 'Training Equipment', 5000, 2023),
-- Team 2 (Basketball)
(2, 'Basketballs', 500, 2023),
(2, 'Jerseys', 2000, 2023),
(2, 'Shorts', 1000, 2023),
(2, 'Sneakers', 3000, 2023),
(2, 'Warm-up Suits', 1500, 2023),
(2, 'Weightlifting Equipment', 8000, 2023),
(2, 'Training Equipment', 4000, 2023),
(2, 'First-Aid Kit', 200, 2023),
(2, 'Hydration Packs', 300, 2023),
(2, 'Athletic Tape', 100, 2023),
-- Team 3 (Soccer)
(3, 'Soccer Cleats', 3000, 2023),
(3, 'Soccer Balls', 800, 2023),
(3, 'Jerseys', 2000, 2023),
(3, 'Shorts', 1000, 2023),
(3, 'Shin Guards', 500, 2023),
(3, 'Goalkeeper Gloves', 200, 2023),
(3, 'Cones', 100, 2023),
(3, 'Hurdles', 200, 2023),
(3, 'First-Aid Kit', 150, 2023),
(3, 'Hydration Packs', 250, 2023),
-- Team 4 (Volleyball)
(4, 'Volleyballs', 400, 2023),
(4, 'Knee Pads', 600, 2023),
(4, 'Jerseys', 2000, 2023),
(4, 'Shorts', 1000, 2023),
(4, 'Warm-up Suits', 1500, 2023),
(4, 'Athletic Tape', 200, 2023),
(4, 'Knee Braces', 300, 2023),
(4, 'Water Bottles', 100, 2023),
(4, 'First-Aid Kit', 150, 2023),
(4, 'Hydration Packs', 250, 2023),
-- Team 5 (Track and Field)
(5, 'Track Spikes', 2000, 2023),
(5, 'Jumpsuits', 1500, 2023),
(5, 'Running Shoes', 3000, 2023),
(5, 'Hurdles', 200, 2023),
(5, 'Shot Puts', 500, 2023),
(5, 'Discus', 300, 2023),
(5, 'Javelin', 250, 2023),
(5, 'Hammer Throw', 350, 2023),
(5, 'Pole Vault Poles', 1000, 2023),
(5, 'High Jump Mats', 500, 2023),
-- Team 6 (Swimming and Diving)
(6, 'Swimsuits', 1500, 2023),
(6, 'Goggles', 500, 2023),
(6, 'Swim Caps', 200, 2023),
(6, 'Kickboards', 100, 2023),
(6, 'Pull Buoys', 150, 2023),
(6, 'Diving Board', 2000, 2023),
(6, 'Diving Platform', 3000, 2023),
(6, 'Diving Blocks', 500, 2023),
(6, 'Pool Chemicals', 1000, 2023),
(6, 'Pool Maintenance Equipment', 1500, 2023),
-- Team 7 (Gymnastics)
(7, 'Leotards', 1000, 2023),
(7, 'Grips', 200, 2023),
(7, 'Gymnastic Mats', 5000, 2023),
(7, 'Balance Beam', 2000, 2023),
(7, 'Uneven Bars', 2500, 2023),
(7, 'Vault', 1500, 2023),
(7, 'Floor Exercise Mats', 1000, 2023),
(7, 'First-Aid Kit', 200, 2023),
(7, 'Hydration Packs', 300, 2023),
(7, 'Athletic Tape', 100, 2023),
-- Team 8 (Tennis)
(8, 'Tennis Rackets', 2000, 2023),
(8, 'Tennis Balls', 500, 2023),
(8, 'Tennis Bags', 1000, 2023),
(8, 'Tennis Shoes', 1500, 2023),
(8, 'Wristbands', 100, 2023),
(8, 'Headbands', 50, 2023),
(8, 'Court Maintenance Equipment', 2000, 2023),
(8, 'Nets', 1000, 2023),
(8, 'Ball Machines', 1500, 2023),
(8, 'First-Aid Kit', 200, 2023),
-- Team 9 (Cross Country)
(9, 'Running Shoes', 3000, 2023),
(9, 'Running Shorts', 1000, 2023),
(9, 'Running Shirts', 1500, 2023),
(9, 'Hydration Packs', 300, 2023),
(9, 'GPS Watches', 500, 2023),
(9, 'Heart Rate Monitors', 200, 2023),
(9, 'First-Aid Kit', 150, 2023),
(9, 'Athletic Tape', 100, 2023),
(9, 'Recovery Tools', 200, 2023),
(9, 'Nutrition Bars', 100, 2023),
-- Team 10 (Lacrosse)
(10, 'Lacrosse Sticks', 2000, 2023),
(10, 'Lacrosse Balls', 500, 2023),
(10, 'Protective Gear', 1500, 2023),
(10, 'Cleats', 1000, 2023),
(10, 'Jerseys', 1500, 2023),
(10, 'Shorts', 800, 2023),
(10, 'Goalie Pads', 500, 2023),
(10, 'Field Markers', 200, 2023),
(10, 'First-Aid Kit', 200, 2023),
(10, 'Hydration Packs', 300, 2023);



-- Rank Table Info

INSERT INTO `Ranks` (`TeamId`, `RankNumber`, `RankDate`)
VALUES
    (1, 1, '2023-11-25'),
    (2, 2, '2024-02-12'),
    (3, 3, '2023-10-21'),
    (4, 4, '2024-03-02'),
    (5, 5, '2024-04-13'),
    (6, 6, '2023-11-18'),
    (7, 7, '2024-01-27'),
    (8, 8, '2023-09-29'),
    (9, 9, '2024-03-23'),
    (10, 10, '2024-04-15');
	
-- Income Table Info

INSERT INTO `Income` (`TeamId`, `Type`, `Amount`, `Year`)
VALUES
-- Team 1 (Football)
(1, 'Ticket Sales', 500000, 2023),
(1, 'Merchandise Sales', 100000, 2023),
(1, 'Sponsorship', 250000, 2023),
(1, 'TV Rights', 300000, 2023),
(1, 'Concessions', 75000, 2023),
(1, 'Parking', 50000, 2023),
(1, 'Donations', 100000, 2023),
(1, 'Licensing', 200000, 2023),
(1, 'Gameday Programs', 25000, 2023),
(1, 'Raffles', 15000, 2023),
-- Team 2 (Basketball)
(2, 'Ticket Sales', 300000, 2023),
(2, 'Merchandise Sales', 75000, 2023),
(2, 'Sponsorship', 200000, 2023),
(2, 'TV Rights', 250000, 2023),
(2, 'Concessions', 50000, 2023),
(2, 'Parking', 30000, 2023),
(2, 'Donations', 80000, 2023),
(2, 'Licensing', 150000, 2023),
(2, 'Gameday Programs', 20000, 2023),
(2, 'Raffles', 10000, 2023),
  -- Team 3 (Soccer)
(3, 'Ticket Sales', 200000, 2023),
(3, 'Merchandise Sales', 50000, 2023),
(3, 'Sponsorship', 150000, 2023),
(3, 'TV Rights', 200000, 2023),
(3, 'Concessions', 30000, 2023),
(3, 'Parking', 20000, 2023),
(3, 'Donations', 60000, 2023),
(3, 'Licensing', 100000, 2023),
(3, 'Gameday Programs', 15000, 2023),
(3, 'Raffles', 8000, 2023),
-- Team 4 (Volleyball)
(4, 'Ticket Sales', 150000, 2023),
(4, 'Merchandise Sales', 35000, 2023),
(4, 'Sponsorship', 100000, 2023),
(4, 'TV Rights', 150000, 2023),
(4, 'Concessions', 20000, 2023),
(4, 'Parking', 15000, 2023),
(4, 'Donations', 50000, 2023),
(4, 'Licensing', 80000, 2023),
(4, 'Gameday Programs', 10000, 2023),
(4, 'Raffles', 7000, 2023),
-- Team 5 (Track and Field)
(5, 'Ticket Sales', 180000, 2023),
(5, 'Merchandise Sales', 40000, 2023),
(5, 'Sponsorship', 120000, 2023),
(5, 'TV Rights', 180000, 2023),
(5, 'Concessions', 25000, 2023),
(5, 'Parking', 18000, 2023),
(5, 'Donations', 60000, 2023),
(5, 'Licensing', 100000, 2023),
(5, 'Gameday Programs', 12000, 2023),
(5, 'Raffles', 8000, 2023),
-- Team 6 (Swimming and Diving)
(6, 'Ticket Sales', 120000, 2023),
(6, 'Merchandise Sales', 30000, 2023),
(6, 'Sponsorship', 80000, 2023),
(6, 'TV Rights', 120000, 2023),
(6, 'Concessions', 20000, 2023),
(6, 'Parking', 12000, 2023),
(6, 'Donations', 40000, 2023),
(6, 'Licensing', 70000, 2023),
(6, 'Gameday Programs', 10000, 2023),
(6, 'Raffles', 6000, 2023),
-- Team 7 (Gymnastics)
(7, 'Ticket Sales', 180000, 2023),
(7, 'Merchandise Sales', 45000, 2023),
(7, 'Sponsorship', 110000, 2023),
(7, 'TV Rights', 160000, 2023),
(7, 'Concessions', 22000, 2023),
(7, 'Parking', 14000, 2023),
(7, 'Donations', 55000, 2023),
(7, 'Licensing', 90000, 2023),
(7, 'Gameday Programs', 11000, 2023),
(7, 'Raffles', 7500, 2023),
-- Team 8 (Tennis)
(8, 'Ticket Sales', 160000, 2023),
(8, 'Merchandise Sales', 40000, 2023),
(8, 'Sponsorship', 110000, 2023),
(8, 'TV Rights', 170000, 2023),
(8, 'Concessions', 22000, 2023),
(8, 'Parking', 14000, 2023),
(8, 'Donations', 55000, 2023),
(8, 'Licensing', 90000, 2023),
(8, 'Gameday Programs', 11000, 2023),
(8, 'Raffles', 7500, 2023),
-- Team 9 (Cross Country)
(9, 'Ticket Sales', 100000, 2023),
(9, 'Merchandise Sales', 25000, 2023),
(9, 'Sponsorship', 70000, 2023),
(9, 'TV Rights', 100000, 2023),
(9, 'Concessions', 15000, 2023),
(9, 'Parking', 10000, 2023),
(9, 'Donations', 40000, 2023),
(9, 'Licensing', 60000, 2023),
(9, 'Gameday Programs', 8000, 2023),
(9, 'Raffles', 5000, 2023),
-- Team 10 (Lacrosse)
(10, 'Ticket Sales', 120000, 2023),
(10, 'Merchandise Sales', 30000, 2023),
(10, 'Sponsorship', 80000, 2023),
(10, 'TV Rights', 120000, 2023),
(10, 'Concessions', 20000, 2023),
(10, 'Parking', 12000, 2023),
(10, 'Donations', 40000, 2023),
(10, 'Licensing', 70000, 2023),
(10, 'Gameday Programs', 10000, 2023),
(10, 'Raffles', 6000, 2023);

-- Insert Roles Table

INSERT INTO `roles` (`id`, `username`, `role`) VALUES
(1, 'bsmith', 'admin'),
(2, 'pjones', 'employee');


-- Insert Users Table


INSERT INTO `users` (`forename`, `surname`, `username`, `password`) VALUES
('Bill', 'Smith', 'bsmith', '$2y$10$1JZ.JEFMwbQV4IQBRBA4xOEttL8ZNbZX4Ujfp95HcwbnrgCz/KA4S'),
('Pauline', 'Jones', 'pjones', '$2y$10$ZTQddN7PweZRx13/vX/ti.EG2NlgdeQkDODJsBpQuFakTBwF5RLV2');
