-- DATENBANK ERSTELLEN

CREATE DATABASE IF NOT EXISTS notennest;
USE notennest;


-- USER ERSTELLEN
CREATE USER IF NOT EXISTS notennestDBUser IDENTIFIED BY 'notennestPW';
GRANT ALL ON notennest.* TO notennestDBUser;

-- TABELLEN ERSTELLEN

CREATE TABLE IF NOT EXISTS manufacturer (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS inventory (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description varchar(400),
    manufacturerID int NOT NULL,
    available boolean NOT NULL,
    price float,
    category varchar(50),
    product_image varchar(100),
    FOREIGN KEY (manufacturerID) REFERENCES manufacturer(id)
);

CREATE TABLE IF NOT EXISTS inquiries (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email varchar(30) NOT NULL,
    subject varchar(50) NOT NULL,
    message varchar(400) NOT NULL
);

-- TESTDATEN EINFÜGEN

-- Hersteller für Gitarren
INSERT INTO manufacturer (id, name) VALUES
    (1, 'Fender'),
    (2, 'Gibson'),
    (3, 'Ibanez');

-- Hersteller für Schlagzeuge
INSERT INTO manufacturer (id, name) VALUES
    (4, 'Pearl'),
    (5, 'Ludwig'),
    (6, 'DW Drums');

-- Hersteller für Blasinstrumente
INSERT INTO manufacturer (id, name) VALUES
    (7, 'Yamaha'),
    (8, 'Selmer'),
    (9, 'Jupiter');

-- Hersteller für Tasteninstrumente
INSERT INTO manufacturer (id, name) VALUES
    (10, 'Roland'),
    (11, 'Yamaha'),
    (12, 'Korg');

-- Hersteller für Eventtechnik
INSERT INTO manufacturer (id, name) VALUES
    (13, 'Shure'),
    (14, 'JBL'),
    (15, 'Sennheiser');

-- Hersteller für DJ-Equipment
INSERT INTO manufacturer (id, name) VALUES
    (16, 'Pioneer DJ'),
    (17, 'Native Instruments'),
    (18, 'Denon DJ');


-- INVENTORY
-- Die Verfügbarkeit der Gegenstände ist aus Testzwecken zufällig

-- Produkte für Fender (Gitarren)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Fender Stratocaster', 'Eine legendäre E-Gitarre mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 1, RAND() > 0.5, 20.00, 'Gitarren', 'fender_stratocaster.jpg');

-- Produkte für Gibson (Gitarren)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Gibson Les Paul Standard', 'Eine klassische E-Gitarre mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 2, RAND() > 0.5, 25.00, 'Gitarren', 'gibson_les_paul.jpg');

-- Produkte für Ibanez (Gitarren)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Ibanez RG550', 'Eine vielseitige E-Gitarre mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 3, RAND() > 0.5, 18.00, 'Gitarren', 'ibanez_rg550.jpg');

-- Produkte für Pearl (Schlagzeuge)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Pearl Export Series Drum Kit', 'Ein hochwertiges Schlagzeugset mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 4, RAND() > 0.5, 40.00, 'Schlagzeuge', 'pearl_drum_kit.jpg');

-- Produkte für Ludwig (Schlagzeuge)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Ludwig Classic Maple Drum Kit', 'Ein klassisches Schlagzeugset mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 5, RAND() > 0.5, 45.00, 'Schlagzeuge', 'ludwig_drum_kit.jpg');

-- Produkte für DW Drums (Schlagzeuge)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('DW Collectors Series Drum Kit', 'Ein hochwertiges Custom-Drumset mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 6, RAND() > 0.5, 55.00, 'Schlagzeuge', 'dw_drum_kit.jpg');

-- Produkte für Yamaha (Blasinstrumente)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Yamaha YAS-280 Alto Saxophone', 'Ein professionelles Altsaxophon mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 7, RAND() > 0.5, 30.00, 'Blasinstrumente', 'yamaha_alto_sax.jpg');

