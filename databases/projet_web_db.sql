-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 25, 2020 at 06:21 PM
-- Server version: 10.4.8-MariaDB-1:10.4.8+maria~bionic
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_web_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `is_visible` tinyint(4) NOT NULL DEFAULT 1,
  `flags` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `created_by`, `comment`, `date_created`, `date_edited`, `is_visible`, `flags`) VALUES
(1, 1, 12, 'Pense à autre chose !', '2020-04-19 00:00:00', '2020-05-25 17:38:56', 1, 0),
(2, 1, 13, 'Eh, on va s\'en sortir, tous les deux.', '2020-04-19 00:00:00', '2020-04-29 19:51:47', 1, 0),
(3, 1, 12, 'Cette fois, on va en finir.', '2020-04-19 16:52:10', '2020-05-25 17:37:56', 1, 0),
(4, 6, 12, 'Pas de risques inutiles, d\'accord ?', '2020-04-19 16:52:20', '2020-05-25 14:31:32', 1, 0),
(5, 6, 14, 'Je crois que je peux caser ça dans mon planning.', '2020-04-19 16:53:03', '2020-05-25 14:19:04', 1, 0),
(6, 1, 2, 'Vous voulez pas que j\'entre ? D\'accord, j\'entre pas.', '2020-04-19 17:00:07', '2020-05-25 17:39:22', 1, 0),
(7, 7, 12, 'Cette odeur. Ça me rappelle... Je veux même pas y penser.', '2020-04-21 16:07:21', '2020-05-25 17:36:40', 1, 0),
(8, 1, 2, 'On dirait que quelqu\'un a oublié de mettre son uniforme.', '2020-04-29 19:49:11', '2020-04-29 19:49:11', 1, 0),
(9, 1, 25, 'Bonjour les amis.', '2020-04-29 21:17:48', '2020-04-29 21:29:07', 1, 0),
(10, 1, 15, 'Claire ! Il est derrière toi !', '2020-05-04 23:13:32', '2020-05-25 17:41:07', 1, 0),
(11, 1, 24, 'Il faut que tu sauves ta peau !', '2020-05-24 16:52:49', '2020-05-25 17:43:29', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `minichat`
--

CREATE TABLE `minichat` (
  `messageID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `message` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_edition` datetime NOT NULL,
  `is_visible` tinyint(4) NOT NULL DEFAULT 1,
  `flags` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minichat`
--

INSERT INTO `minichat` (`messageID`, `userID`, `message`, `date_creation`, `date_edition`, `is_visible`, `flags`) VALUES
(1, 1, 'hello', '2020-04-14 00:00:00', '2020-04-14 00:00:00', 1, 0),
(2, 2, 'Accroche-toi, super flic.\r\nÇa va aller.', '2020-04-14 00:00:00', '2020-04-29 23:14:55', 1, 0),
(3, 13, 'Comme dirait Chris: \"Pas de quartier !\"', '2020-04-15 00:00:00', '2020-04-05 00:00:00', 1, 0),
(4, 13, 'Eh voilà. J\'suis dans la merde... au sens propre...', '2020-04-10 00:00:00', '2020-04-06 00:00:00', 1, 0),
(5, 14, 'C\'est pas comme ça que j\'imaginais mon premier jour.', '2020-04-02 00:00:00', '2020-04-01 00:00:00', 1, 0),
(7, 14, 'Il est encore vivant ?', '2020-04-02 00:00:00', '2020-04-01 00:00:00', 1, 0),
(8, 12, 'Je sais ce que c\'est qu\'un talkie.', '2020-04-15 00:00:00', '2020-04-05 00:00:00', 1, 0),
(10, 2, 'Hé, du con !', '2020-04-16 14:44:07', '2020-04-16 14:44:07', 1, 0),
(11, 12, 'Tu vas voir ta gueule, enfoiré !', '2020-04-16 23:33:39', '2020-04-16 23:33:39', 1, 0),
(12, 12, 'Eh, j\'suis super flic.\r\nC\'est comme-si c\'était fait.', '2020-04-16 23:47:00', '2020-04-29 23:16:05', 1, 0),
(13, 12, 'C\'est les S.T.A.R.S. que tu veux ? Alors a-mène toi !', '2020-04-17 17:48:31', '2020-04-17 17:48:31', 1, 0),
(14, 12, 'Ce truc sait même pas nager.', '2020-04-17 17:50:31', '2020-04-17 17:50:31', 1, 0),
(16, 12, 'Parfait pour coller des migraines.', '2020-04-19 17:45:26', '2020-05-25 14:44:29', 1, 0),
(17, 2, 'Ça craint de tirer sur les flics.', '2020-04-21 15:42:30', '2020-04-29 23:15:47', 1, 0),
(18, 18, 'Où est Leon quand on a besoin de lui?', '2020-04-27 20:29:49', '2020-04-29 23:15:13', 1, 0),
(19, 15, 'Tu as besoin d\'aide.', '2020-05-04 23:14:02', '2020-05-23 14:34:25', 1, 0),
(20, 24, 'Si jamais tu vois une de ces choses, uniforme ou pas, tu ne dois pas hésiter.\r\nTu tirs, ou tu cours.', '2020-05-24 16:53:45', '2020-05-25 14:43:54', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_edited` datetime NOT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_by`, `title`, `content`, `date_created`, `date_edited`, `is_published`) VALUES
(1, 13, 'Resident Evil 2 Remake', 'The game is set in Raccoon City in September 1998, two months after the events of Resident Evil. Most of the citizens have been turned into mindless zombies, due to an outbreak of a viral bioweapon known as the T-Virus, manufactured by Umbrella Corporation.[2][3] The game begins at a gas station outside of the city, where rookie police officer Leon S. Kennedy (Nick Apostolides) meets college student Claire Redfield (Stephanie Panisello), who is looking for her brother Chris Redfield.\r\n\r\nAfter being separated following a car accident, Leon and Claire agree to meet up at the city\'s police department. The building is infested by zombies, and other monsters, including the &quot;Tyrant&quot;,[b] who is dispatched to hunt down and kill any survivors. The creatures and various obstacles prevent Leon and Claire from actually reuniting as they are forced to find a way to escape the city.\r\n\r\nClaire scenario:\r\n\r\nClaire encounters Sherry Birkin (Eliza Pryor), a young girl being pursued by a monstrous creature. In the police station parking garage, corrupt Police Chief Brian Irons (Sid Carton) abducts Sherry, and locks her in an abandoned orphanage. Claire soon receives a call from Irons to trade Sherry for a pendant she had dropped during the abduction, threatening to kill the little girl if Claire does not comply. Reluctantly, Claire agrees to do so.\r\n\r\nSherry tries to escape on her own, but is soon cornered by Irons. Before Irons can harm her, the creature that had been chasing Sherry returns and implants Irons with a parasite. Claire arrives to save Sherry, and the parasite bursts out of Irons\' chest, killing him. As Claire and Sherry attempt to leave, the Tyrant arrives and chases the pair into an elevator, but is killed by the creature stalking Sherry. The creature then tries to attack Claire and Sherry as it mutates, but accidentally causes the elevator to fall into the sewers. Claire is knocked unconscious, and Sherry is forced to abandon her to escape.\r\n\r\nClaire is found by Annette (Karen Strassman), Sherry\'s mother, who reveals that the creature after Sherry is William (Terence J. Rotolo), her husband. The Birkins developed the G-Virus for Umbrella; however, William planned to sell it to the U.S. military. Umbrella sent its paramilitary force to confiscate his work, leading to William being fatally shot. To avoid death, William had injected himself with the G-Virus. In the process of taking revenge on the Umbrella soldiers, sewers rats infected by shattered vials of the T-virus carry their infection to Raccoon City. Now a mindless mutating beast, the G-Virus drives William to infect Sherry, as she is the closest genetic match to William and thus the most suitable host to spread the infection.\r\n\r\nClaire finds Sherry trapped in a trash compactor by Annette. Upon reaching her, however, Sherry falls ill. Annette realizes William has already infected Sherry and has Claire bring her to an Umbrella lab called NEST, where a vaccine is stored. Once there, Claire uses Sherry\'s pendant to unlock the vaccine, but William attacks after mutating again. Claire sends Annette to administer the vaccine while she fights William. After seemingly killing him, Claire reunites with Annette, who has managed to cure Sherry before dying from internal injuries. Sherry tearfully bids her mother goodbye. As the facility enacts a self-destruct protocol, Claire and Sherry make their way to an evacuation train. William returns yet again, now mutated into a much larger monster, and Claire defeats him just as the train prepares to leave. Upon boarding, Claire discovers Leon there as well.\r\n\r\nLeon scenario:\r\n\r\nLeon is saved from an infected dog by FBI agent, Ada Wong (Jolene Andersen). They find reporter Ben Bertolucci in the holding cells; imprisoned by Irons for investigating Umbrella. As Ben tries to convince Leon to release him, the Tyrant kills Ben. While attempting to escape the police station, Leon is intercepted by the Tyrant but is again saved by Ada. Leon pledges to help Ada retrieve a G-Virus sample to prove Umbrella\'s corruption.\r\n\r\nIn the sewers, Annette Birkin ambushes the pair and shoots at Ada; Leon takes the bullet and passes out. Ada pursues Annette but is knocked into a trash compactor. Leon rescues her, and they descend to NEST via cable car, where Ada kisses Leon.\r\n\r\nAda, injured, requests that Leon obtain the G sample. In Birkin\'s lab, Leon obtains a sample but is attacked by a now much more deadly William. Annette tries to kill him, but is mortally wounded. Leon defeats William and tends to Annette, who claims that Ada is a mercenary and will sell the virus to the highest bidder.\r\n\r\nLeon confronts Ada as the lab\'s self-destruct protocol begins, where she admits to being a mercenary. Ada demands the G-Virus sample from Leon at gunpoint, but Annette shoots Ada before succumbing to her injuries. As Ada falls off the bridge; Leon catches her, letting the virus sample fall into the abyss. Leon loses his grip and Ada falls.\r\n\r\nAs Leon attempts to escape the lab, he is ambushed by the Tyrant, now transformed into the larger and more powerful Super Tyrant and engages it in a final battle. Ada, having survived the fall, tosses a rocket launcher to him, which Leon uses to finally destroy the Super Tyrant. Leon boards the evacuation train, discovering Claire and Sherry already aboard.\r\n\r\nEnding:\r\n\r\nAfter Leon, Claire, and Sherry reunite, William attacks the train, having mutated into a gigantic horrifying mass of fangs and flesh. Claire and Leon are almost killed in the fight, but manage to uncouple the carriage occupied by William. The carriage falls behind and is consumed by the exploding lab, destroying William once and for all. As the three survivors finally escape Raccoon City, they vow to continue the fight against Umbrella. ', '2020-04-17 00:00:00', '2020-04-29 19:29:45', 1),
(2, 12, 'Resident Evil 3 Remake', 'Raccoon City is thrown into chaos by a zombie apocalypse caused by an outbreak of the T-Virus that was created by pharmaceutical company Umbrella Corp. On September 28, 1998, former Special Tactics And Rescue Service (S.T.A.R.S.) member Jill Valentine is attacked in her apartment by an Umbrella-created intelligent bioweapon known as Nemesis-T Type, who attempts to kill her and all remaining members of S.T.A.R.S.[4] Upon escaping her building, she meets up with fellow S.T.A.R.S. officer Brad Vickers, but Brad is bitten by a zombie and tells Jill to save herself. After another encounter with Nemesis, she is saved by Umbrella Biohazard Countermeasure Service (U.B.C.S.) mercenary Carlos Oliveira. Carlos and his group of surviving U.B.C.S. mercenaries - Mikhail Victor, Tyrell Patrick, and Nicholai Ginovaef - have set up subway trains which they plan to use to evacuate civilians from the city.\r\n\r\nAfter surviving several encounters with Nemesis, Jill manages to reactivate power to the subway, while Carlos and Tyrell remain in the city to search for Dr. Nathaniel Bard, an Umbrella scientist who might know how to make a vaccine for the T-virus and save the city. As Jill, Nicholai, and Mikhail depart in the train, Mikhail expresses his suspicions towards Nicholai on how their platoon was ambushed by zombies. Nemesis suddenly attacks the train and kills the civilians; Nicholai locks the other two out, forcing them to defend themselves. Nemesis grabs Mikhail, who sacrifices himself by detonating an explosive, causing the train to derail. Jill escapes as seemingly the only survivor of the crash.\r\n\r\nCarlos and Tyrell travel to the city\'s police department, where they plan to find Bard in the S.T.A.R.S. office. The two witness R.P.D. Lieutenant Marvin Branagh being bitten by a zombified Brad, who is killed by Carlos shortly afterwards. The two enter the S.T.A.R.S. office and communicate via video with Bard, who informs them that he is at a hospital. Meanwhile, as Tyrell traces Bard’s location, Jill escapes the wreckage of the derailed train only to be again pursued by Nemesis who is now heavily mutated. Jill radios Carlos and engages the monster, managing to escape it, but only after it infects her with the T-virus. Jill falls unconscious and Carlos finds her roughly half a day later, taking her to Spencer Memorial Hospital — the location of Bard. Carlos fights his way through the infested hospital only to find that Bard has been murdered. He views a video from Bard confessing that the T-virus was engineered by Umbrella, and despite Umbrella hiring him to develop the vaccine, Umbrella\'s board now wants to destroy it and eliminate all traces of the virus\' existence. Carlos retrieves the vaccine and administers it to Jill. Tyrell arrives at the hospital and they discover that the U.S. government plans to destroy Raccoon City in a missile strike to eradicate the T-Virus infestation. Carlos travels to the NEST 2 lab underneath the hospital to find more vaccines, while Tyrell tries to contact whoever he can to try and stop the missile strike.\r\n\r\nJill awakens on the day of the missile strike, October 1, and pursues Carlos to NEST 2. She encounters Nicholai, who is revealed to be a supervisor hired by an unknown contractor to sabotage Umbrella\'s efforts to hide their involvement and to observe and collect data from attacks of several bioweapons, including Nemesis. Nemesis kills Tyrell and continues to pursue Jill throughout the lab. Jill manages to synthesize a vaccine, but an encounter with Nemesis prompts Nicholai to retrieve it for himself as he leaves her to fight the monster. Jill attempts to destroy Nemesis in a vat of solution designed to dispose of any biological waste, only for the G-virus strain in Nemesis to activate, further mutating it into a giant mass of flesh with tentacles. Jill then uses a prototype railgun to finally eliminate Nemesis for good. At the hospital\'s helipad, Nicholai disarms Jill and destroys the vaccine, acknowledging that he doesn\'t care for the city\'s fate as long as he gets paid for sabotaging Umbrella. Carlos intervenes and restrains Nicholai for Jill to shoot.[c] When interrogated on who he works for, he offers to reveal the information and pay any price in exchange for his life. Disgusted by his greed, Jill retrieves the destroyed vaccine case and escapes the city with Carlos via helicopter, leaving Nicholai for dead. The city is destroyed by the missile strike, and Jill promises to take down Umbrella. ', '2020-04-17 17:11:32', '2020-04-29 21:36:50', 1),
(3, 22, 'Resident Evil 5', 'In 2009,[4] five years after the events of Resident Evil 4, Chris Redfield, a member of the fictional Bioterrorism Security Assessment Alliance (BSAA), is dispatched to Kijuju in Africa. He and his new partner Sheva Alomar are tasked with apprehending Ricardo Irving before he can sell a bio-organic weapon (BOW) on the black market. When they arrive, they discover that the locals have been infected by the parasites Las Plagas (those infected are called \"Majini\") and the BSAA Alpha Team have been killed. Chris and Sheva are rescued by BSAA\'s Delta Team, which includes Sheva\'s mentor Josh Stone. In Stone\'s data Chris sees a photograph of Jill Valentine, his old partner, who has been presumed dead after a confrontation with Albert Wesker. Chris, Sheva and Delta Team close in on Irving, but he escapes with the aid of a hooded figure. Irving leaves documents that lead Chris and Sheva to marshy oilfields. This is where Irving\'s deal is to occur, but they discover that the documents are a diversion. When Chris and Sheva try to regroup with Delta Team, they find the team slaughtered by a BOW; Sheva cannot find Stone among the dead. Determined to learn if Valentine is still alive, Chris does not report to headquarters.[5]\r\n\r\nContinuing through the marsh, they find Stone injured but safe and track down Irving\'s boat with his help. Irving injects himself with a variant of the Las Plagas parasite and mutates into a huge octopus-like beast. Chris and Sheva defeat him, and his dying words lead them to a nearby cave to learn more. The cave is the source of a flower used to create viruses previously used by the Umbrella Corporation, as well as a new strain named Uroboros. Chris and Sheva find evidence that Tricell, the company funding the BSAA, took over a former Umbrella underground laboratory and continued Umbrella\'s research. In the facility, they discover thousands of capsules holding human test subjects. Although Chris finds that one of the capsules is Valentine\'s, it is empty. When they leave, they discover that Tricell CEO Excella Gionne has been plotting with Wesker to launch missiles with the Uroboros virus across the globe; it is eventually revealed that Wesker hopes to take a chosen few from the chaos of infection and rule them, creating a new breed of humanity. Chris and Sheva pursue Gionne but are stopped by Wesker and the hooded figure, who is revealed to be a mind-controlled Valentine. Gionne and Wesker escape to a Tricell oil tanker; Chris and Sheva fight Valentine, subduing her and removing the mind-control device before she orders Chris to follow Wesker.[5]\r\n\r\nChris and Sheva board the tanker and encounter Gionne, who escapes after dropping a case of syringes; Sheva keeps several. When Chris and Sheva reach the main deck, Wesker announces over the ship\'s intercom that he has betrayed Gionne and infected her with Uroboros. She mutates into a giant monster, which Chris and Sheva defeat. Valentine radios in, telling Chris and Sheva that Wesker must take precise, regular doses of a virus to maintain his strength and speed; a larger or smaller dose would poison him. Sheva realizes that Gionne\'s syringes are doses of the drug. Chris and Sheva follow Wesker to a bomber loaded with missiles containing the Uroboros virus, injecting him with the syringes Gionne dropped. Wesker tries to escape on the bomber; Chris and Sheva disable it, making him crash-land in a volcano. Furious‚ Wesker exposes himself to Uroboros and chases Chris and Sheva through the volcano. They fight him, and the weakened Wesker falls into the lava before Chris and Sheva are rescued by a helicopter, which is piloted by Valentine and Stone. As a dying Wesker attempts to drag the helicopter into the volcano, Chris and Sheva fire rocket-propelled grenades at Wesker, killing him.[6] In the game\'s final cutscee, Chris wonders if the world is worth fighting for. Looking at Sheva and Valentine, he decides to live in a world without fear.[5] ', '2020-04-17 17:12:02', '2020-04-17 17:12:02', 1),
(4, 12, 'Resident Evil Remake', 'On July 24, 1998, a series of bizarre murders occur on the outskirts of the Midwestern town of Raccoon City. The Raccoon City Police Department\'s Special Tactics And Rescue Service (STARS) are assigned to investigate. After contact with Bravo Team is lost, Alpha Team is sent to investigate their disappearance. Alpha Team locates Bravo Team\'s crashed helicopter and land at the site, where they are attacked by a pack of monstrous dogs, killing one of the team. After Alpha Team\'s helicopter pilot, Brad Vickers, panics and takes off alone, the remaining members (Chris Redfield, Jill Valentine, Albert Wesker and Barry Burton) seek refuge in an abandoned mansion, where they split up.\r\n\r\nThe player character (Chris or Jill) finds several members of Bravo Team, including Kenneth J. Sullivan being eaten by a zombie; Richard Aiken, who is either killed by a giant venomous snake or eaten by a shark; Forest Speyer, who is found dead and revived as a zombie; and Bravo Team leader Enrico Marini, who reveals that one of Alpha Team\'s members is a traitor before being killed by an unseen shooter. Bravo Team survivor Rebecca Chambers joins Chris. The player character learns that a series of illegal experiments were undertaken by a clandestine research team under the authority of a biomedical company Umbrella Corporation. The creatures roaming the mansion and its surrounding areas are the results of these experiments, which have exposed the mansion\'s personnel and animals to a highly contagious and mutagenic biological agent known as the T-virus.\r\n\r\nThe player character discovers a secret underground laboratory containing Umbrella\'s experiments. There, they find Jill or Chris in a cell and encounter Wesker programming a Tyrant, a humanoid supersoldier. Wesker reveals that he is a double agent working for Umbrella, and plans to use the Tyrant to kill the STARS members. In the ensuing confrontation, Wesker is apparently killed and the player character defeats the Tyrant. After activating the lab\'s self-destruct system, the player character reaches the heliport and contacts Brad for extraction. The ending changes depending on the player\'s actions at key points: in the best ending, the surviving team members escape by helicopter after defeating the Tyrant again; in the worst ending, the mansion remains intact and the player character is the sole survivor.', '2020-04-17 17:19:00', '2020-04-17 17:19:00', 1),
(5, 22, 'Resident Evil Zero', 'On July 23, 1998, a train owned by the pharmaceutical company Umbrella, the Ecliptic Express, comes under attack from a swarm of leeches. As the passengers and crew are attacked, a mysterious young man watches over the resulting chaos from a hillside. Two hours later, the Bravo Team of the Special Tactics And Rescue Service (S.T.A.R.S.) police force is sent to investigate a series of cannibalistic murders in the Arklay Mountains outside of Raccoon City. On the way to the scene, its helicopter has an engine failure and crash-lands in a forest. While searching the immediate area, Officer Rebecca Chambers of Bravo Team comes across the Express, now motionless, and explores it, only to find the passengers and crew transformed into zombies, unaware their transformation was a result of exposure to Umbrella\'s T-Virus contained within the leeches. As she explores the train for answers, she teams up with Billy Coen—a former Marine Force Reconnaissance officer, who was to be executed for killing 23 people until the military police van transporting him crashed within the region.\r\n\r\nThe pair soon notices the same mysterious young man, moments before the train suddenly begins moving again. Unbeknownst to the pair, two soldiers from Umbrella, on the orders of Albert Wesker and William Birkin, attempt to take control of the train and destroy it but are killed by leeches before they can complete their mission. As the train speeds out of control, Rebecca and Billy apply the brakes and avert its course towards an abandoned building. Upon exploring the area, they discover it to be a disused training facility for future executives of Umbrella, and that the former director of the facility and the corporation\'s co-founder, Dr. James Marcus, was responsible for discovering the so-called Progenitor virus in the 1960s, and decided to examine its potential as a biological weapon. He combined it with leech DNA to develop the T-Virus that causes rapid mutations in living organisms and thus transforms humans and animals into zombies and monsters.\r\n\r\nAs the pair continue to explore the facility, Wesker decides to leave Umbrella and join its rival company, and makes plans for further research on the t-Virus, while Birkin refuses his offer to join him, instead opting to complete his research on the G-virus. Later, Rebecca becomes separated from Billy. On her own, she encounters Captain Enrico Marini, who tells her that the rest of the Bravo team will meet up at an old mansion they found but allows her to stay behind to find Billy. Just after Enrico leaves, Rebecca is attacked by the Tyrant. After temporarily defeating the Tyrant, Rebecca meets up with Billy again, and together they defeat it and continue on towards a water plant.\r\n\r\nEventually, Rebecca and Billy catch up with the leech-controlling man who happens to be Marcus\' final experiment, Queen Leech. Ten years ago, Marcus was assassinated on the orders of Umbrella\'s other co-founder, Oswell E. Spencer, who sought his research. After his corpse was dumped, Queen Leech entered his body and reanimated it, gaining his memories and the ability to shapeshift, whereupon it believed itself to be Marcus and orchestrated the T-Virus outbreak in the facility and on the train as a means of revenge against Umbrella. After temporarily defeating it, Billy and Rebecca attempt to escape to the surface via a lift, tripping the facility\'s self-destruct mechanism. Pursued by Queen Leech, the pair eventually kills it and escape before the facility is destroyed. Following their escape, Rebecca notices the mansion that Marini mentioned and prepares to head for it. Before she does, she assures Billy that her police report will list him as another casualty of the incident. Thanking her for his freedom, Billy departs as Rebecca heads towards the mansion to seek out the whereabouts of her fellow Bravo Team members (seen in Resident Evil).', '2020-04-17 17:19:21', '2020-04-17 17:19:21', 1),
(6, 13, 'Resident Evil - Code: Veronica X', 'In December 1998, three months after escaping from Raccoon City (seen in Resident Evil 2) and prior to its eventual destruction (seen in Resident Evil 3: Nemesis),[7] Claire Redfield raids an Umbrella Corporation facility in Paris, in search of her brother Chris Redfield. Discovered by Umbrella\'s security forces and eventually captured, Claire is imprisoned on Rockfort Island—a prison complex owned by the corporation, situated in the Southern Ocean. Sometime after her imprisonment, Claire finds herself released by one of the prison staff, and discovers that an outbreak of the T-Virus has occurred. In the resulting chaos, she finds herself teaming up with Steve Burnside, another inmate seeking to escape.\r\n\r\nIn their efforts to explore the island and find the means to leave, the pair finds themselves confronting the island\'s commander, Alfred Ashford. Both Claire and Steve find him to be mentally unstable as a result of him switching between two personalities—his own, and that of his twin sister Alexia. Eventually, the pair manages to find a seaplane and use it to escape, only for Alfred to pursue them and switch their plane to autopilot, directing it towards another Umbrella facility in Antarctica. Upon their arrival, the pair finds that the facility had suffered an outbreak, and fight their way through the zombies and monsters within to seek a means of escape, battling with Alfred and fatally wounding him. Before he dies, Alfred frees his sister Alexia, who had been in cryogenic sleep within the facility after injecting herself with the T-Veronica virus—an experimental virus that the Ashford family had developed 15 years ago. Awakened, Alexia manages to recapture Claire and Steve as they attempt to escape.\r\n\r\nMeanwhile, Chris Redfield arrives on Rockfort Island in search of Claire, after receiving a message from her via Leon S. Kennedy. Upon learning that she had left, Chris focuses on determining where and begins searching the island. In the process of doing so, he comes across Albert Wesker, an independent agent since the Spencer mansion incident (the events of Resident Evil), who is seeking to retrieve a sample of the T-Veronica virus. After Chris learns of his sister\'s whereabouts, and Wesker discovers that Alexia is alive and carries what he needs, the two separately find their way to Antarctica. Once there, Chris frees his sister and helps her to search for Steve, only for them to find that he had been experimented with and injected with the T-Veronica virus. After mutating, Steve attempts to kill Claire but fails, regaining control of himself to turn on Alexia, who then inflicts a mortal wound on him. Before Steve dies, he confesses his love for Claire. Meanwhile, Chris and Wesker confront Alexia. In the resulting conflict, Wesker escapes and manages to retrieve Steve\'s corpse for further experimentation, while Chris manages to defeat Alexia and escape with his sister, before the Antarctic facility self-destructs.', '2020-04-17 18:13:52', '2020-05-25 14:24:13', 1),
(7, 13, 'Resident Evil 4', 'In 2004, six years after the events of Resident Evil 2, former Raccoon City police officer turned U.S. government agent Leon S. Kennedy (Paul Mercier) is sent on a mission to rescue Ashley Graham (Carolyn Lawrence), the U.S. President\'s daughter, who has been kidnapped by a mysterious cult.[10] He travels to a nameless rural village in Spain,[11] where he encounters a group of hostile villagers who pledge their lives to Los Illuminados (\"The Enlightened Ones\" in Spanish), the cult that kidnapped Ashley. The villagers were once simple farmers until becoming infected by a mind-controlling parasite known as Las Plagas (\"The Plague\" in Spanish).[12]\r\n\r\nWhile in the village, Leon is captured by its chief, Bitores Mendez, and injected with Las Plagas.[13] He finds himself held captive with Luis Sera (Rino Romano), a former Los Illuminados researcher.[14] The two work together to escape, but soon go their separate ways. Leon finds out Ashley is being held in a church and rescues her.[15] They both escape from the church after Osmund Saddler (Michael Gough), leader of Los Illuminados, reveals his plan to use the plaga they injected into Ashley to manipulate her into injecting the president of the United States with the \"sample\" (a Master Plaga) once she returns home, allowing Saddler to begin his conquest of the world.[16]\r\n\r\nAfter killing Mendez, Leon and Ashley try to take refuge in a castle but are attacked by more Illuminados under the command of Ramon Salazar (Rene Mujica), another of Saddler\'s henchmen who owns the castle,[13] and the two become separated by Salazar\'s traps. Meanwhile, Luis searches for pills that will slow Leon and Ashley\'s infection, as well as a sample of Las Plagas. He brings the two items to Leon but is killed by Saddler, who takes the sample, while the pills to suppress the infection remain in Leon\'s hands.[17] While in the castle, Leon briefly encounters Ada Wong (Sally Cahill), a woman from his past who supports him during his mission. He battles his way through the castle before killing Salazar.[18]\r\n\r\nAfterward, Leon travels to a nearby island research facility, where he continues the search for Ashley. He discovers that one of his former training comrades, Jack Krauser (Jim Ward), who was believed to have been killed in a helicopter crash two years prior, is responsible for her kidnapping.[19] It is revealed that both Ada and Krauser are working with Albert Wesker (Richard Waugh), for whom both intend to secure a Plagas sample.[20] Suspicious of the mercenary\'s intentions, Saddler orders Krauser to kill Leon, believing that no matter which one dies, he will benefit.[21] After Krauser\'s fatal defeat, Leon rescues Ashley, and they remove the Plagas from their bodies using a specialized radiotherapeutic device. Leon confronts Saddler, and with Ada\'s help, manages to kill him. However, Ada takes the sample from Leon at gunpoint before escaping in a helicopter,[22] leaving Leon and Ashley to escape via her jet-ski as the island explodes.[23] ', '2020-04-21 15:47:28', '2020-04-21 15:58:23', 1),
(8, 14, 'Resident Evil 6', 'On 24 December 2012, Jake Muller (Troy Baker), son of late bio-terrorist Albert Wesker, flees local authorities during a bio-terrorist attack in Edonia. He partners with Division of Security Operations (DSO) agent and Raccoon City survivor Sherry Birkin (Eden Riegel) and learns that she is to extract him from the country to create a vaccine for the new C-virus. However, they are hunted by Ustanak, a hulking bio-weapon. Meanwhile, a Bio-terrorism Security Assessment Alliance (BSAA) strike team led by Chris Redfield (Roger Craig Smith) and Piers Nivans (Christopher Emerson) is deployed to combat the infected local populace. However, they are attacked by the leader of Neo-Umbrella, who refers to herself as Ada Wong (Courtenay Taylor); she kills most of the BSAA members, using a device that injects them with the C-virus, turning them into monsters, except Chris and Piers. Chris goes into a self-imposed exile, afflicted with post-traumatic amnesia. Meanwhile, Sherry and Jake\'s extraction by the BSAA is sabotaged, forcing them to crash into the mountains. They are captured by &quot;Ada&quot; for six months.\r\n\r\nOn 29 June 2013, US President Adam Benford (Michael Donovan) attempts to publicly reveal the truth behind the 1998 Raccoon City incident and the government\'s dealings with Umbrella, to end further bio-terrorist activity. However, the venue in the American town of Tall Oaks is hit by another attack, infecting the President; the sole survivors, DSO agent and Raccoon City survivor Leon S. Kennedy (Matthew Mercer) and United States Secret Service agent Helena Harper (Laura Bailey), are forced to kill him. The pair encounter the real Ada Wong (also Taylor), and Leon learns that National Security Advisor Derek Simmons (David Lodge) is affiliated with Neo-Umbrella and was responsible for the attack. Leon and Helena pursue Simmons into Lanshiang, China, while faking their deaths. Meanwhile, Jake and Sherry escape captivity in Lanshiang.\r\n\r\nChris returns to duty in the BSAA with Piers and a new team, arriving in a besieged Lanshiang. Chris recovers from his amnesia and seeks revenge against Ada, resulting in casualties for his squad. Chris and Piers confront Ada, until Leon intervenes. After being informed by Leon, Chris and Piers pursue &quot;Ada&quot; to an aircraft carrier, destroying cruise missiles laden with the C-virus. Leon, Helena, Sherry, and Jake confront Simmons over his involvement with the outbreaks, where Sherry covertly hands Jake\'s medical data to Leon in case of their captivity. Leon and Helena corner Simmons, who has been infected by a J\'avo, where he confesses to having killed the President to maintain national security. The two see off a mutated Simmons while Sherry and Jake are captured again. Attempting to leave the city, Leon and Helena are warned by Chris that a missile has been launched, but they are too late to stop it. Leon discloses Jake\'s real identity to Chris and has him rescue Jake and Sherry in a remote oil platform. With Ada\'s assistance, Leon and Helena kill Simmons.\r\n\r\nOn the oil platform, Chris and Piers head underground, freeing Jake and Sherry from captivity before preventing a large-scale attack by a gigantic bioweapon, Haos. Heavily wounded, and in a desperate attempt to save Chris, Piers injects himself with the C-virus to help turn the tide of the battle. He defeats Haos before evacuating. Aware that the mutation will worsen, Piers sacrifices himself by pushing Chris to an escape pod, using his abilities to destroy the base. Meanwhile, Jake and Sherry escape the facility and kill Ustanak as they ride a rocket-powered lift to the surface.\r\n\r\nThe imposter Ada was a scientist named Carla Radames, who was forced to transform into Ada by Simmons. The real Ada was aiding Leon and Sherry while destroying the Neo-Umbrella lab in Langshiang. Although presumed dead after being shot by one of Simmons\' soldiers, Carla attempts a final attack against Ada, after having injected herself with a powerful dose of the C-virus, but is killed. After aiding Leon and Helena in their battle with Simmons, Ada destroys the lab where her clone was developed, and accepts a new assignment. Leon and Helena are cleared for duty; Chris remains with the BSAA in command of a new squad, overcoming his guilt; Sherry continues her duty as a DSO agent; and Jake starts a new life fighting B.O.W.s in an underdeveloped country with his identity covered up by the BSAA. ', '2020-04-28 22:48:52', '2020-05-01 13:46:34', 1),
(9, 19, 'Resident Evil 7', 'In June 2017, Ethan Winters is drawn to a derelict plantation in Dulvey, Louisiana, by a message from his wife, Mia, who has been presumed dead since going missing in 2014. He finds Mia imprisoned in the basement of a seemingly abandoned house, but she becomes violent and attacks him, forcing him to kill her. After receiving a call from a woman named Zoe offering assistance, Ethan is attacked by a revived Mia, who cuts his hand off. Jack, the patriarch of the Baker family, captures Ethan. After Zoe reattaches his hand, Ethan is held captive by Jack, his wife Marguerite, their son Lucas, and an elderly catatonic woman in a wheelchair. Ethan escapes but is pursued around the house by Jack, who has powerful regenerative abilities. In the basement, Ethan discovers reanimated monsters known as Molded. Zoe reveals that she is Jack\'s daughter, and that the family and Mia are infected, but can be cured with a special serum. Ethan makes his way to an old house to retrieve the serum ingredients, kills Marguerite, and has visions of a young girl. Lucas captures Zoe and Mia and forces Ethan to navigate a booby-trapped barn to find them. Ethan chases away Lucas and frees Zoe and Mia. Zoe develops two serum doses, but they are attacked by Jack, now heavily mutated; Ethan kills him using one of the serums.[4]\r\n\r\nEthan must choose to cure either Mia or Zoe. Choosing Zoe leaves Mia heartbroken, despite Ethan\'s promise to send help. As he and Zoe flee on a boat, Zoe reveals that the Bakers were infected after Mia arrived with a young girl named Eveline when the wreck of a tanker ship washed ashore. Eveline stops their escape by calcifying Zoe, killing her, and Ethan is knocked from the boat by a creature. If Ethan chooses Mia, Zoe gives a bitter farewell to him and Mia. As he and Mia flee on a boat, they come across the crashed tanker, where they are attacked by the creature and knocked from the boat. Mia awakens after she was knocked off the boat and searches the wrecked ship for Ethan while experiencing visions of Eveline, who refers to Mia as her mother. Eventually, Mia\'s memory is restored, revealing that she was a covert operative for a corporation that developed Eveline as a bioweapon, codenamed E-001. Mia and agent Alan Droney were to escort Eveline as she was transported aboard the tanker; Eveline escaped containment, killed Alan, and sank the ship. She infected Mia in an effort to force her to be her mother. Mia finds Ethan and gives him a vial of Eveline\'s genetic material.[4]\r\n\r\nIf Ethan cured Mia, she resists Eveline\'s control long enough to seal Ethan out of the ship; if he cured Zoe, Mia succumbs to Eveline\'s control and attacks Ethan, forcing him to kill her. Ethan discovers a hidden laboratory inside an abandoned salt mine. He learns that Eveline is a bio-organic weapon capable of infecting people with a psychotropic mold that gives her control over her victims\' minds, resulting in insanity, mutation, and superhuman regenerative abilities. Eveline grew up obsessed with having a family, driving her to infect Mia and the Bakers and lure Ethan. Lucas was immunized against Eveline\'s control by her creators, The Connections, in exchange for providing observations on her. Using the lab equipment and Eveline\'s genetic material, Ethan synthesizes a toxin to kill her, and proceeds through tunnels that lead back to the Baker house. He overcomes Eveline\'s hallucinations, and injects Eveline with the toxin. She reverts to her other form, the elderly woman in a wheelchair; Eveline has been rapidly aging since escaping. Eveline mutates into a large monster and, aided by the arrival of a military squad led by Chris Redfield, Ethan kills her. The squad extracts Ethan (and Mia if she was cured) by a helicopter branded with the Umbrella Corporation logo.[4] ', '2020-04-29 17:41:15', '2020-04-29 17:41:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_article`
--

CREATE TABLE `shop_article` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categorieID` int(11) NOT NULL,
  `permission_lvl` int(11) NOT NULL DEFAULT 10,
  `unit_price` double NOT NULL,
  `quantity_left` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_article`
--

INSERT INTO `shop_article` (`id`, `name`, `categorieID`, `permission_lvl`, `unit_price`, `quantity_left`, `description`, `availability`) VALUES
(1, 'Processeur AMD Ryzen 9 3950X', 1, 10, 679.99, 174, 'Suspendisse potenti. Fusce sodales mattis risus, eu viverra nibh convallis ac. Praesent nec odio non nulla fringilla aliquam. Phasellus congue lacus quis metus viverra, a efficitur urna sodales. Etiam quis ligula a nisl semper malesuada. Suspendisse potenti. Nunc quis rhoncus ante, quis interdum dolor. Cras id nisi ac urna vehicula commodo sed eu orci. Ut sed est vel dolor posuere vulputate. In hac habitasse platea dictumst. Nam efficitur tortor non erat luctus vestibulum. Maecenas eget rhoncus elit. Suspendisse at metus sit amet risus tincidunt semper id eget eros. Fusce iaculis quis diam id aliquam. Nullam euismod elit in tristique cursus. ', 1),
(3, 'Processeur AMD Ryzen 9 3900X', 1, 10, 384.82, 98, NULL, 1),
(4, 'Processeur AMD Ryzen Threadripper 2970WX', 1, 10, 899.97, 29, 'Sed ac molestie urna, vel sagittis turpis. Proin ut finibus erat, facilisis lobortis augue. Praesent fermentum odio ipsum, et imperdiet quam finibus in. Duis ut vehicula enim, in egestas erat. In eu facilisis tellus, at eleifend felis. In posuere, felis id condimentum tincidunt, dolor magna fringilla augue, porta feugiat lorem urna ut felis. Proin non sagittis elit, at maximus ex. ', 1),
(5, 'Processeur Intel Core i9-7980XE', 1, 10, 1499.8, 16, 'Vivamus eget libero ligula. Donec et efficitur erat, sed facilisis orci. Integer in finibus tellus, lobortis volutpat nisi. Nam maximus turpis mauris, nec eleifend lectus malesuada a. Vestibulum nec tellus vitae velit pellentesque mollis. Nullam quis magna imperdiet, malesuada enim finibus, gravida tellus. Proin nunc lacus, pellentesque ultricies tellus at, semper maximus ex. ', 1),
(6, 'Processeur Intel Core i9-7900XE', 1, 20, 1746, 8, 'Nam et elit eu urna gravida aliquam. In sit amet tellus quam. Aliquam molestie luctus nibh vel venenatis. Vestibulum sit amet justo nunc. Etiam lectus odio, euismod sit amet elit hendrerit, rutrum dictum velit. Morbi sed pellentesque sem. Donec maximus turpis sed viverra porttitor. Quisque orci felis, elementum sit amet mi vel, suscipit faucibus mauris. Mauris ex dui, pretium vitae orci vestibulum, scelerisque condimentum tortor. Vestibulum molestie viverra risus sit amet facilisis. Donec at elementum ipsum. Nunc posuere quam malesuada, viverra enim id, gravida nisl. Mauris non dictum sem, id mattis erat. Pellentesque dapibus ipsum ligula, vitae elementum tortor aliquet a. Quisque sagittis suscipit risus a eleifend. ', 1),
(7, 'Halo: La Chute de Reach', 2, 10, 8.2, 57, NULL, 1),
(8, 'Halo: Les Floods', 2, 10, 8.17, 61, NULL, 1),
(9, 'Halo: Opération First Strike', 2, 10, 10.78, 41, NULL, 1),
(10, 'Halo: Les Fantômes d\'Onyx', 2, 10, 9.87, 17, NULL, 1),
(11, 'Halo: Contact Harvest', 2, 10, 8.88, 88, NULL, 1),
(12, 'Halo: Le Protocole Cole', 2, 10, 11.23, 65, NULL, 1),
(13, 'Micro Chaîne Denon D-M41 DAB Bluetooth', 3, 10, 399.99, 5, NULL, 1),
(14, 'Mini chaîne Philips BTM3360/12', 3, 10, 249.99, 7, NULL, 1),
(15, 'Chaîne HiFi Yamaha MCR-B270 Bluetooth', 3, 10, 380.09, 3, NULL, 1),
(16, 'Micro Chaîne Denon CEOL N10', 3, 10, 570.09, 4, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_categories`
--

CREATE TABLE `shop_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_categories`
--

INSERT INTO `shop_categories` (`id`, `name`) VALUES
(1, 'Informatique'),
(2, 'Litérature'),
(3, 'Hi-Fi');

-- --------------------------------------------------------

--
-- Table structure for table `shop_orders`
--

CREATE TABLE `shop_orders` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `address` text DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `ordered` tinyint(4) NOT NULL DEFAULT 0,
  `date_ordered` datetime DEFAULT NULL,
  `payed` tinyint(4) NOT NULL DEFAULT 0,
  `date_payed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_orders`
--

INSERT INTO `shop_orders` (`id`, `userID`, `total`, `address`, `zipcode`, `bank_account`, `ordered`, `date_ordered`, `payed`, `date_payed`) VALUES
(37, 2, 5238, 'Raccoon City', '2130', '24452', 1, '2020-05-24 20:50:51', 1, '2020-05-24 21:09:21'),
(38, 2, 1499.8, 'Raccoon City', '2130', '1234', 1, '2020-05-24 21:17:05', 1, '2020-05-24 21:17:07'),
(39, 12, 3599.88, 'Raccoon', '6667', '45120', 1, '2020-05-24 22:36:05', 1, '2020-05-24 22:36:11'),
(40, 14, 56.730000000000004, 'Raccoon', '7894', '48523585616', 1, '2020-05-25 14:36:34', 1, '2020-05-25 14:36:36'),
(42, 14, 1499.8, NULL, NULL, NULL, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shop_purchase`
--

CREATE TABLE `shop_purchase` (
  `id` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `articleID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_purchase`
--

INSERT INTO `shop_purchase` (`id`, `orderID`, `articleID`, `quantity`, `total_price`) VALUES
(44, 25, 6, 3, 5238),
(46, 25, 10, 1, 9.87),
(47, 26, 12, 2, 22.46),
(48, 26, 11, 1, 8.88),
(49, 26, 10, 1, 9.87),
(50, 26, 9, 3, 32.34),
(51, 27, 5, 1, 1499.8),
(52, 27, 4, 1, 899.97),
(53, 27, 12, 1, 11.23),
(54, 28, 6, 1, 1746),
(55, 28, 5, 1, 1499.8),
(56, 28, 3, 3, 1154.46),
(57, 29, 6, 1, 1746),
(58, 29, 12, 1, 11.23),
(59, 29, 10, 1, 9.87),
(87, 35, 6, 1, 1746),
(88, 35, 6, 1, 1746),
(89, 35, 6, 1, 1746),
(90, 36, 6, 3, 5238),
(91, 37, 6, 3, 5238),
(92, 38, 5, 1, 1499.8),
(93, 39, 4, 4, 3599.88),
(94, 40, 8, 2, 16.34),
(95, 40, 10, 3, 29.61),
(96, 40, 9, 1, 10.78),
(97, 41, 4, 1, 899.97),
(98, 42, 5, 1, 1499.8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `role_lvl` int(11) NOT NULL DEFAULT 0,
  `register_date` datetime NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `date_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `email`, `active`, `role_lvl`, `register_date`, `last_name`, `first_name`, `address`, `zipcode`, `date_birth`) VALUES
(2, 'carlos', '$2y$10$11Sv6FQPyB/WZMj4PHRva.cmmILqUaN8BW.lyuVGFjzGdeluHcf/.', 'carlos.olivera@umbrella-ubcs.com', 1, 30, '2020-04-14 18:36:33', 'Olivera', 'Carlos', 'Raccoon City', '2130', NULL),
(12, 'jill', '$2y$10$zC6JVAPbVsHzaUef3VwAl.tGF/0WqMkAWEoi61yDYeXuKAIYemjmu', 'jill.valentine@rdp-stars.com', 1, 50, '2020-04-13 20:11:26', 'Valentine', 'Jill', 'Raccoon', '6667', '1975-04-02'),
(13, 'claire', '$2y$10$hKvYzO79kYK/9P0Xkwcoje6jvNq86n.0iNeF8BvSQET.JEX04KXD.', 'claire.redfield@raccoon-city.com', 1, 40, '2020-04-13 20:26:27', 'Redfield', 'Claire', NULL, NULL, NULL),
(14, 'leon', '$2y$10$uyEGoiD75O8GuXnExr2WceZSEbIusC8siZST5cTm3xgwGQA9vUjYC', 'leon.kennedy@rpd.com', 1, 40, '2020-04-13 20:28:20', 'S. Kennedy', 'Leon', NULL, NULL, NULL),
(15, 'sherry', '$2y$10$ANZlQ/vM0N2OFUbeZOiC3ObOk6ZbHo7NJRT3G4TNBTIKdhaMNEi6W', NULL, 1, 20, '2020-04-13 20:29:58', 'Birkin', 'Sherry', NULL, NULL, NULL),
(18, 'ada', '$2y$10$5u/Q1fyb9K4gSKxyiyw93u0PzmWSqCAdvAU4B9y0sQxDqIdmaNrmq', NULL, 1, 30, '2020-04-15 00:11:43', 'Wong', 'Ada', NULL, NULL, NULL),
(19, 'albert', '$2y$10$C/3z4K45W2lIL0ldjann1Oy6b2CG.F/4cCAd2AckBWCr12PhgkpnW', NULL, 1, 50, '2020-04-16 23:29:11', 'Wesker', 'Albert', NULL, NULL, NULL),
(20, 'rebecca', '$2y$10$Njh7nK6K0r27sH2qx5C7COOPvlAtlUshNceT8cezwTGlFNvyeAdmu', NULL, 1, 10, '2020-04-16 23:40:31', 'Rebecca', 'Chambers', NULL, NULL, NULL),
(21, 'barry', '$2y$10$cqucL0IPvy7UUgnHf9OgHuf9PP436YYy6JyTUqSSFXtCN3xQro.ZC', NULL, 1, 10, '2020-04-17 17:54:34', NULL, 'Barry', NULL, NULL, NULL),
(22, 'chris', '$2y$10$VfuqVkgX8Jqot7V8GtlvhuaRBSwA.jvbUc0LJwXgOb8vlneBjkPYy', NULL, 1, 40, '2020-04-21 15:45:00', 'Redfield', 'Chris', NULL, NULL, NULL),
(24, 'marvin', '$2y$10$jm2QuDQ/PvSWq.RVDhRpP.0mQPKj/nedHcFWAGnWEkqijWtydfkXe', 'marvin@mail.com', 1, 10, '2020-04-21 20:58:01', 'Branagh', NULL, 'Raccoon City', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `userID`, `login`) VALUES
(1, 2, '2020-05-24 21:52:42'),
(2, 12, '2020-03-24 22:35:34'),
(3, 12, '2020-05-20 23:04:15'),
(4, 12, '2020-05-24 23:04:21'),
(5, 12, '2020-05-24 23:22:28'),
(6, 2, '2020-05-25 01:26:56'),
(7, 12, '2020-05-25 13:51:22'),
(8, 2, '2020-05-25 14:15:35'),
(9, 13, '2020-05-25 14:16:23'),
(10, 14, '2020-05-25 14:18:33'),
(11, 14, '2020-05-25 14:21:01'),
(12, 2, '2020-05-25 15:07:11'),
(13, 14, '2020-05-25 15:09:11'),
(14, 12, '2020-05-25 15:09:45'),
(15, 2, '2020-05-25 15:09:57'),
(16, 13, '2020-05-25 15:10:06'),
(17, 2, '2020-05-25 15:13:49'),
(18, 2, '2020-05-25 15:16:46'),
(19, 12, '2020-05-25 15:18:48'),
(20, 2, '2020-05-25 15:22:29'),
(21, 12, '2020-05-25 15:27:15'),
(22, 12, '2020-05-25 16:01:54'),
(23, 12, '2020-05-25 17:29:29'),
(24, 12, '2020-05-25 18:01:36'),
(25, 12, '2020-05-25 18:03:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minichat`
--
ALTER TABLE `minichat`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_article`
--
ALTER TABLE `shop_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_categories`
--
ALTER TABLE `shop_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_orders`
--
ALTER TABLE `shop_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_purchase`
--
ALTER TABLE `shop_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `minichat`
--
ALTER TABLE `minichat`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shop_article`
--
ALTER TABLE `shop_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shop_categories`
--
ALTER TABLE `shop_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_orders`
--
ALTER TABLE `shop_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `shop_purchase`
--
ALTER TABLE `shop_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
