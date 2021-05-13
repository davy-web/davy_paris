-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 mai 2021 à 04:49
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `davy_paris`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `titre_info` varchar(255) NOT NULL,
  `description_info` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `box` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `description`, `photo`, `titre_info`, `description_info`, `categorie`, `box`, `adresse`, `map`) VALUES
(1, 'Jaipur Café', 'Vous tomberez sous le charme de ce décor indien aux couleurs parme et rose du Rajasthan. Dans une ambiance bollywoodienne au plein cœur de Paris, découvrez une palette d\'épices relevant astucieusement les mets proposés. Les plats vous sont servis avec l\'amabilité et le sourire bien connus de l\'Inde. Vous apprécierez le son du sitar pour une soirée typiquement indienne !', 'jaipur-cafe.jpg', 'Programme', 'Un menu \"Jaipur\" par personne (cocktail + entrée + pain traditionnel + plat + dessert)', 'Restaurant', 'Gastronomie', '15-17 Rue des Messageries, 75010 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10496.219863931889!2d2.3494165!3d48.8762287!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x88458fe40042b5b3!2sJaipur%20Caf%C3%A9%20%7C%20Restaurant%20Indien!5e0!3m2!1sfr!2sfr!4v1619457668212!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(2, 'La Marée', 'Situé à deux pas des Champs-Élysées, le restaurant La Marée vous invite à découvrir une cuisine de poissons savoureuse et raffinée. Vous serez séduits par la sélection des produits de la mer évoluant au rythme des saisons. Dotée d\'une cave d\'exception, La Marée séduit les amoureux de cuisine française dans une belle association mets et vins.', 'la-maree.jpg', 'Programme', 'Un menu \"La Marée\" par personne (apéritif + entrée + plat ou apéritif + plat + dessert)', 'Restaurant', 'Gastronomie', 'Paris (75008)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(3, 'La Coupole', 'La Coupole est un exemple unique de l’art déco des brasseries parisiennes et le symbole incontournable de l’art de vivre à la française. Dans un espace repensé, la Coupole propose de partager de nouveaux moments de convivialité à chaque heure du jour ou de la nuit, en conciliant la magie d’un lieu unique avec un service attentionné auprès de ses clients. Le chef a composé la carte du déjeuner et du diner autour de grands classiques de Brasserie et des recettes plus contemporaines.', 'la-coupole.jpg', 'Programme', 'Un menu \"Coupole\" par personne (entrée + plat + café + eau + vin ou plat + dessert + café + eau + vin)', 'Restaurant', 'Gastronomie', 'Paris (75014)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(4, 'Cèdres du Liban', 'Rendez-vous dans le plus ancien restaurant libanais de Paris, dans le 15e arrondissement. Depuis 40 ans, il propose une succulente cuisine familiale, traditionnelle et authentique, qui ravit tous les gourmets. Laissez-vous aussi séduire par le décor pittoresque, typique de la Méditerranée : murs en pierre blanche, arcades, fresques et tableaux de peintres libanais aux murs.', 'cedres-du-liban.jpg', 'Programme', 'Un repas par personne (apéritif + entrée + plat)', 'Restaurant', 'Gastronomie', 'Paris (75010)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(5, 'Gourmands Disent', 'Niché dans le 15e arrondissement de Paris, le restaurant Les Gourmands Disent vous réserve bien des surprises ! Aux fourneaux, le Chef revisite avec talent les classiques de la gastronomie française. Découvrez des recettes savoureuses et créatives, dans un cadre cosy et décontracté. Cerise sur le gâteau : ici, tout est frais et fait maison. Alors, qu\'en dites-vous ?', 'gourmands-disent.jpg', 'Programme', 'Un repas par personne (entrée + plat + vin ou plat + dessert + vin)', 'Restaurant', 'Gastronomie', 'Paris (75015)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(6, 'Jodhpur Palace', 'Embarquez pour un voyage culinaire plein de saveurs. Dans un décor traditionnel et raffiné au cœur du 12ème arrondissement de Paris, M. Baldev est fier de recevoir ses hôtes au Jodhpur Palace. Vous y dégustez la cuisine de Jodhpur, du nom de la ville au nord de l\'Inde. Au travers de délicieux plats présentés avec soin, c\'est une véritable initiation gourmande qui vous attend.', 'jodhpur-palace.jpg', 'Programme', 'Un menu \"Wonderbox\" par personne (entrée + plat + dessert + vin)', 'Restaurant', 'Gastronomie', 'Paris (75012)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(7, 'Bon Spa Thaï', 'Une envie d\'évasion ? Passez la porte de Bon Spa Thaï, un cocon dépaysant dans le 2ème arrondissement de Paris. Dans une ambiance douce et apaisante, une équipe professionnelle mettra son expertise au service de votre bien-être. Laissez-vous emporter par les bienfaits d\'un massage inspiré des méthodes traditionnelles thaïlandaises, le temps d\'un moment zen...', 'bon-spa-thai.jpg', 'Programme', 'Un massage aux huiles chaudes \"100% Bio\" en duo - 30 min', 'Spa', 'Bien-être', 'Paris (75002)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(8, 'Lôk Siam Spa Alésia', 'Au cœur de Paris, imaginez un lieu calme et apaisant où vous pourrez vous laisser aller aux bienfaits de soins traditionnels thaï. Lôk Siam Spa vous propose de plonger dans un univers de tradition et de savoir-faire millénaire où votre bien-être sera au centre des priorités. Une parenthèse dépaysante pour retrouver une profonde sérénité', 'lok-siam-spa-alesia.jpg', 'Programme', 'Un modelage thaï traditionnel - 30 min', 'Spa', 'Bien-être', 'Paris (75014)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(9, 'Spa Thaï Luxe Versailles', 'Né il y a plus de 2500 ans, le massage thaï traditionnel puise ses origines dans les traditions chinoises et indiennes. Dans le Spa Thaï Luxe Versailles à Paris, bénéficiez de ses bienfaits entre les mains de masseuses formées par une école de médecine et de massages traditionnelles de Bangkok. Dans un décor zen et coloré, embarquez pour un doux voyage sensoriel !', 'spa-thai-luxe versailles.jpg', 'Programme', 'Une séance de réflexologie plantaire - 30 min', 'Spa', 'Bien-être', 'Paris (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(10, 'Aime Thaï Spa', 'Il est des endroits qui emplissent le corps de bien-être et l\'esprit de sérénité : Aime Thaï Spa est de ceux-ci. Au cœur de Paris, dans le 11ème arrondissement, poussez les portes de ce petit paradis de la détente pour oublier le stress de la ville et vous ressourcer en toute quiétude. Vous pourrez y savourer des soins de qualité, vous relaxer paisiblement, libérer vos tensions et souffler...', 'aime-thai-spa.jpg', 'Programme', 'Un modelage aux huiles chaudes - 30 min', 'Spa', 'Bien-être', 'Paris 11ème (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(11, 'Sunso Sun & Beauty Lounge', 'Sunso Sun & Beauty Lounge a imaginé des salons où les matériaux soulignent le confort des cabines. Le mot d\'ordre est simple : bronzer, mincir et rajeunir ! L\'équipe du salon vous proposera des solutions spécifiques dans de nombreux domaines comme l\'épilation classique ou durable, les soins anti-âge, l\'amincissement ou le bronzage avec et sans UV. Une pause de détente à Paris.', 'sunso-sun.jpg', 'Programme', 'Un forfait d’une valeur de 85€ à choisir dans toute la gamme de soins et services : bronzage, épilation, amincissement, soin anti-âge...', 'Spa', 'Bien-être', 'Paris (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(12, 'Zzz Zen Bar', 'De l\'art de la sieste... Zzz Zen Bar à sieste est dédié au mode de vie urbain : micro-siestes et massages assis pour récupérer entre deux rendez-vous, fauteuils apesanteur et autres soins relaxants, vous permettront de faire le plein d\'énergie au cours de vos journées à 200 à l\'heure. Situé dans le pittoresque passage Choiseul à Paris, ne vous privez pas du détour.', 'zzz-zen-bar.jpg', 'Programme', '- Une sieste \"Royale\" en duo - 45 min<br>\r\n- Un fish spa (nettoyage, bain de poissons, crème) - 20 min<br>', 'Spa', 'Bien-être', 'Paris (75002)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(13, 'L\'Aquarium de Paris', 'Dans les profondeurs des reliefs surplombant les jardins du Trocadéro, à Paris, plongez au cœur d\'un fascinant univers aquatique de 10 000 poissons et invertébrés et de 25 requins. Au sein du bassin caresses, les enfants pourront approcher et toucher les poissons d\'eau douce. Le temps d\'une journée en famille, profitez des multiples animations interactives et ludiques à disposition.', 'aquarium-de-paris.jpg', 'Programme', '1 entrée', 'Aquarium', 'Loisirs', 'Paris (75016)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(14, 'Ballon de Paris', 'Envie de prendre de la hauteur ? De voir Paris comme vous ne l\'avez jamais vue ? Élevez-vous à bord de ce grand ballon captif ! Installé depuis 1999 dans le parc André Citroën, le Ballon de Paris peut contenir jusqu\'à 30 personnes à 150 mètres du sol. Là-haut, profitez d\'un panorama exceptionnel sur la capitale. Décollage imminent !', 'ballon-de-paris.jpg', 'Programme', '- 8 à 10 minutes de vol en ballon captif<br>\r\n- 2 cadeaux souvenirs<br>', 'Vol en ballon', 'Loisirs', 'Paris (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(15, 'Poterie et Compagnie', 'Goûtez aux bienfaits d\'une activité manuelle en plein cœur de Paris avec Poterie et Compagnie. Dans un cadre clair et chaleureux, guidés par une céramiste expérimentée et passionnée, vous apprendrez les techniques nécessaires pour réaliser de véritables objets en terre. Une activité ludique et relaxante qui vous aidera à éveiller votre sensibilité artistique.', 'poterie-et-compagnie.jpg', 'Programme', 'Un cours particulier de poterie - 60 min', 'Poterie', 'Loisirs', 'Paris (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(16, 'Cultur\'in the City', 'Au départ, il y a Benjamin, alors comédien, producteur et passionné de spectacles. En 2014, il lance sa start-up avec un objectif en tête : démocratiser et rendre accessible la culture au plus grand nombre. Aujourd’hui c’est devenu Cultur’In The City, qui a imaginé des coffrets cadeaux pour vous faire profiter des plus beaux spectacles.', 'culturin-the-city.jpg', 'Programme', 'Une carte quatre places de spectacle \"Découverte\" Cultur\'in the City pour une ou deux personnes valable un an.', 'Spectacle', 'Loisirs', 'Paris (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(17, 'Marin d\'eau douce', 'Découvrez différemment la sublime ville de Paris ! Marin d\'eau douce vous propose des bateaux électriques et sans permis faciles à piloter, pour une balade unique à Paris sur le canal de l\'Ourcq. Aux commandes du bateau, vous vous relaxerez et découvrirez Paris comme vous ne l\'avez jamais vu. Une croisière conviviale et respectueuse de l\'environnement.', 'marin-deau-douce.jpg', 'Programme', '- 30 minutes de navigation sur un bateau électrique sur le Bassin de la Villette<br>\r\n- 1 bouteille de rosé<br>', 'Bateau', 'Loisirs', 'Paris 19e (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(18, 'Cirque Bormann Moreno', 'Le Cirque Bormann Moreno vous propose à Paris son dernier spectacle \"Nouvelle Expérience\" où vous pourrez admirer les artistes trapézistes, jongleurs, équilibristes, clowns, mais surtout, pour la joie des petits comme des grands, les animaux : zèbre, dromadaires, chameaux, chevaux ou tigres. Des ateliers cirque sont offerts 30 minutes avant chaque spectacle.', 'cirque-bormann-moreno.jpg', 'Programme', 'Une place en \"Balcons\"', 'Cirque', 'Loisirs', 'Paris (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(19, 'Freedom Organisations', 'Freedom Organisations est spécialisé dans le transport de personnes à moto. Fred vous fera ainsi découvrir sa moto Goldwing GL1800 avec sièges chauffants, les grands monuments historiques de la capitale, les petites ruelles typiques et d\'autres endroits insolites.', 'freedom-organisations.jpg', 'Programme', '1 heure de visite de Paris en Taxi Moto', 'Visite', 'Aventure', 'Paris (8ème)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(20, 'Dream On Board', 'Et c\'est parti pour vingt minutes de plaisir intense sur les Champs-Élysées en Ferrari cabriolet ou en Lamborghini cabriolet. Vous vous souviendrez éternellement de la mélodie magique de votre bolide de légende ! Cheveux au vent, vous pourrez tout simplement vous prendre pour une star au style bling-bling.', 'dream-on-board.jpg', 'Programme', '20 minutes de pilotage à bord de Lamborghini Gallardo Spyder, Ferrari F430 Spider ou Ferrari California (également une cabriolet) sur les Champs-Élysées', 'Pilotage', 'Aventure', 'Paris (8ème)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(21, 'OldTimers Paris', '(Re)découvrez Paris à bord d\'une authentique Citroën Traction Avant ! De la tour Eiffel à l\'avenue des Champs-Elysées, de Montmartre aux petites rue de Saint-Germain des Prés, il y a tant de choses à voir et à admirer dans celle que l\'on surnomme la Ville Lumière. Une envie particulière ? Il suffit de demander ! Une façon originale et unique de parcourir la capitale. En route !', 'oldtimers-paris.jpg', 'Programme', '1 heure de balade personnalisée \"Découverte de Paris\" en Citroën Traction', 'Balade', 'Aventure', 'Paris (75015)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(22, 'Parisi Tour', 'Capitale mythique, Paris suscite toujours autant l\'émerveillement par son patrimoine architectural et culturel d\'exception. Pour ajouter au charme de la découverte, Parisi Tour vous embarque en 2CV, la plus emblématique des voitures françaises, le temps d\'une excursion à travers la Ville-Lumière en compagnie d\'un chauffeur-guide des plus truculents.', 'parisi-tour.jpg', 'Programme', 'Un tour \"Paris ! Paris !\" : 45 minutes de découverte de Paris - 45 min', 'Découverte', 'Aventure', 'Paris (75018)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(23, 'Marin d\'eau douce', 'Découvrez différemment la sublime ville de Paris ! Marin d\'eau douce vous propose des bateaux électriques et sans permis faciles à piloter, pour une balade unique à Paris sur le canal de l\'Ourcq. Aux commandes du bateau, vous vous relaxerez et découvrirez Paris comme vous ne l\'avez jamais vu. Une croisière conviviale et respectueuse de l\'environnement', 'marin-deau-douce.jpg', 'Programme', '- 1 bouteille de champagne\r\n- 1 heure de navigation sur un bateau électrique sur le bassin de la Villette', 'Bateau', 'Aventure', 'Paris (75012)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>'),
(24, 'VR & CO', 'VR & Co, c\'est un espace de 140 m2 au cœur de Paris dédié à la réalité virtuelle sous toutes ses formes. Seul ou en équipe, venez vivre des sensations très spéciales : exploration, escalade, escape games, courses, jeux de tir, plongée sous-marine ou vol au-dessus de Paris... il y a de quoi surprendre et satisfaire tout le monde !', 'vr-co.jpg', 'Programme', '40 minutes d\'expériences en réalité virtuelle (sans limite du nombre de jeux) accompagnés d\'un Game Master', 'Virtuelle', 'Aventure', 'Paris (75005)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `prix_total` float NOT NULL,
  `date` date NOT NULL,
  `etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `produit_id`, `membre_id`, `message`, `note`) VALUES
(1, 1, 1, 'Excellent, qualité du repas et personnel très courtois', 4),
(2, 1, 1, 'Service excellent. Personnel à notre service. Repas très bon.', 3),
(3, 1, 1, 'Excellent accueil et dîner très bon aun service discret', 5);

-- --------------------------------------------------------

--
-- Structure de la table `dashboard`
--

CREATE TABLE `dashboard` (
  `id_dashboard` int(11) NOT NULL,
  `nom_visit_page` varchar(255) NOT NULL,
  `nb_visit_page` int(11) NOT NULL,
  `date_visit_page` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dashboard`
--

INSERT INTO `dashboard` (`id_dashboard`, `nom_visit_page`, `nb_visit_page`, `date_visit_page`) VALUES
(1, 'Accueil', 20, '2021-05-09'),
(2, 'Accueil', 9, '2021-05-10'),
(3, 'Accueil', 12, '2021-05-11'),
(4, 'Accueil', 6, '2021-05-12'),
(5, 'Accueil', 1, '2021-05-13');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `email`
--

CREATE TABLE `email` (
  `id_email` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `email`
--

INSERT INTO `email` (`id_email`, `nom`, `email`, `sujet`, `message`) VALUES
(1, 'Nom', 'email@email.com', 'Sujet', 'Message');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_favoris` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mdpoublier`
--

CREATE TABLE `mdpoublier` (
  `id_mdpoublier` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `statut` int(5) NOT NULL,
  `limit_connexion` int(11) NOT NULL,
  `limit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom`, `prenom`, `email`, `mdp`, `statut`, `limit_connexion`, `limit_date`) VALUES
(1, 'Chen', 'Davy', 'chendavyweb@gmail.com', '$2y$10$PJa9QxOUnhVHXBO0xrMgpu1Uz0Qg5uOPsquKOftJ/iKgK09nphI9u', 2, 0, '2021-05-12');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `titre`, `description`, `photo`, `prix`, `stock`) VALUES
(1, 'Gastronomie', 'Mettez les petits plats dans les grands avec ce coffret aux 735 tables romantiques, où vous attend un délicieux repas avec apéritif, vin ou coupe de champagne. Évadez-vous à deux pour une cuisine régionale raffinée au Royal à Troyes, vivez une véritable escapade gourmande en duo au Roof à Vannes, laissez-vous tenter par des plats traditionnels bretons au Pic à Lorient ou encore profitez d’une vue enchanteresse sur la Grande Place de Lille au restaurant Le Compostelle. Votre moitié va adorer !', 'jaipur-cafe.jpg', 70, 24),
(2, 'Aventure', 'Accro aux sensations fortes ? Osez une expérience inoubliable et vivez le grand frisson grâce à ce coffret plein d’activités exceptionnelles ! Simulateur de chute libre, pilotage d\'une Subaru, vol en parachute ascensionnel, baptême de l’air en ULM, session de scooter des mers, via ferrata sur la Roche Veyrand… Offrez-vous une bonne dose d’adrénaline en réalisant l’un de vos rêves !', 'marin-deau-douce.jpg', 100, 25),
(3, 'Bien-être', 'Chassez le stress et plongez dans un cocon de douceur avec cette sélection de 2455 soins et massages* bien-être en duo. Un modelage californien chez Naturellement Luxe NL Paris dans notre belle capitale, un massage* hawaïen aux huiles chaudes bio chez Atalant Massages à Laval ou un accès complet à l’espace bien-être de l’Hôtel Montaigne & Spa sous le soleil de Cannes… Inspirez, expirez et laissez-vous aller à la relaxation : c’est si bon ! ', 'bon-spa-thai.jpg', 90, 25),
(4, 'Loisirs', 'La preuve, nous avons rassemblé dans ce coffret 1 640 loisirs et activités pour 2 à 6 personnes, qui régaleront petits et grands. Sortie à l’aquarium de Paris pour faire connaissance avec ses 10 000 pensionnaires, atelier culinaire pour savourer une bonne dose de bonheur, découverte du bassin de la Villette en bateau électrique, rencontre avec le nouveau monde de Mini World Lyon… Vous voyez, on vous l’avait dit !', 'ballon-de-paris.jpg', 60, 25);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id_dashboard`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`);

--
-- Index pour la table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_favoris`);

--
-- Index pour la table `mdpoublier`
--
ALTER TABLE `mdpoublier`
  ADD PRIMARY KEY (`id_mdpoublier`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id_dashboard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_favoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mdpoublier`
--
ALTER TABLE `mdpoublier`
  MODIFY `id_mdpoublier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