-- Produkte für Selmer (Blasinstrumente)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Selmer Mark VI Tenor Saxophone', 'Ein legendäres Tenorsaxophon mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 8, RAND() > 0.5, 35.00, 'Blasinstrumente', 'selmer_tenor_sax.jpg');

-- Produkte für Jupiter (Blasinstrumente)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Jupiter JFL511 Flute', 'Eine hochwertige Querflöte mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 9, RAND() > 0.5, 22.00, 'Blasinstrumente', 'jupiter_flute.jpg');

-- Produkte für Roland (Tasteninstrumente)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Roland RD-2000 Stage Piano', 'Ein hochwertiges Bühnenklavier mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 10, RAND() > 0.5, 50.00, 'Tasteninstrumente', 'roland_stage_piano.jpg');

-- Produkte für Yamaha (Tasteninstrumente)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Yamaha YDP-144 Digital Piano', 'Ein hochwertiges Digitalpiano mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 11, RAND() > 0.5, 40.00, 'Tasteninstrumente', 'yamaha_digital_piano.jpg');

-- Produkte für Korg (Tasteninstrumente)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Korg Kronos 88-Key Synthesizer Workstation', 'Eine professionelle Workstation mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 12, RAND() > 0.5, 60.00, 'Tasteninstrumente', 'korg_kronos.jpg');

-- Produkte für Shure (Eventtechnik)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Shure SM58 Dynamic Microphone', 'Ein klassisches Bühnenmikrofon mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 13, RAND() > 0.5, 10.00, 'Eventtechnik', 'shure_sm58.jpg');

-- Produkte für JBL (Eventtechnik)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('JBL EON615 Powered Speaker', 'Ein aktiver PA-Lautsprecher mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 14, RAND() > 0.5, 15.00, 'Eventtechnik', 'jbl_eon615.jpg');

-- Produkte für Sennheiser (Eventtechnik)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Sennheiser EW 100 G4 Wireless Microphone System', 'Ein drahtloses Mikrofonsystem mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 15, RAND() > 0.5, 20.00, 'Eventtechnik', 'sennheiser_wireless_mic.jpg');

-- Produkte für Pioneer DJ (DJ-Equipment)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Pioneer DJ CDJ-2000NXS2', 'Ein professioneller CD-Player für DJs mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 16, RAND() > 0.5, 30.00, 'DJ equipment', 'pioneer_cd_player.jpg');

-- Produkte für Native Instruments (DJ-Equipment)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Native Instruments Traktor Kontrol S4', 'Ein DJ-Controller von Native Instruments mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 17, RAND() > 0.5, 25.00, 'DJ equipment', 'native_instruments_controller.jpg');

-- Produkte für Denon DJ (DJ-Equipment)
INSERT INTO inventory (name, description, manufacturerID, available, price, category, product_image) VALUES
    ('Denon DJ Prime 4', 'Ein leistungsstarker Standalone-DJ-Controller von Denon DJ mit einer ausführlichen Beschreibung, die mehr als 1000 Zeichen enthält. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in arcu eget arcu laoreet fermentum vel sit amet odio. Integer vitae felis at elit iaculis viverra nec eu justo. Duis vitae pharetra turpis, id sollicitudin neque. Suspendisse eleifend justo eu dolor lacinia, a fermentum odio congue. Nulla facilisi. Nullam vel felis ac odio cursus euismod. Nullam sit amet arcu a ante convallis scelerisque. Sed tincidunt erat in magna vehicula luctus. Sed sit amet quam auctor, laoreet orci eu, ultrices turpis. Vivamus et dolor ut quam venenatis tristique. Nullam eu felis sed nunc euismod malesuada. Vivamus id tortor nunc. Donec sagittis metus id ante cursus, eget pellentesque justo viverra.', 18, RAND() > 0.5, 35.00, 'DJ equipment', 'denon_dj_controller.jpg');