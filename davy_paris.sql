-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 30 mai 2021 à 02:18
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
  `map` text NOT NULL,
  `etat` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `titre`, `description`, `photo`, `titre_info`, `description_info`, `categorie`, `box`, `adresse`, `map`, `etat`, `membre_id`) VALUES
(1, 'Jaipur Café', 'Vous tomberez sous le charme de ce décor indien aux couleurs parme et rose du Rajasthan. Dans une ambiance bollywoodienne au plein cœur de Paris, découvrez une palette d\'épices relevant astucieusement les mets proposés. Les plats vous sont servis avec l\'amabilité et le sourire bien connus de l\'Inde. Vous apprécierez le son du sitar pour une soirée typiquement indienne !', 'jaipur-cafe.jpg', 'Programme', 'Un menu \"Jaipur\" par personne (cocktail + entrée + pain traditionnel + plat + dessert)', 'Restaurant', 'Gastronomie', '15-17 Rue des Messageries, 75010 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10496.219863931889!2d2.3494165!3d48.8762287!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x88458fe40042b5b3!2sJaipur%20Caf%C3%A9%20%7C%20Restaurant%20Indien!5e0!3m2!1sfr!2sfr!4v1619457668212!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(2, 'La Marée', 'Situé à deux pas des Champs-Élysées, le restaurant La Marée vous invite à découvrir une cuisine de poissons savoureuse et raffinée. Vous serez séduits par la sélection des produits de la mer évoluant au rythme des saisons. Dotée d\'une cave d\'exception, La Marée séduit les amoureux de cuisine française dans une belle association mets et vins.', 'la-maree.jpg', 'Programme', 'Un menu \"La Marée\" par personne (apéritif + entrée + plat ou apéritif + plat + dessert)', 'Restaurant', 'Gastronomie', '1 Rue Daru, 75008 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10496.007828873993!2d2.300502211556192!3d48.87723923487808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66f9553967db5%3A0xad108e1a23bf6391!2s1%20Rue%20Daru%2C%2075008%20Paris!5e0!3m2!1sfr!2sfr!4v1622317782797!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(3, 'La Coupole', 'La Coupole est un exemple unique de l’art déco des brasseries parisiennes et le symbole incontournable de l’art de vivre à la française. Dans un espace repensé, la Coupole propose de partager de nouveaux moments de convivialité à chaque heure du jour ou de la nuit, en conciliant la magie d’un lieu unique avec un service attentionné auprès de ses clients. Le chef a composé la carte du déjeuner et du diner autour de grands classiques de Brasserie et des recettes plus contemporaines.', 'la-coupole.jpg', 'Programme', 'Un menu \"Coupole\" par personne (entrée + plat + café + eau + vin ou plat + dessert + café + eau + vin)', 'Restaurant', 'Gastronomie', '102 Boulevard du Montparnasse, 75014 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.835981666417!2d2.325959351580363!3d48.84226717918424!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671cec4369a6b%3A0x8fa64702fc94b419!2s102%20Boulevard%20du%20Montparnasse%2C%2075014%20Paris!5e0!3m2!1sfr!2sfr!4v1622331887548!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(4, 'Cèdres du Liban', 'Rendez-vous dans le plus ancien restaurant libanais de Paris, dans le 15e arrondissement. Depuis 40 ans, il propose une succulente cuisine familiale, traditionnelle et authentique, qui ravit tous les gourmets. Laissez-vous aussi séduire par le décor pittoresque, typique de la Méditerranée : murs en pierre blanche, arcades, fresques et tableaux de peintres libanais aux murs.', 'cedres-du-liban.jpg', 'Programme', 'Un repas par personne (apéritif + entrée + plat)', 'Restaurant', 'Gastronomie', '5 Avenue du Maine, 75015 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d168145.04205593644!2d2.2135148661069635!3d48.81498057076378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67032d0a5dc39%3A0x9cea77a4b54565bf!2sRestaurant%20Libanais%20Les%20C%C3%A8dres%20du%20Liban!5e0!3m2!1sfr!2sfr!4v1622331970915!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(5, 'Gourmands Disent', 'Niché dans le 15e arrondissement de Paris, le restaurant Les Gourmands Disent vous réserve bien des surprises ! Aux fourneaux, le Chef revisite avec talent les classiques de la gastronomie française. Découvrez des recettes savoureuses et créatives, dans un cadre cosy et décontracté. Cerise sur le gâteau : ici, tout est frais et fait maison. Alors, qu\'en dites-vous ?', 'gourmands-disent.jpg', 'Programme', 'Un repas par personne (entrée + plat + vin ou plat + dessert + vin)', 'Restaurant', 'Gastronomie', '235 bis Rue St Charles, 75015 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d168145.6113224339!2d2.212827886459619!3d48.8148108445379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x949d7ddaee8ddfb1!2sRestaurant%20Les%20gourmands%20disent!5e0!3m2!1sfr!2sfr!4v1622332043637!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(6, 'Jodhpur Palace', 'Embarquez pour un voyage culinaire plein de saveurs. Dans un décor traditionnel et raffiné au cœur du 12ème arrondissement de Paris, M. Baldev est fier de recevoir ses hôtes au Jodhpur Palace. Vous y dégustez la cuisine de Jodhpur, du nom de la ville au nord de l\'Inde. Au travers de délicieux plats présentés avec soin, c\'est une véritable initiation gourmande qui vous attend.', 'jodhpur-palace.jpg', 'Programme', 'Un menu par personne (entrée + plat + dessert + vin)', 'Restaurant', 'Gastronomie', '42 Allée Vivaldi, 75012 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.8451882399236!2d2.38969221785419!3d48.84209157677732!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6726ce9084499%3A0x480345aec38e45e5!2sJodhpur%20Palace!5e0!3m2!1sfr!2sfr!4v1622332141730!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(7, 'Bon Spa Thaï', 'Une envie d\'évasion ? Passez la porte de Bon Spa Thaï, un cocon dépaysant dans le 2ème arrondissement de Paris. Dans une ambiance douce et apaisante, une équipe professionnelle mettra son expertise au service de votre bien-être. Laissez-vous emporter par les bienfaits d\'un massage inspiré des méthodes traditionnelles thaïlandaises, le temps d\'un moment zen...', 'bon-spa-thai.jpg', 'Programme', 'Un massage aux huiles chaudes \"100% Bio\" en duo - 30 min', 'Spa', 'Bien-être', '27 Rue Saint-Sauveur, 75002 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d84015.28735525419!2d2.3206685754758274!3d48.84909996207779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xce5b08defe8f1258!2sBon%20Spa%20Thai%20-%20Paris%202%C3%A8me!5e0!3m2!1sfr!2sfr!4v1622332561827!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(8, 'Lôk Siam Spa Alésia', 'Au cœur de Paris, imaginez un lieu calme et apaisant où vous pourrez vous laisser aller aux bienfaits de soins traditionnels thaï. Lôk Siam Spa vous propose de plonger dans un univers de tradition et de savoir-faire millénaire où votre bien-être sera au centre des priorités. Une parenthèse dépaysante pour retrouver une profonde sérénité', 'lok-siam-spa-alesia.jpg', 'Programme', 'Un modelage thaï traditionnel - 30 min', 'Spa', 'Bien-être', '93 -95 Avenue du Général Leclerc, 75014 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.6751821773837!2d2.3245192515798796!3d48.82625867918262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671ae2884e277%3A0xb4ec1158ea854957!2sLok%20Siam%20Spa%20Al%C3%A9sia!5e0!3m2!1sfr!2sfr!4v1622332476272!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(9, 'Spa Thaï Luxe Versailles', 'Né il y a plus de 2500 ans, le massage thaï traditionnel puise ses origines dans les traditions chinoises et indiennes. Dans le Spa Thaï Luxe Versailles à Paris, bénéficiez de ses bienfaits entre les mains de masseuses formées par une école de médecine et de massages traditionnelles de Bangkok. Dans un décor zen et coloré, embarquez pour un doux voyage sensoriel !', 'spa-thai-luxe versailles.jpg', 'Programme', 'Une séance de réflexologie plantaire - 30 min', 'Spa', 'Bien-être', '254 Rue de la Croix Nivert, 75015 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.2682648619184!2d2.287657751580142!3d48.834021479183626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6717194c9c67b%3A0xb0d8ef424d79c04f!2sSPA%20THA%C3%8F%20LUXE%20PORTE%20DE%20VERSAILLES%20Massage%20Tha%C3%AF%20Paris!5e0!3m2!1sfr!2sfr!4v1622332604295!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(10, 'Aime Thaï Spa', 'Il est des endroits qui emplissent le corps de bien-être et l\'esprit de sérénité : Aime Thaï Spa est de ceux-ci. Au cœur de Paris, dans le 11ème arrondissement, poussez les portes de ce petit paradis de la détente pour oublier le stress de la ville et vous ressourcer en toute quiétude. Vous pourrez y savourer des soins de qualité, vous relaxer paisiblement, libérer vos tensions et souffler...', 'aime-thai-spa.jpg', 'Programme', 'Un modelage aux huiles chaudes - 30 min', 'Spa', 'Bien-être', '84 Rue de la Folie Méricourt, 75011 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12485.256897938907!2d2.3668791815304115!3d48.86389378560524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66de2dab01595%3A0xdd41203a269daf59!2sAIME%20THAI%20SPA!5e0!3m2!1sfr!2sfr!4v1622332689588!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(11, 'Sunso Sun & Beauty Lounge', 'Sunso Sun & Beauty Lounge a imaginé des salons où les matériaux soulignent le confort des cabines. Le mot d\'ordre est simple : bronzer, mincir et rajeunir ! L\'équipe du salon vous proposera des solutions spécifiques dans de nombreux domaines comme l\'épilation classique ou durable, les soins anti-âge, l\'amincissement ou le bronzage avec et sans UV. Une pause de détente à Paris.', 'sunso-sun.jpg', 'Programme', 'Un forfait d’une valeur de 85€ à choisir dans toute la gamme de soins et services : bronzage, épilation, amincissement, soin anti-âge...', 'Spa', 'Bien-être', 'Paris (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(12, 'Zzz Zen Bar', 'De l\'art de la sieste... Zzz Zen Bar à sieste est dédié au mode de vie urbain : micro-siestes et massages assis pour récupérer entre deux rendez-vous, fauteuils apesanteur et autres soins relaxants, vous permettront de faire le plein d\'énergie au cours de vos journées à 200 à l\'heure. Situé dans le pittoresque passage Choiseul à Paris, ne vous privez pas du détour.', 'zzz-zen-bar.jpg', 'Programme', '- Une sieste \"Royale\" en duo - 45 min<br>\r\n- Un fish spa (nettoyage, bain de poissons, crème) - 20 min<br>', 'Spa', 'Bien-être', '29 Passage Choiseul, 75002 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20998.171018521694!2d2.3179806024338925!3d48.862569834790975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e3abe5acba9%3A0x813cd72767d47851!2sZZZen%20-%20Bar%20%C3%A0%20Sieste!5e0!3m2!1sfr!2sfr!4v1622332908149!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(13, 'L\'Aquarium de Paris', 'Dans les profondeurs des reliefs surplombant les jardins du Trocadéro, à Paris, plongez au cœur d\'un fascinant univers aquatique de 10 000 poissons et invertébrés et de 25 requins. Au sein du bassin caresses, les enfants pourront approcher et toucher les poissons d\'eau douce. Le temps d\'une journée en famille, profitez des multiples animations interactives et ludiques à disposition.', 'aquarium-de-paris.jpg', 'Programme', '1 entrée', 'Aquarium', 'Loisirs', '5 Avenue Albert de Mun, 75016 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.789935159372!2d2.2888019515809463!3d48.862215979186196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fe33c3187e5%3A0xf88aec5c3eb444e8!2sAquarium%20de%20Paris!5e0!3m2!1sfr!2sfr!4v1622332960174!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(14, 'Ballon de Paris', 'Envie de prendre de la hauteur ? De voir Paris comme vous ne l\'avez jamais vue ? Élevez-vous à bord de ce grand ballon captif ! Installé depuis 1999 dans le parc André Citroën, le Ballon de Paris peut contenir jusqu\'à 30 personnes à 150 mètres du sol. Là-haut, profitez d\'un panorama exceptionnel sur la capitale. Décollage imminent !', 'ballon-de-paris.jpg', 'Programme', '- 8 à 10 minutes de vol en ballon captif<br>\r\n- 2 cadeaux souvenirs<br>', 'Vol en ballon', 'Loisirs', 'Parc André Citroën, 75015 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.860607284895!2d2.2720295515803666!3d48.84179747918435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67bb16b32d3ab%3A0xde3ffa13390d9af6!2sBallon%20de%20Paris!5e0!3m2!1sfr!2sfr!4v1622333033872!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(15, 'Poterie et Compagnie', 'Goûtez aux bienfaits d\'une activité manuelle en plein cœur de Paris avec Poterie et Compagnie. Dans un cadre clair et chaleureux, guidés par une céramiste expérimentée et passionnée, vous apprendrez les techniques nécessaires pour réaliser de véritables objets en terre. Une activité ludique et relaxante qui vous aidera à éveiller votre sensibilité artistique.', 'poterie-et-compagnie.jpg', 'Programme', 'Un cours particulier de poterie - 60 min', 'Poterie', 'Loisirs', '3 Cité Riverin, 75010 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5248.737845855353!2d2.3540375680098844!3d48.87024324913082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e0e14a2e093%3A0xfb3a7d1724784e13!2sPoterie%20Et%20Compagnie!5e0!3m2!1sfr!2sfr!4v1622333118391!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(16, 'Cultur\'in the City', 'Au départ, il y a Benjamin, alors comédien, producteur et passionné de spectacles. En 2014, il lance sa start-up avec un objectif en tête : démocratiser et rendre accessible la culture au plus grand nombre. Aujourd’hui c’est devenu Cultur’In The City, qui a imaginé des coffrets cadeaux pour vous faire profiter des plus beaux spectacles.', 'culturin-the-city.jpg', 'Programme', 'Une carte quatre places de spectacle \"Découverte\" Cultur\'in the City pour une ou deux personnes valable un an.', 'Spectacle', 'Loisirs', 'Paris (75)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(17, 'Marin d\'eau douce', 'Découvrez différemment la sublime ville de Paris ! Marin d\'eau douce vous propose des bateaux électriques et sans permis faciles à piloter, pour une balade unique à Paris sur le canal de l\'Ourcq. Aux commandes du bateau, vous vous relaxerez et découvrirez Paris comme vous ne l\'avez jamais vu. Une croisière conviviale et respectueuse de l\'environnement.', 'marin-deau-douce.jpg', 'Programme', '- 30 minutes de navigation sur un bateau électrique sur le Bassin de la Villette<br>\r\n- 1 bouteille de rosé<br>', 'Bateau', 'Loisirs', '37 Quai de la Seine, 75019 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2623.5568270552517!2d2.3712967515816255!3d48.885724379188474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66dd762f89e41%3A0x531e92a962cb374f!2sMarin%20D&#39;Eau%20Douce!5e0!3m2!1sfr!2sfr!4v1622333275515!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(18, 'Cirque Bormann Moreno', 'Le Cirque Bormann Moreno vous propose à Paris son dernier spectacle \"Nouvelle Expérience\" où vous pourrez admirer les artistes trapézistes, jongleurs, équilibristes, clowns, mais surtout, pour la joie des petits comme des grands, les animaux : zèbre, dromadaires, chameaux, chevaux ou tigres. Des ateliers cirque sont offerts 30 minutes avant chaque spectacle.', 'cirque-bormann-moreno.jpg', 'Programme', 'Une place en \"Balcons\"', 'Cirque', 'Loisirs', '5 Rue Lucien Bossoutrot, 75015 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.078864234347!2d2.268622451580236!3d48.83763437918389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5fd343b7f1a1b%3A0x4c1a08a23120100f!2sCirque%20Bormann-Moreno!5e0!3m2!1sfr!2sfr!4v1622333542219!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(19, 'Freedom Organisations', 'Freedom Organisations est spécialisé dans le transport de personnes à moto. Fred vous fera ainsi découvrir sa moto Goldwing GL1800 avec sièges chauffants, les grands monuments historiques de la capitale, les petites ruelles typiques et d\'autres endroits insolites.', 'freedom-organisations.jpg', 'Programme', '1 heure de visite de Paris en Taxi Moto', 'Visite', 'Aventure', 'Paris (8ème)', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167818.24823680703!2d2.2069777982120997!3d48.85899999147505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1619914509922!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(20, 'Dream On Board', 'Et c\'est parti pour vingt minutes de plaisir intense sur les Champs-Élysées en Ferrari cabriolet ou en Lamborghini cabriolet. Vous vous souviendrez éternellement de la mélodie magique de votre bolide de légende ! Cheveux au vent, vous pourrez tout simplement vous prendre pour une star au style bling-bling.', 'dream-on-board.jpg', 'Programme', '20 minutes de pilotage à bord de Lamborghini Gallardo Spyder, Ferrari F430 Spider ou Ferrari California (également une cabriolet) sur les Champs-Élysées', 'Pilotage', 'Aventure', 'Place de Varsovie, 75116 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d35316.813806700346!2d2.238292695708543!3d48.859394729159526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67326b4ce3217%3A0x39cb5424c2e34105!2sDream%20on%20Board!5e0!3m2!1sfr!2sfr!4v1622333635561!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(21, 'OldTimers Paris', '(Re)découvrez Paris à bord d\'une authentique Citroën Traction Avant ! De la tour Eiffel à l\'avenue des Champs-Elysées, de Montmartre aux petites rue de Saint-Germain des Prés, il y a tant de choses à voir et à admirer dans celle que l\'on surnomme la Ville Lumière. Une envie particulière ? Il suffit de demander ! Une façon originale et unique de parcourir la capitale. En route !', 'oldtimers-paris.jpg', 'Programme', '1 heure de balade personnalisée \"Découverte de Paris\" en Citroën Traction', 'Balade', 'Aventure', '61 Rue Lamarck, 75018 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49953.772782182576!2d2.313449010401877!3d48.851120584346255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbff48edb16d87d1b!2sOldTimersParis.com%20%3A%20Vintage%20Car%20Tours%20of%20Paris%20by%20Citroen%20Traction%20%26%20Mariages%20en%20Voiture%20de%20Collection!5e0!3m2!1sfr!2sfr!4v1622333689277!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(22, 'Parisi Tour', 'Capitale mythique, Paris suscite toujours autant l\'émerveillement par son patrimoine architectural et culturel d\'exception. Pour ajouter au charme de la découverte, Parisi Tour vous embarque en 2CV, la plus emblématique des voitures françaises, le temps d\'une excursion à travers la Ville-Lumière en compagnie d\'un chauffeur-guide des plus truculents.', 'parisi-tour.jpg', 'Programme', 'Un tour \"Paris ! Paris !\" : 45 minutes de découverte de Paris - 45 min', 'Découverte', 'Aventure', '20 Avenue de Versailles, 75016 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.4078965766435!2d2.2744015515805804!3d48.85043177918505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e670077deb808d%3A0x9291b1b34d99be9c!2sParisitour%20-%20Paris%20en%202CV!5e0!3m2!1sfr!2sfr!4v1622333732271!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(23, 'Marin d\'eau douce', 'Découvrez différemment la sublime ville de Paris ! Marin d\'eau douce vous propose des bateaux électriques et sans permis faciles à piloter, pour une balade unique à Paris sur le canal de l\'Ourcq. Aux commandes du bateau, vous vous relaxerez et découvrirez Paris comme vous ne l\'avez jamais vu. Une croisière conviviale et respectueuse de l\'environnement', 'marin-deau-douce.jpg', 'Programme', '- 1 bouteille de champagne\r\n- 1 heure de navigation sur un bateau électrique sur le bassin de la Villette', 'Bateau', 'Aventure', '37 Quai de la Seine, 75019 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2623.5568270552517!2d2.3712967515816255!3d48.885724379188474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66dd762f89e41%3A0x531e92a962cb374f!2sMarin%20D\'Eau%20Douce!5e0!3m2!1sfr!2sfr!4v1622333275515!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1),
(24, 'VR & CO', 'VR & Co, c\'est un espace de 140 m2 au cœur de Paris dédié à la réalité virtuelle sous toutes ses formes. Seul ou en équipe, venez vivre des sensations très spéciales : exploration, escalade, escape games, courses, jeux de tir, plongée sous-marine ou vol au-dessus de Paris... il y a de quoi surprendre et satisfaire tout le monde !', 'vr-co.jpg', 'Programme', '40 minutes d\'expériences en réalité virtuelle (sans limite du nombre de jeux) accompagnés d\'un Game Master', 'Virtuelle', 'Aventure', '49 Boulevard Saint-Michel, 75005 Paris', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.5056237565154!2d2.339643951580548!3d48.84856797918496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671c7ac90a593%3A0xf4e4e4259d7f2d6d!2sVR%20%26%20Co%20-%20Salle%20de%20R%C3%A9alit%C3%A9%20Virtuelle%20Paris!5e0!3m2!1sfr!2sfr!4v1622333778218!5m2!1sfr!2sfr\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 1, 1);

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
  `message` text NOT NULL,
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
  `prix` float NOT NULL,
  `code` varchar(255) NOT NULL
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
  `limit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `nom`, `prenom`, `email`, `mdp`, `statut`, `limit_connexion`, `limit_date`) VALUES
(1, 'Chen', 'Davy', 'chendavyweb@gmail.com', '$2y$10$PJa9QxOUnhVHXBO0xrMgpu1Uz0Qg5uOPsquKOftJ/iKgK09nphI9u', 2, 0, '2021-05-12');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id_partenaire` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `details_commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Gastronomie', 'Cette box aux 6 tables romantiques, où vous trouverez un fameux repas avec coupe de champagne, vin ou apéritif. Découvrez à deux pour une cuisine française raffinée au Marée, vivez une véritable escapade gourmande à deux au Jaipur Café, laissez-vous tenter par des plats traditionnels libanais au Cèdres du Liban dans le 15e arrondissement ou encore profitez d’une vue magnifique et unique de l’art déco des brasseries parisiennes au restaurant La Coupole. Votre moitié va adorer !', 'box-gastronomie.jpg', 70, 24),
(2, 'Aventure', 'Addict au grand frisson ? Osez une expérience exceptionnelle et vivez des sensations fortes grâce à cette box plein d’activités inoubliables ! Simulateur de chute libre, naviguer sur les eaux de Paris, piloter une Ferrari cabriolet, voler au-dessus de Paris avec la VR… Donnez-vous une bonne dose d’adrénaline en vivant l’un de vos rêves !', 'box-aventure.jpg', 100, 25),
(3, 'Bien-être', 'Retirez le stress et rentrez dans un cocon de bonheur avec cette box de massages et de soins pour deux personnes. Un spa chez Spa Thaï Luxe Versailles à Paris dans notre belle capitale, des cabines pour bronzer et mincir chez Sunso Sun & Beauty Lounge ou un accès complet à l’espace bien-être de Zzz Zen Bar… Expirez, inspirez et laissez-vous aller, c’est si relaxant !', 'box-bienetre.jpg', 90, 25),
(4, 'Loisirs', 'Allez à l’aquarium de Paris pour voir et découvrir avec ses 10 000 pensionnaires. Faites un atelier poterie pour goûter aux bienfaits d\'une activité manuelle. Profitez des plus beaux spectacles au Cultur\'in the City. Élevez-vous à bord d\'un grand ballon captif !', 'box-loisirs.jpg', 60, 25);

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
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id_partenaire`);

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
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_details_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_favoris` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id_partenaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
