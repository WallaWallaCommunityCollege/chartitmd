CHANGELOG.md
============

Auto-generated from Git log.

## Table of Contents

 * [master](#master)
 * [0.0.3](#0.0.3)
 * [0.0.2](#0.0.2)
 * [0.0.1](#0.0.1)

## [master](../../tree/master)
 * [9a752866fd](../../commit/9a752866fd3dfd54ee6fdd3b4878cea62e1c1125) 2019-06-11T16:17:55+00:00 (Michael Cummings) - For final code.
 * [eb4520423e](../../commit/eb4520423e99118908fe94194b299f761ea67307) 2019-06-10T20:37:19+00:00 (Michael Cummings) - Updates to vitalSigns page for Alec to add to manual.
 * [97abe8c2fb](../../commit/97abe8c2fb9d876ab623d592e63a9a04fec33166) 2019-06-10T19:36:16+00:00 (Michael Cummings) - Merge remote-tracking branch 'origin/master'
 * [35eca19217](../../commit/35eca19217e0fddd12d5891c8ef242ed68ee1407) 2019-06-10T02:33:54+00:00 (Michael Cummings) - Fixed issue with indirect User class self reference via ModelCommon to a direct self reference instead?!? Really JS WTF?!? Fixed the warning in console etc.
 * [3cedee13db](../../commit/3cedee13db14ed38721cb43d9d645951968ff8a4) 2019-06-09T23:40:56+00:00 (Michael Cummings) - Updated throw statements in fromJson() static method for missed UnitOfMeasurement class.
 * [3a9b6fbe0b](../../commit/3a9b6fbe0bd198aa5ffff09c2187934c2664af31) 2019-06-09T23:38:52+00:00 (Michael Cummings) - Fixed bogus before commit reformat changes to generate proxies.
 * [864826ad59](../../commit/864826ad59ed1bb5d8f08fd6ef681d788d04277c) 2019-06-09T23:36:47+00:00 (Michael Cummings) - Updated throw statements in fromJson() static method for several classes.
 * [ab3c8f74f0](../../commit/ab3c8f74f09f262f04ade21473b0abed8de4b511) 2019-06-09T23:32:04+00:00 (Michael Cummings) - Update js and php User class for new createdBy column. Updated js to extend from ModelCommon class and to be more like some of the other Model classes. Fixed several small issues in UserRepository class.
 * [cd4761a7e0](../../commit/cd4761a7e05d8f66f53713c2a382570d9329868a) 2019-06-09T18:36:13+00:00 (Michael Cummings) - Added GetForPatientTrait to VitalSignsRepository class.
 * [7c430b9814](../../commit/7c430b9814b5e45d1556ca11e3c42a836e0e350b) 2019-06-09T18:34:41+00:00 (Michael Cummings) - Updated PatientRepository::getById() to return patient without extra array wrapper.
 * [b4861d67e5](../../commit/b4861d67e584ab0bbc578b04bda76d6bcba27d3c) 2019-06-09T18:31:05+00:00 (Michael Cummings) - Updated getForPatientId() method to have orderBy clause for createdAt column.
 * [d4960739e6](../../commit/d4960739e6b69ca56f7730f3ecc32b69e5741cf9) 2019-06-09T18:28:47+00:00 (Michael Cummings) - Fixed PHP Temperature class to make measurement column required.
 * [72c9d315ac](../../commit/72c9d315acffdfb24cb337b5c0b44f6d716b7c2a) 2019-06-09T18:24:33+00:00 (Michael Cummings) - Rewrite/Update of PHP VitalSigns class.
 * [1decc9253b](../../commit/1decc9253be8ae86ec8826729f14c2a627f66f83) 2019-06-09T18:19:48+00:00 (Michael Cummings) - Total re-write of VitalView js class.
 * [17b6911c1b](../../commit/17b6911c1b00ec37e5b078135a3b96edb4c9c422) 2019-06-09T18:14:56+00:00 (Michael Cummings) - Added new js Model classes for Gender, Location, Measurement, Method, UnitOfMeasurement and parent ModelCommon class.
 * [7585ebcc37](../../commit/7585ebcc37014e4c5fa97ec50f397d132e1cc59d) 2019-06-09T18:10:37+00:00 (Michael Cummings) - Updated electron View menu to include Home(index.html) item.
 * [1d9fcd01a0](../../commit/1d9fcd01a04c22381b67e52968bbdbc000864aa8) 2019-06-09T17:47:25+00:00 (Michael Cummings) - Removing no longer needed blood pressure html, js, entity, proxy, and repository.
 * [d9967c9371](../../commit/d9967c9371f1c325a82196e6e237b63f054d5ba7) 2019-06-09T17:40:16+00:00 (Michael Cummings) - Updated exception handling for patient route in src/routes.php file. Removed no longer valid bloodPressures route.
 * [ae5289fc5b](../../commit/ae5289fc5ba5013019713ab36ac4ad14f2766c0b) 2019-06-09T17:34:57+00:00 (Michael Cummings) - Added root declare to .editorconfig file.
 * [c15465699c](../../commit/c15465699cd62a152f6b81d19a9af044d092c51f) 2019-06-09T17:33:39+00:00 (Michael Cummings) - Added some global namespace optimizations to Uuid4Trait.
 * [060be831e8](../../commit/060be831e838d8bb897ff02eeb4811cf49749760) 2019-06-09T17:30:08+00:00 (Michael Cummings) - Updated patientContact.js for changes to js Patient class.
 * [32fb79db8e](../../commit/32fb79db8ed8e0b62c6c099f0cd93336ed9d5db6) 2019-06-09T17:28:01+00:00 (Michael Cummings) - Updated summary.html to use common stylesheets. Remove unneeded script tag for jquery.
 * [484f19bbcc](../../commit/484f19bbccede576d517d19044c08ba936053804) 2019-06-09T17:25:15+00:00 (Michael Cummings) - In main.css dropped text-shadow on th tag.
 * [44fc4d41e0](../../commit/44fc4d41e0de2ed6332e0ccfbdcae8d265657da4) 2019-06-09T17:23:29+00:00 (Michael Cummings) - Switched patient buttons click events to use jquery. Updated Patient to use fromJson() builder method. Updated patient.html to remove unused table and move buttons to better location.
 * [3b32c15974](../../commit/3b32c15974787aa1b4281394c869b11d78a4bcbc) 2019-06-09T16:21:45+00:00 (Michael Cummings) - Revert "Removed dup client/patient-summary/ directory."
 * [39ddb286b4](../../commit/39ddb286b43a69f95e404aef1f57e30895a0e5b3) 2019-06-09T16:01:42+00:00 (Michael Cummings) - Removed dup client/patient-summary/ directory.
 * [86a4a6deca](../../commit/86a4a6decaff6fc5c9ace08b606cd53b3cde9998) 2019-06-09T15:57:24+00:00 (Michael Cummings) - Updated client Model/Patient class to use fromJson() method like other models. Also switched back to details/summary display system for now.
 * [cb78f9efbc](../../commit/cb78f9efbcf186d128a6d4a0b344c397f06dec81) 2019-06-09T05:47:20+00:00 (Michael Cummings) - Fixed /user/login route in routes.php file. Fixed UserRepository::userLogin() method to return correct result types. Updated confirm and login html and js in client for fixes in PHP.
 * [31c73be0da](../../commit/31c73be0da65d2b43ccb92323d32ef61f9959949) 2019-06-07T20:28:15+00:00 (Alec Aichele) - Updated user manual
 * [9c9610c7a5](../../commit/9c9610c7a542ae454062cb6db0c1d862b9ba3d65) 2019-06-01T21:57:36+00:00 (Michael Cummings) - Merge remote-tracking branch 'origin/master'
 * [366f83deea](../../commit/366f83deeaa830ab707cdbcbf18615831ed0adbd) 2019-06-01T21:46:06+00:00 (Michael Cummings) - Updated Doctrine proxies for entity changes.
 * [3acfb2ecfa](../../commit/3acfb2ecfa5d5c57ff910a117afff9479bb0e3fa) 2019-06-01T21:44:32+00:00 (Michael Cummings) - Added interface required getMeasurementsForPatientId() to trait. Updated PatientRepository::getVitalSignsForPatientId() to use new getMeasurementsForPatientId() method.
 * [829731b331](../../commit/829731b331312038c9bbd01ea70bffdaa027c670) 2019-06-01T21:41:25+00:00 (Michael Cummings) - Added getMeasurementsForPatientId() to GetForPatientInterface.
 * [7996c417f1](../../commit/7996c417f14d19d94120f3e45ae07a90df7ae143) 2019-06-01T21:38:19+00:00 (Michael Cummings) - Switched Pain to use MeasurementCommon trait so it is no longer outlier in vital signs measurements.
 * [23360a03c4](../../commit/23360a03c4624380d033fc6f69e8dc62db394f57) 2019-06-01T21:34:42+00:00 (Michael Cummings) - Changed Temperature class to also use measurement that was missed before.
 * [2e803ef396](../../commit/2e803ef3963e8ab50f27e57b55039b2143a8ba8c) 2019-06-01T21:32:50+00:00 (Michael Cummings) - Added filter to remove redundant 'patient' from serialize JSON results.
 * [39d906028a](../../commit/39d906028a29f370e4877e4542122d7078a6b608) 2019-06-01T21:30:36+00:00 (Michael Cummings) - Cleaned up BloodPressure leftovers in other classes.
 * [b91b6aa477](../../commit/b91b6aa47719c674faca83209c286c9dca742a30) 2019-06-01T05:00:29+00:00 (Alec Aichele) - Current work up to date
 * [1d67f7152e](../../commit/1d67f7152e2c9c854e8244b83d241516e89ddfff) 2019-05-31T22:28:41+00:00 (Michael Cummings) - Fix missing use for ORM in Medication class comment.
 * [e52c173afe](../../commit/e52c173afe938f967fca3ccdc4da81cb67849d36) 2019-05-31T22:24:10+00:00 (Michael Cummings) - Merge remote-tracking branch 'origin/master'
 * [bdb621c1f5](../../commit/bdb621c1f5eff6bc1ab365fc0b9b8e7cfc260f7d) 2019-05-31T22:23:50+00:00 (Michael Cummings) - Formatting anf author changes to new Medication classes.
 * [6f0f585f26](../../commit/6f0f585f267e1efe4a68e8e47cc53680761fff51) 2019-05-31T22:05:45+00:00 (Alec Aichele) - Patient contact improvements
 * [ffa02f6ec3](../../commit/ffa02f6ec3731f40af11ea533ba09b4bcbdff063) 2019-05-31T22:04:24+00:00 (Alec Aichele) - Merge remote-tracking branch 'origin/master'
 * [ae508b0d13](../../commit/ae508b0d13bd8e1a3a82805c41e8f8693fd6ad94) 2019-05-31T22:03:43+00:00 (Alec Aichele) - Contact improvements and added user manual
 * [f342ccf3b3](../../commit/f342ccf3b3c194e7d5cba02013a9e9401e7f118a) 2019-05-31T22:00:06+00:00 (jwood) - Added DBConnection.php a simple page to hold the PDO object.
 * [48c9b04d7f](../../commit/48c9b04d7fb9bba2b2feadf1f2e8e099fd71467f) 2019-05-31T21:59:41+00:00 (jwood) - Added DBConnection.php a simple page to hold the PDO object.
 * [a8f59f789c](../../commit/a8f59f789cebbe317458ae1d39b7840455372808) 2019-05-31T20:23:51+00:00 (Michael Cummings) - Merge remote-tracking branch 'origin/master'
 * [00f0b17197](../../commit/00f0b17197019d365508ff906c2525ee71856845) 2019-05-31T20:23:04+00:00 (Alec Aichele) - Merge remote-tracking branch 'origin/master'
 * [e35600737f](../../commit/e35600737f75655aa582ef0bcb99ac7e7266d548) 2019-05-31T20:22:48+00:00 (Michael Cummings) - Push for everything so everyone can see it.
 * [2b15b21a5f](../../commit/2b15b21a5f3869f18c8263e7f29d08a91a400837) 2019-05-31T20:21:34+00:00 (Alec Aichele) - Working on patient contact page
 * [e604bcb143](../../commit/e604bcb143dad6d19025aa7642f481895af1c89a) 2019-05-27T17:53:49+00:00 (Michael Cummings) - Removed junk files from root directory.
 * [439befa5c1](../../commit/439befa5c1fe2947bcd44043e101563ed7cc11e6) 2019-05-27T09:34:37+00:00 (Michael Cummings) - Added placeholder DoctrineMigrationVersions class entity.
 * [55c31da084](../../commit/55c31da084e8969f8ed271ee9ce507335a43b8ec) 2019-05-27T09:33:00+00:00 (Michael Cummings) - Updated trait DAndNCommon to reflect nullable description.
 * [9ebc1751d7](../../commit/9ebc1751d7c9a9076fd9eefb17ce2a75d9fe5abd) 2019-05-26T17:09:39+00:00 (Michael Cummings) - Updated/Added implementation for \JsonSerializable to all Entity classes.
 * [4ce9ffacea](../../commit/4ce9ffacea961de1ea1694a5b7b15901590137a5) 2019-05-26T17:03:21+00:00 (Michael Cummings) - Added new src/Model/Entity/DAndNCommon trait for common description and name methods and properties. Updated Location, Method, Permission, Role, and UnitOfMeasurement classes to use new trait.
 * [56d1790412](../../commit/56d1790412410ed92a43675524c9624d351e940d) 2019-05-26T16:00:11+00:00 (Michael Cummings) - Added new src/Model/Repository/JsonExceptionCommon trait helper to handle exception to JSON conversion.
 * [1469ba3379](../../commit/1469ba3379044f94f08c745d2bd23b934de50268) 2019-05-26T15:55:27+00:00 (Michael Cummings) - Updated Patient class not to include bloodPressures, heights, and weights collections.
 * [825691c545](../../commit/825691c54557e055d21f9c9dea276f7b5a360142) 2019-05-26T15:50:27+00:00 (Michael Cummings) - Added all of the Repository classes into doctrine.php config file.
 * [590801df13](../../commit/590801df1302b95e0b61fcb2e48d138131d67454) 2019-05-26T15:47:48+00:00 (Michael Cummings) - Updated Proxies without reformatting.
 * [04a9b082ad](../../commit/04a9b082ad9ba487d76b880f7afa67b054ff9f0f) 2019-05-25T03:07:26+00:00 (Michael Cummings) - Added and updated Doctrine proxies.
 * [84a7dcb20b](../../commit/84a7dcb20b07fb271b93f0094f313e12ef1b0b11) 2019-05-25T03:06:18+00:00 (Michael Cummings) - Added new OxygenSaturation, Pain, Pulse, Respiration, and Temperature Entity class, and Repositories.
 * [f52aa2ccdd](../../commit/f52aa2ccdd0eaf5076c64ad1469c9ed1d5cd20ad) 2019-05-25T03:01:11+00:00 (Michael Cummings) - Updated PatientRepository for renamed height and weight tables.
 * [595cd69fd4](../../commit/595cd69fd4a395baa524b4251988dd74f480cc9e) 2019-05-25T02:58:21+00:00 (Michael Cummings) - Updated BloodPressure PHP class to implement JsonSerializable and to use integer pressures. Updated to use MeasurementCommon trait.
 * [34dd393e43](../../commit/34dd393e433374d625f254e509e4cd7d0a124e18) 2019-05-25T02:54:49+00:00 (Michael Cummings) - Added new MeasurementCommon trait.
 * [5e21c29618](../../commit/5e21c29618b054fd141d89bf958d645abf04b475) 2019-05-25T02:53:34+00:00 (Michael Cummings) - Updated UnitOfMeasurement to implement JsonSerializable interface.
 * [5b1b472844](../../commit/5b1b472844b0181f02564ab613124e209ab85e69) 2019-05-25T02:49:14+00:00 (Michael Cummings) - Renamed PatientHeight and PatientWeight classes to just Height and Weight.
 * [c26638f99d](../../commit/c26638f99d09bb5d7d9b32bd5da287d52fca1e44) 2019-05-25T02:43:24+00:00 (Michael Cummings) - Updated vitalsigns in JS to use tables instead of details etc.
 * [7c18d0a690](../../commit/7c18d0a69031c9e854e2466ef3c881c41decab68) 2019-05-25T02:39:53+00:00 (Michael Cummings) - Reformatting code in Patient.js class.
 * [87a6848a3d](../../commit/87a6848a3df6efa764bb55e5ce623f8078bf0ae6) 2019-05-25T02:38:18+00:00 (Michael Cummings) - Updated table stuff in main.css file.
 * [6d1b7ee3b2](../../commit/6d1b7ee3b26fc9f2fbcf42bcac64ebaf3fad2e1f) 2019-05-22T18:27:42+00:00 (Michael Cummings) - Updated Location.php and Method.php to extend JsonSerializable.
 * [e001eef9e8](../../commit/e001eef9e8846e4ef37443b8b402bc96363e95f2) 2019-05-22T18:23:08+00:00 (Michael Cummings) - Updated everything for jquery name change.
 * [6fa421acb6](../../commit/6fa421acb6548a45925c8f2d0f7f56cfaafa6784) 2019-05-22T18:20:02+00:00 (Michael Cummings) - Added cim-client/src/Model/VitalSigns.js class.
 * [9733d7de10](../../commit/9733d7de10bb39d80600613764f7d7402cef7fd4) 2019-05-22T18:18:43+00:00 (Michael Cummings) - Renamed jquery with version #.
 * [d5a9ede653](../../commit/d5a9ede65351eb731d420304dd8eb24817ef56e7) 2019-05-22T18:08:16+00:00 (Alec Aichele) - Added patient contact
 * [a60172d016](../../commit/a60172d016105cfe88d83545059f82085c46d294) 2019-05-22T17:39:45+00:00 (Alec Aichele) - Resolving more conflicts
 * [3a07b184fc](../../commit/3a07b184fc9322cb8d69f1262c555e0c9ba35639) 2019-05-22T15:34:49+00:00 (jwood) - added blank templates to each page
 * [aaf6f0507d](../../commit/aaf6f0507dc3718c5c2abd5195a8f3749accf5d6) 2019-05-22T15:08:17+00:00 (Alec Aichele) - Resolving merge conflict
 * [bfcd6b0939](../../commit/bfcd6b09396619a941d2a12ec4f421b0bd746e53) 2019-05-22T01:48:23+00:00 (jwood) - updated and added some stuff
 * [f4cd9bfe67](../../commit/f4cd9bfe673762c1542fdb6021ee100b819d02c1) 2019-05-21T22:50:24+00:00 (Michael Cummings) - Misc. updates to PHP Entities. Updatred Doctrine proxy classes.
 * [464dbfe7c1](../../commit/464dbfe7c175223e0a75fbd14ef8dc1639787902) 2019-05-21T22:47:54+00:00 (Michael Cummings) - Some updates to developer README.md file.
 * [b128c0cdf7](../../commit/b128c0cdf71b2925170b7f8d9fc662d0a6acbf15) 2019-05-21T22:47:07+00:00 (Michael Cummings) - Some updated to AuthManager class.
 * [fbc8e691fe](../../commit/fbc8e691fe9e26a5468e98c4185787970cbe95ce) 2019-05-21T22:46:14+00:00 (Michael Cummings) - Some general cleanup in client code.
 * [1a573de342](../../commit/1a573de3424686d30061d58396e46cdf59142716) 2019-05-21T22:45:24+00:00 (Michael Cummings) - Renamed client vital signs pages and scripts. Updated script to use one of the new endpoints.
 * [235b99b84f](../../commit/235b99b84f0779634f6767bcbd06f4c79fc680b3) 2019-05-21T22:43:02+00:00 (Michael Cummings) - Added VitalSignsRepository to doctrine.php config file. Updated VitalSigns entity to better match what was in BloodPressure entity. Added to/fixed VitalSignsRepository class for new endpoints. Updated routes.php for new vital signs endpoints.
 * [65536f9a27](../../commit/65536f9a276aa354249b423a166c0a50d6ca6427) 2019-05-21T15:28:29+00:00 (Alec Aichele) - Minor improvements
 * [632226c61c](../../commit/632226c61c5464003a561ac445fc78597b2d6367) 2019-05-20T19:59:37+00:00 (Michael Cummings) - Update for vitalsigns from class.
 * [13de9ff4de](../../commit/13de9ff4de88e7788a938447e6c8b8a016489483) 2019-05-15T19:06:36+00:00 (Alec Aichele) - Merge remote-tracking branch 'origin/master'
 * [18c2220ea8](../../commit/18c2220ea83a6d4483230d68d52c1df6c83a7231) 2019-05-15T19:05:24+00:00 (Alec Aichele) - Improved vital signs repository
 * [ce25bbe46d](../../commit/ce25bbe46d7132d1efc77ea1dbd98233ddf656f1) 2019-05-15T19:00:16+00:00 (Alec Aichele) - Adding vital signs repository in routes
 * [b491a0eb90](../../commit/b491a0eb908a2aedd9584dede43dcb94e0306f83) 2019-05-11T18:29:13+00:00 (Michael Cummings) - Replaced misplaced (array) conversion of $this in User.php and EntityCommon.php that broke jsonSerialize() methods.
 * [33b7bdac23](../../commit/33b7bdac233aaa480ed9cc64bf35464e9186427c) 2019-05-11T17:56:27+00:00 (Michael Cummings) - Updated changelog with all current work included.
 * [00d158e101](../../commit/00d158e1010d81033b4d1db3d855edb4b5c1014f) 2019-05-11T17:52:35+00:00 (Michael Cummings) - Minor optimization in middleware.php file.
 * [d36d7549d1](../../commit/d36d7549d132a979d4b203cabbd5d2343b2cd8d6) 2019-05-11T17:46:25+00:00 (Michael Cummings) - Updated doctrine proxies for entity changes.
 * [d6c7c99877](../../commit/d6c7c99877eff466d76de35b11eca1ae3ae5910a) 2019-05-11T17:43:43+00:00 (Michael Cummings) - Started Refactoring AuthManager classes.
 * [41515137a2](../../commit/41515137a248c1efec35f659ebe6f6a7736a5acb) 2019-05-11T17:42:20+00:00 (Michael Cummings) - Added new routes for user paths.
 * [2ad9f23f7c](../../commit/2ad9f23f7c4005bd7bff70a9cf5538913b035bf1) 2019-05-11T17:40:45+00:00 (Michael Cummings) - Removed outdated DB migrations.
 * [7653fb0502](../../commit/7653fb05021f116c3699ec130036f153baf5b160) 2019-05-11T17:39:06+00:00 (Michael Cummings) - Updated client package.json to include react and bootstrap. Also updated versions on other packages.
 * [a5bdab86e8](../../commit/a5bdab86e887d00a09b3586dee46185acc8599db) 2019-05-11T17:36:55+00:00 (Michael Cummings) - Updated to couple of the *Repository classes.
 * [54afd22045](../../commit/54afd220459be1a13cc733cf5762eeca821a5e90) 2019-05-11T17:34:11+00:00 (Michael Cummings) - yoda fixed in config/doctrine file.
 * [648bfdfa2f](../../commit/648bfdfa2f18219b563dd9f1d50913825b12a9ee) 2019-05-11T17:32:55+00:00 (Michael Cummings) - Updated RBAC entities to use EntityCommon where possible.
 * [78a16d8711](../../commit/78a16d87116d9b5ecdbd6b9d08974850522fe504) 2019-05-11T17:28:28+00:00 (Michael Cummings) - Added setPassword() method to client User model.
 * [c57df7f0f9](../../commit/c57df7f0f959cba94c6d029653c17134f33e476d) 2019-05-09T03:54:23+00:00 (Alec Aichele) - Various additions including the vital-signs page and a new patient summary page
 * [501a36e3d6](../../commit/501a36e3d6180c0e70a51e0782aaa14ece7bcb73) 2019-04-16T23:05:50+00:00 (Alec Aichele) - Merge remote-tracking branch 'origin/master'
 * [99311533f1](../../commit/99311533f1fa044c0081dbd4e7c24cdd45278aeb) 2019-04-16T23:05:11+00:00 (Alec Aichele) - Continued work on the patient summary page, added a settings page, and have moved those and their assets into cim-client
 * [0e0d6888fa](../../commit/0e0d6888fa0b4bc6ed7098398337ee7a3727b052) 2019-04-14T05:08:22+00:00 (Michael Cummings) - Refactor query building in several entity repositories to move outside try blocks etc.
 * [068bedd125](../../commit/068bedd1258c717bf54d35e0e6e826893d5f833a) 2019-04-14T03:32:04+00:00 (Michael Cummings) - Updated Patient::preUpdate() to use DateTime and not immutable.
 * [a5e6454633](../../commit/a5e64546335e0d6ccfbbf94bdd8a5e9793dcf162) 2019-04-13T20:15:49+00:00 (Michael Cummings) - Updated User::jsonSerialize() to closer match code from entity common trait.
 * [223733808c](../../commit/223733808c4ca64f9d9ba2e3ef0a3773fc51eccb) 2019-04-13T20:13:41+00:00 (Michael Cummings) - Switched User::preUpdate() to use DateTime instead of immutable version.
 * [2d6e99ec02](../../commit/2d6e99ec02456083272ba992d05a543f8ce224f9) 2019-04-13T20:12:52+00:00 (Michael Cummings) - Updated User::getUpdatedAt() method to handle null and string values correctly. Updated getCreatedAt() method to handle string values correctly.
 * [1567465726](../../commit/1567465726a18b87d1cbfa92e8bc29bf1d45ad4e) 2019-04-13T20:06:28+00:00 (Michael Cummings) - Updated getUpdatedAt() method to handle null and string values correctly.
 * [f862be76e6](../../commit/f862be76e60f1b84a519d94943241ed53ce1cf9d) 2019-04-13T20:02:25+00:00 (Michael Cummings) - Added missing strict_types declare to some entities.
 * [7bf01b5a06](../../commit/7bf01b5a06d1078ee8d617a1b706935d82b514b1) 2019-04-13T19:14:10+00:00 (Michael Cummings) - Updated error handling in bin/cim-migrations file so actual error message is shown.
 * [cf8209604f](../../commit/cf8209604fe51046e383199514c7ef42cb3dff63) 2019-03-01T23:57:18+00:00 (jwood) - added changedlog
## [0.0.3](../../tree/0.0.3)
 * [3514fd96aa](../../commit/3514fd96aaa05f2abba2edc85ea2813f69f329bb) 2019-04-07T17:41:23+00:00 (Dragonrun1) - Updated patient HTML and js files to work with new Patient class and show example for future user configurable view.
 * [34e9fa51c9](../../commit/34e9fa51c93bf221ad7dd2d2fb312206b8d1b50a) 2019-04-07T17:38:29+00:00 (Dragonrun1) - Did some accessibility (color) updates to main.css file.
 * [15e9480480](../../commit/15e94804805fb686b441f75ded72281f3ca06551) 2019-04-07T17:35:43+00:00 (Dragonrun1) - Created cim-client/src/Model/Patient and JsonDate js classes to work with JSON data from server.
 * [1e33bbe053](../../commit/1e33bbe053c02a905765ae2dad8518f3e8c0caf0) 2019-04-07T17:30:27+00:00 (Dragonrun1) - Updated proxies.
 * [de06ae2d52](../../commit/de06ae2d52fac4fb8a84903c81fadbbaea8f5046) 2019-04-02T16:43:30+00:00 (Dragonrun1) - Refactored how JQuery is called. Cleaned up require statements.
 * [d988e99ef9](../../commit/d988e99ef90274fa866aca0611deea56e8e48ae7) 2019-04-02T16:40:41+00:00 (Dragonrun1) - Add recentBloodPressures details. Added .bp to CSS for bloodPressures. Formatting update to patient.html file. Changed links to not go anywhere for now.
 * [7fb142fa82](../../commit/7fb142fa82ac54d0713a64efc8e5a89ba5b2c073) 2019-04-01T03:03:26+00:00 (Dragonrun1) - Merge remote-tracking branch 'origin/master'
 * [e77746eaa0](../../commit/e77746eaa09937b6caf6a14192f89f0004a4a5f0) 2019-04-01T03:02:55+00:00 (Dragonrun1) - Minor update to Proxy file. Updated composer.lock file.
 * [308a706d8f](../../commit/308a706d8f86c144015508f8a4cecd24dfad1231) 2019-04-01T03:01:37+00:00 (Dragonrun1) - Updated patient.js to use dotenv for server URL. Updated client .env.example file for everyone's staging info.
 * [798e28a800](../../commit/798e28a800cba16ae59a5b2917aa8d4180bc158b) 2019-04-01T02:17:14+00:00 (Alec Aichele) - patient summary page.
 * [20a56047e9](../../commit/20a56047e927aa2c44ba65191ccc675f92edda23) 2019-03-31T22:45:59+00:00 (Dragonrun1) - Added new Model/Repository classes that were missed in other PHP work. Delete empty FinalPaper_Michael.docx that became actual paper that was turned in for class.
 * [7a37991707](../../commit/7a37991707a44b23cb7a49bf668fde35da9f6a39) 2019-03-31T22:41:07+00:00 (Dragonrun1) - Cleaned up refs to 960 grid from index.html file. Moved patient stuff into new patient.html and js files. Lots of work on patient files to switch from using tables to IMHO cleaner details/summary structure.
 * [b31058f0ac](../../commit/b31058f0ac3ec48970fa324763c3c88b518d4f00) 2019-03-31T22:36:36+00:00 (Dragonrun1) - Added first try at js model of User class from PHP side. First table base stab at users.html and users.js files.
 * [c608476316](../../commit/c6084763165456ad7388bf071d70d1e273b36715) 2019-03-31T22:33:56+00:00 (Dragonrun1) - Update structure and added many default electron role items to main app menu.
 * [5f578000c6](../../commit/5f578000c6ab6d51145bb4fdd7171f4ef22dac40) 2019-03-31T22:30:36+00:00 (Dragonrun1) - Added css links to src/about.html. Remove ref to 960 grid.
 * [a26e028452](../../commit/a26e02845244b944d32f6a09d4975800212fe011) 2019-03-31T22:28:39+00:00 (Dragonrun1) - Updated electron version in package.json for client. Added electron-packager for now to dev depends. Added dotenv, jquery, luxon dependencies for Node.
 * [9193f423a1](../../commit/9193f423a1c2a22ab5781aa30270f0df54691a74) 2019-03-31T22:25:27+00:00 (Dragonrun1) - Lots of changed to assets/css/main.css to support work on patient tables etc.
 * [048e6094b9](../../commit/048e6094b9a75b011e78d093ef63e4cf1b276067) 2019-03-31T22:23:52+00:00 (Dragonrun1) - Updated routes config for changes to patient endpoint. Added '/users/' endpoint.
 * [da835c2dee](../../commit/da835c2dee814bdff20858a87425021bbeb10bb6) 2019-03-31T22:20:41+00:00 (Dragonrun1) - Updated/Added stuff to patient related Doctrine repositories as needed for changes to Entity classes.
 * [93f950e5d7](../../commit/93f950e5d7e38eef03c20dacf484fdcfdebd66a2) 2019-03-31T22:18:28+00:00 (Dragonrun1) - Updated/Added stuff to {User, Role, Permission} Repository classes.
 * [9d88ac540b](../../commit/9d88ac540b8b2ad32b76ebf9b71186170823d897) 2019-03-31T21:59:26+00:00 (Dragonrun1) - Updated/Added all the Doctrine Entity Proxies.
 * [457adf0781](../../commit/457adf0781ab168306bff492b25dbe0729e86df6) 2019-03-31T21:57:19+00:00 (Dragonrun1) - Updated Model/Patient to use new common trait and implement JsonSerialize interface. Updated table indexes. Lots of work on getting join with other tables right. Switch to new JsonArrayCollection class to make server requests and responses easier when dealing with other tables.
 * [2fff419e4d](../../commit/2fff419e4dd62991d4a68778dcba6445d3a72733) 2019-03-31T21:46:33+00:00 (Dragonrun1) - Updated Model/PatientWeight to use new common trait and implement JsonSerialize interface. Added/Updated table indexes. Lots of work on getting join with patient right.
 * [e87f0c306c](../../commit/e87f0c306c4406410779a0205ebef4029c39af84) 2019-03-31T21:45:32+00:00 (Dragonrun1) - Updated Model/PatientHeight to use new common trait and implement JsonSerialize interface. Added/Updated table indexes. Lots of work on getting join with patient right.
 * [bfd98c3720](../../commit/bfd98c37205eb25ea3033724a34fcd8a0416a0bf) 2019-03-31T21:33:03+00:00 (Dragonrun1) - Fixed typo in Model/ Permission class and added todo.
 * [f80e952dde](../../commit/f80e952ddefd69a3144ff8163f05597836939c40) 2019-03-31T21:27:25+00:00 (Dragonrun1) - Minor cleanup on Model/Role class. Added todo.
 * [21f6af37ed](../../commit/21f6af37edfccf26f12c15327b4e1cf992fdaf01) 2019-03-31T21:17:56+00:00 (Dragonrun1) - Made Model/UnitOfMeasurement class into an actual Doctrine Entity. Updated it to use new common trait and implement JsonSerialize interface. Added public getters.
 * [555af05b05](../../commit/555af05b05dc879571c60013e462be573ff7a10c) 2019-03-31T21:16:53+00:00 (Dragonrun1) - Made Model/Method class into an actual Doctrine Entity. Updated it to use new common trait and implement JsonSerialize interface. Added public getters.
 * [023ca50799](../../commit/023ca5079916c7ff3d1b895c8d7658fc897831d4) 2019-03-31T21:13:07+00:00 (Dragonrun1) - Make Model/Location class into an actual Doctrine Entity. Updated class to use new common trait and implement JsonSerialize interface. Added public getters.
 * [0a59c07e70](../../commit/0a59c07e702f64f47109cdf942ea54ae5c8700f5) 2019-03-31T21:09:54+00:00 (Dragonrun1) - Updated Model/Gender to use new common trait and implement JsonSerialize interface. Added/Updated table indexes and unique constraints.
 * [fa09f699b6](../../commit/fa09f699b6874e467418f09856680a029fdeea94) 2019-03-31T21:06:10+00:00 (Dragonrun1) - Made Model/BloodPressure class into an actual entity.
 * [3f4670d3e1](../../commit/3f4670d3e1361d333be0ee848ae3d2e575cbf101) 2019-03-31T20:56:00+00:00 (Dragonrun1) - Added JsonArrayCollection that extends from Doctrine's ArrayCollection to make json requests easier to process.
 * [64723268b8](../../commit/64723268b856c932301128562ecfa11358b4cec9) 2019-03-31T20:51:52+00:00 (Dragonrun1) - Extracted some common Entity properties and their methods out into separate trait so they can be reused.
 * [97cf29a8cf](../../commit/97cf29a8cf09a1519d3aa1a367548b5f33361fd7) 2019-03-31T20:46:53+00:00 (Dragonrun1) - Removed several classes from Model/RepositoryRegistry that were added there by mistake.
 * [701c8699cd](../../commit/701c8699cdafee974b28c9b4bbcfc95a18190426) 2019-03-31T20:41:24+00:00 (Dragonrun1) - Updated composer.json to require PHP JSON extension.
 * [7e1f9d2aea](../../commit/7e1f9d2aea49545f4d518fa537e0547a160e6e38) 2019-03-31T20:38:39+00:00 (Dragonrun1) - Added .editorconfig to help standardize formatting code commits for everybody.
 * [d369d09ac1](../../commit/d369d09ac19923dbba1c0845a1fb9f2d0bf23702) 2019-03-31T20:35:43+00:00 (Dragonrun1) - Added JSON serializable method to Model/Entity/User class to help prevent exposing password in JSON.
 * [67bd89d78e](../../commit/67bd89d78e9a39591b0e70bb219980cc81e13fe8) 2019-03-31T20:32:36+00:00 (Dragonrun1) - Added User class to doctrine config.
 * [d321f820f2](../../commit/d321f820f22193aaa571f1b578c281b3fc53e379) 2019-03-31T20:29:00+00:00 (Dragonrun1) - Small tweak to PHP dot_env config to solve some errors.
 * [f38b62405a](../../commit/f38b62405afeeb0e79c5312e90f8c7aa94a0324f) 2019-03-31T20:26:38+00:00 (Dragonrun1) - Added assets/js/jquery.* so we can start using it in the client easier.
 * [4472e0cc07](../../commit/4472e0cc077c70b7249695c0c244415602822076) 2019-03-31T20:24:37+00:00 (Dragonrun1) - Add assets/css/normalize.css file.
 * [6abe2fcce3](../../commit/6abe2fcce366d3dd34e887511e1af364b7cfeff3) 2019-03-31T20:23:33+00:00 (Dragonrun1) - Removed reset.css as normalize.css is better solution.
 * [307ab1ebcf](../../commit/307ab1ebcf259ed4b69514f52f3843071ac19fc9) 2019-03-31T20:20:53+00:00 (Dragonrun1) - Removed 960 grid system as its not very useful for more fluid designs.
 * [7041d7af31](../../commit/7041d7af31f428c8f2492d06c656dc11c135ed65) 2019-03-31T20:04:42+00:00 (Dragonrun1) - Added .env.example for client.
 * [960444a51d](../../commit/960444a51dde8b8a55271582b613e8336eafbad6) 2019-03-20T07:00:41+00:00 (Dragonrun1) - Did a little cleanup on final paper and added PDF version.
 * [a7962304f4](../../commit/a7962304f4e97c9ec4527a533abc7c2164a41e42) 2019-03-20T06:54:41+00:00 (Dragonrun1) - Adding the final paper for capstone
 * [a9a4e23b61](../../commit/a9a4e23b61505836fe18b176e1cd48b782c4df45) 2019-03-19T03:36:41+00:00 (Alec) - Writing my part of the final draft.
 * [3452268eda](../../commit/3452268eda2a1c291909444015c7e29defd42b33) 2019-03-18T22:46:32+00:00 (Alec) - Final rough drafts
 * [e0545a4f77](../../commit/e0545a4f778012ac1013c876ad4ff48d11b1421d) 2019-03-18T22:36:44+00:00 (Alec) - Added repository to php files
 * [35a9e69ed0](../../commit/35a9e69ed07c185ea72a1a3002958a227e302e14) 2019-03-17T20:06:36+00:00 (Dragonrun1) - Added original source of artwork by Bunney to resources/asset_master and my modified versions that are used as source for client images.
 * [e05947c7a3](../../commit/e05947c7a38f57e622fec54053aff5c43e54a701) 2019-03-17T20:02:23+00:00 (Dragonrun1) - Changed index.js to point at server instead of local.
 * [936daf5849](../../commit/936daf5849a9caba53d4c22963bb98e840ee0273) 2019-03-17T19:58:55+00:00 (Dragonrun1) - Refactored banner in index.html to use picture tag so it can be more responsive. Updated main.css for stuff with banner.
 * [d8d0dfde8c](../../commit/d8d0dfde8ceb94d9e143390c4532d7a186ec4346) 2019-03-17T19:58:15+00:00 (Dragonrun1) - Added new reworked header images and icons from work with Bunney.
 * [8ce9f74075](../../commit/8ce9f74075b117996339297bf478c8c9b59d20ae) 2019-03-17T19:50:07+00:00 (Dragonrun1) - Refactored main app menu building into appMenu.js file.
 * [5a5410037b](../../commit/5a5410037b592dc847c97038442dd8449dec7b46) 2019-03-17T19:49:30+00:00 (Dragonrun1) - Added and updated Entity/* and Repository/* from work with electron etc. Some of this is WIP.
 * [5558d9dbfa](../../commit/5558d9dbfa73687bc004009e70c8163e123b43b8) 2019-03-17T19:46:33+00:00 (Dragonrun1) - Updated main .htaccess file to redirect everything to public/index.php.
 * [01ce93074c](../../commit/01ce93074c4cb38589d86acacb365d02d42923dc) 2019-03-17T19:43:34+00:00 (Dragonrun1) - Moved main.js into src/ directory and updated paths. Added exports for win and app to main.js.
 * [7c178a3824](../../commit/7c178a3824e376aa397fc440b1fb52e6a5fb52fd) 2019-03-09T04:59:41+00:00 (Dragonrun1) - Fixed issue with dot_env values not being seen correctly.
 * [4d5573ad34](../../commit/4d5573ad340ea9e00502389773fa7d7e02a8eae6) 2019-03-08T21:40:28+00:00 (Dragonrun1) - Updated/ Added doctrine proxy files.
 * [a5b8cd8e3f](../../commit/a5b8cd8e3f5f957ab693cfcfee6a314405a0f4be) 2019-03-08T19:51:38+00:00 (Dragonrun1) - Fixed url typo in meta tag of index.html file.
 * [26363d176e](../../commit/26363d176e0ada90f0e98af91af56bd5f2c6db26) 2019-03-08T19:49:37+00:00 (Dragonrun1) - Fix try 2 for .htaccess files.
 * [f102d5e563](../../commit/f102d5e563e12fae0a5364ea5a7335f87f3abaac) 2019-03-08T10:36:53+00:00 (Dragonrun1) - Refactored .htaccess files and public/index.php to be simpler.
 * [0619377522](../../commit/0619377522b96fb7d3a7cd5e93de48685010cdce) 2019-03-08T10:34:56+00:00 (Dragonrun1) - Updated composer.lock
 * [31ddffbca1](../../commit/31ddffbca1975e17ad4ac0c742cbf22d27a0a822) 2019-03-08T07:10:36+00:00 (Dragonrun1) - Change log with new v0.0.2 tag
## [0.0.2](../../tree/0.0.2)
 * [8d68df9298](../../commit/8d68df929838ba91ec242770fd3afb61c8ac9e63) 2019-03-08T07:05:42+00:00 (Dragonrun1) - Added developer uuid util to bin/ directory.
 * [f27e79f816](../../commit/f27e79f816212106914008e6f5930ad3471a1d99) 2019-03-08T07:00:43+00:00 (Dragonrun1) - Updated .gitignore for node_modules directory.
 * [58e3707bbe](../../commit/58e3707bbe6fb22e44066220012f501e100fe345) 2019-03-08T06:55:00+00:00 (Dragonrun1) - Adding client/cim-client code for Electron client. Enhanced version from what we demo-ed today. Mostly changes to fix console warnings and improve menus. Started an about page in client.
 * [ce0584bceb](../../commit/ce0584bceba717f66d4912da027f68ebf6f03417) 2019-03-08T06:49:30+00:00 (Dragonrun1) - Updated config files for model routing changes.
 * [3dc6dd6e2f](../../commit/3dc6dd6e2f1631daa8de1323f6005886e5e5eca6) 2019-03-08T06:47:40+00:00 (Dragonrun1) - Added src/middleware.php and src/routes.php. Updated public/index.php for new middleware and routing files.
 * [7e692649e7](../../commit/7e692649e7ac80f8bbcd5b4150db024a7e06a833) 2019-03-08T06:41:22+00:00 (Dragonrun1) - Updated Uuid64Type class.
 * [7a04a35fdf](../../commit/7a04a35fdf66a37ecb674a0cf7b91a2d40979712) 2019-03-08T06:40:03+00:00 (Dragonrun1) - Added Repository classes for Patient, PatientHeight, and PatientWeight entities. Also added public getters to all of them as well.
 * [edbfd94c43](../../commit/edbfd94c431153390d2630f64de60525ce052adb) 2019-03-08T06:31:10+00:00 (Dragonrun1) - Updated Uuid4Trait with new fromFullToBase64 method.
 * [2c56c1be06](../../commit/2c56c1be06c08404b0fbb66ac8e2519575823c73) 2019-03-08T06:28:02+00:00 (Dragonrun1) - Added sodium extension as required in composer.json
 * [f80918abd2](../../commit/f80918abd295e2c70bee3a6b3194b63e47d26548) 2019-03-04T05:45:33+00:00 (Dragonrun1) - Updated DocBlocks to PHP version 7.2+ from 7.0+ text.
 * [f7886b6c62](../../commit/f7886b6c625d8b8bc6eda9924e5a9de604e35930) 2019-03-04T04:43:13+00:00 (Dragonrun1) - Fixed some out of order errors in Version20190304034902 migration file.
 * [943037ddd6](../../commit/943037ddd6b2a1246cacde90acb40d2ff2f54aa6) 2019-03-04T04:05:11+00:00 (Dragonrun1) - Updated autogenerated CHANGELOG.md file.
 * [a0533c9897](../../commit/a0533c989789e45e9bce6edafd3ec4aa9855c831) 2019-03-04T04:02:13+00:00 (Dragonrun1) - Migration Version20190304034902 for new entities.
 * [39b6e5e897](../../commit/39b6e5e89721dcd3a6028db64131e9d757243af3) 2019-03-04T04:00:56+00:00 (Dragonrun1) - First try at entities for Gender, Patient, PatientHeight, PatientWeight, VitalSigns.
 * [3cff67832d](../../commit/3cff67832dd91d2bd30730b9ac85d34ff709f0b7) 2019-03-04T03:58:40+00:00 (Dragonrun1) - Added ChartItMD\Model\RepositoryRegistry class.
 * [ce98726423](../../commit/ce987264230cd907821dab2f860a2640413164c5) 2019-03-04T03:08:56+00:00 (Dragonrun1) - Added initializing migration ChartItMD\Model\Migration\Version20190304000001.
 * [e05dcdbf1f](../../commit/e05dcdbf1f2ce949e26751656ea09e9c38cebb7a) 2019-03-04T03:05:51+00:00 (Dragonrun1) - Updated doctrine config and cim-migrations.php to enable diff command.
 * [0d258adddb](../../commit/0d258adddbc912c86bba72d975b9fc262b4ee5c2) 2019-03-04T00:31:17+00:00 (Dragonrun1) - Added composer.json with doctrine/migrations package. Misc code cleanup for doctrine config etc.
 * [ba53c4eb73](../../commit/ba53c4eb733b1e84802e64d37ed23c15634182cd) 2019-03-03T23:02:39+00:00 (Dragonrun1) - Create custom doctrine migration cli tool in bin/ directory.
 * [ec889b56ff](../../commit/ec889b56ffff31802e5894d03c9614818da55a0f) 2019-03-03T19:58:49+00:00 (Dragonrun1) - Added ChartItMD\Structure\AuthOptions class for rbac. Added ChartItMD\Component\{AuthManager, AuthMiddleware, BaseComponent} classes for rbac. Added new ChartItMD\Exceptions classes for rbac.
 * [74cee28c8d](../../commit/74cee28c8db8a6914fa762344d380d05194e1d33) 2019-03-03T19:53:47+00:00 (Dragonrun1) - Added to ChartItMD\Model\Entity\ namespace the following entities and their repositories: User, Role, Permission, UserRole, RoleHierarchy, RolePermission which are all customized version of of the original Role Base Access Control (rbac).
 * [3be7bfc9ec](../../commit/3be7bfc9eccc81b80f25b6a002e0ddef54930bed) 2019-03-03T19:40:42+00:00 (Dragonrun1) - Added ChartItMD\Model\Uuid64Generator class need in Entity classes for new uuid64 type. Added ChartItMD\Utils\Uuid4Trait trait to be used in Entity classes.
 * [613d2daa83](../../commit/613d2daa835c4ba6986cf89be6024d250273847c) 2019-03-03T19:33:59+00:00 (Dragonrun1) - Added license from "potievdev/slim-rbac" as MIT_LICENSE file.
 * [b8fef013cf](../../commit/b8fef013cf350f561ef86ec248f9a42033d604cb) 2019-03-03T19:31:54+00:00 (Dragonrun1) - Removed composer package "potievdev/slim-rbac" to make room for internal customized version.
 * [8ce25e1d96](../../commit/8ce25e1d96893b2e8013ab18fc48451c0f96a891) 2019-03-03T19:29:06+00:00 (Dragonrun1) - Updated directory structure under src/Models/{Entities, Proxies, Repositories, Types} to singular form src/Model/{Entity, Proxy, Repository, Type} Updated Uuid64Type.php to reflect directory change. Updated doctrine config to reflect updates.
 * [97d2378f41](../../commit/97d2378f419d92fe16df7598c0dd9af3a8e1bd00) 2019-03-01T23:05:52+00:00 (aaichele) - Added my changelog
 * [3983b39813](../../commit/3983b39813f2577f97a1593e22db21e71f1abf84) 2019-03-01T23:05:18+00:00 (aaichele) - Added my changelog
 * [ccca43118b](../../commit/ccca43118b41187c72ba7d9a010af2388cba24d2) 2019-03-01T23:04:08+00:00 (aaichele) - Merge remote-tracking branch 'origin/master'
 * [9427747eb0](../../commit/9427747eb0d147e8444a28d30f766ec7df9f4ee9) 2019-03-01T23:03:44+00:00 (aaichele) - made adjustments to alec.php
 * [37c475b2e3](../../commit/37c475b2e321b77ffcc41a48631b082d03ddadd8) 2019-03-01T23:01:47+00:00 (jwood) - Merge remote-tracking branch 'origin/master'
 * [4bfc8312df](../../commit/4bfc8312df1deea86b4d2430b352769d9ed045a4) 2019-03-01T22:58:33+00:00 (jwood) - Added DBConnection.php a simple page to hold the PDO object.
 * [b333ff2f33](../../commit/b333ff2f336ff2ce4d7bc974b562a17282162828) 2019-03-01T22:57:06+00:00 (aaichele) - Changed test to alec.php
 * [6d90033483](../../commit/6d90033483cecc74a686130fc2803842db7e3186) 2019-03-01T22:56:09+00:00 (aaichele) - Changed test to alec.php
 * [f9f0a57aeb](../../commit/f9f0a57aeb8b810a4a05a2ac2f1719f7a528d7ec) 2019-03-01T22:50:40+00:00 (aaichele) - Put my html stuff in there
 * [dda1b23977](../../commit/dda1b23977ccefa34c55decefe2679dc80a00f09) 2019-02-27T09:50:53+00:00 (Dragonrun1) - Added new Doctrine Uuid64Type custom datatype class. Updated config/doctrine.php to have parameter for custom datatypes and automatically add them when EntityManager factory is called. Changed EM factory to create own DB connection from PDO parameters instead of trying to re-use existing one. This makes it more flexible.
 * [b23584b98b](../../commit/b23584b98b4f5ae78abc591980919a7396b91f6f) 2019-02-27T09:39:23+00:00 (Dragonrun1) - Created/Moved Entities, Proxies, Repositories, and Types directories under src/Models to make relationships more clear.
 * [7c53eaeb4e](../../commit/7c53eaeb4e396e6180137629697f12ee6c641c0f) 2019-02-27T09:21:26+00:00 (Dragonrun1) - Refactored config/entity_manager.php to use ContainerBuilder and PHP-DI container directly instead of loading all of ChartItMD.
 * [4c1b0e3d2d](../../commit/4c1b0e3d2d00a862d5240f1bd5cbfb14f221024b) 2019-02-27T09:17:37+00:00 (Dragonrun1) - Switch to chained addDefinitions calls in ChartItMD class.
 * [b175e682d2](../../commit/b175e682d2db7756ee9e754bdb5782bbb308508f) 2019-02-22T21:38:11+00:00 (Dragonrun1) - Updated .gitignore to ignore the cache/ directory files.
 * [774c67e54f](../../commit/774c67e54f10489f012a7147ae79416b3e01a582) 2019-02-22T21:20:06+00:00 (Dragonrun1) - Added a lot more instructions to .dev_template/README.md about composer and database setup for application and console tools. Other updates and fixes to README.md file. Added some more comments to .env.example file.
 * [f335a3aacb](../../commit/f335a3aacb5b6729983f6e845de534b8494b2df5) 2019-02-22T18:09:04+00:00 (Dragonrun1) - Refactored the command line tools for doctrine and slim-rbac CLIs so they will have matching setup to the rest of ChartItMD but will get their own EntityManager.
 * [e0b9baf973](../../commit/e0b9baf973daba07d709050441649d6bde467f45) 2019-02-22T18:00:03+00:00 (Dragonrun1) - Refactored the config/config.php file.
 * [d977cc3845](../../commit/d977cc38457ec68767458420007f9a1b101a4d15) 2019-02-22T17:57:59+00:00 (Dragonrun1) - Updated PDO Connection class to ensure environmental variables are available when it needs them.
 * [d059ca12e9](../../commit/d059ca12e9b47a9640b7719e2fa5d4b9c54f14f3) 2019-02-22T17:55:19+00:00 (Dragonrun1) - Added some more tests for ChartItMD configuration.
 * [ce28930c0a](../../commit/ce28930c0a851f972c2b7ec37b4551a265dfd395) 2019-02-22T17:53:39+00:00 (Dragonrun1) - Updated ChartItMD to add new definitions for dot env stuff.
 * [ef6e0c6e64](../../commit/ef6e0c6e648450d1b4223480bffe11a0d0073d59) 2019-02-22T17:51:23+00:00 (Dragonrun1) - Moved dot env config out of public/index.php and into app container config where it should be. Did some other minor cleanup on exception handling in index.php.
 * [2ee73bdb9c](../../commit/2ee73bdb9c083bb467f9285d47089f84d682a3d7) 2019-02-22T17:46:07+00:00 (Dragonrun1) - Removing old Xamarin stuff.
 * [d4d6e9fbda](../../commit/d4d6e9fbda410c17792c668e14b681b77b7527d7) 2019-02-22T06:09:36+00:00 (Dragonrun1) - Update composer to my fork of dev tool that was not being updated currently
 * [2fec00bd4d](../../commit/2fec00bd4d9c6ee0f85f374087effb629087140b) 2019-02-22T03:54:40+00:00 (Dragonrun1) - Added config files for Doctrine cli and rbac command line tools.
 * [05868c54dd](../../commit/05868c54ddd14785142dcfa097ee3ca02369185b) 2019-02-22T03:53:02+00:00 (Dragonrun1) - In composer.json added PHP extensions apcu and gmp as required. In composer.json added behat/mink for testing to require-dev.
 * [d2259a41cf](../../commit/d2259a41cf617b41cee4ba56256cad7d13dd2350) 2019-02-22T03:49:51+00:00 (Dragonrun1) - CHANGELOG.md updates
 * [cf64e821bd](../../commit/cf64e821bde15624c90f151a316a51ed1265cc4c) 2019-02-19T02:37:45+00:00 (Dragonrun1) - Updated to fixed version of GitChangeLogCreator. Added new bin/updateChangeLog.php file. Added CHANGELOG.md file.
## [0.0.1](../../tree/0.0.1)
 * [c383f98860](../../commit/c383f9886001a860eb16de92a55c9d9e03eb8e62) 2019-02-19T00:11:03+00:00 (Dragonrun1) - Switch from using Slim/App directly to new ChartItMD wrapper class. Updated index.php to have new env loader stuff. Misc other minor changes.
 * [5497cf3f7f](../../commit/5497cf3f7f268de7f2566467060fa0e5c6f6cc70) 2019-02-19T00:05:52+00:00 (Dragonrun1) - Updated composer.json and lock to reflect all the other check to packages etc.
 * [a10b80a0fd](../../commit/a10b80a0fd5af4cb83f6215821fca7f78e0aae87) 2019-02-19T00:01:23+00:00 (Dragonrun1) - Added new cache/, src/Entities/, and src/Proxies/ directory to be used with Doctrine.
 * [22202c0cdf](../../commit/22202c0cdf628fb57e5fe568e49a66556d139c97) 2019-02-18T23:59:25+00:00 (Dragonrun1) - Removed old ConfigManagerSpec tests and add new ChartItMdSpec tests.
 * [90dc683aca](../../commit/90dc683acab1f0ca797d029ca4d142bd77227d3a) 2019-02-18T23:56:36+00:00 (Dragonrun1) - Added new ChartItMD class file to act as entry point to web application.
 * [aed1c8d5fe](../../commit/aed1c8d5fed0fead39500898fb98903614e3d073) 2019-02-18T23:54:06+00:00 (Dragonrun1) - Added new Pdo/ConnectionInterface and Pdo/Connection files. The Connection is the preferred wrapper class to use instead of accessing PDO directly.
 * [760572e3e5](../../commit/760572e3e571c820ad0cbf4dd6ce9135f274f2ff) 2019-02-18T23:49:46+00:00 (Dragonrun1) - Updated .gitignore to ignore .env file. Added .env.example for the new database env settings.
 * [7f78d20826](../../commit/7f78d20826111082e6fabf9fb662e7c7a43ae159) 2019-02-18T23:47:02+00:00 (Dragonrun1) - Small tweak to phpspec.yml.dist file.
 * [70ab43a270](../../commit/70ab43a2701eb15ba91ac49770f64eec6cee060d) 2019-02-18T23:45:45+00:00 (Dragonrun1) - Removed no longer needed src/Config/ directory and files. Removed junk jqwerty.php file.
 * [9b2932e6d9](../../commit/9b2932e6d946dd9a87e2a91648f9aca394a699cd) 2019-02-18T23:43:43+00:00 (Dragonrun1) - Added some useful docs about project structuring.
 * [72936cbaf0](../../commit/72936cbaf066963abcfdf7380712d0f928e307c0) 2019-02-18T23:42:29+00:00 (Dragonrun1) - Moved config/ settings into per part files: config.php, pdo.php, and doctrine.php Converted them for switch to php-di/slim-bridge from default Slim DIC.
 * [b20c011a4c](../../commit/b20c011a4cb7b551228e96bc59351a8ff14cdedb) 2019-02-18T23:37:26+00:00 (Dragonrun1) - Adding .phpstorm.meta info for psr11 interfaces.
 * [80fb204a6f](../../commit/80fb204a6f14cf2fcc6fd545ae92e9bf7ae814d9) 2019-02-18T23:36:09+00:00 (Dragonrun1) - Updated PHPSpec templates.
 * [65496463f7](../../commit/65496463f7cc6b72da02c907884475fc189b6515) 2019-02-17T07:28:21+00:00 (jwood) - I added a index that serves as a template for each of the pages. it inclues and patient IDbar and a nave bar. I have also added an animated nave bar that may prove to be useless but maybe we could make it into a context senstive menu bar on the right?
 * [215f7e2c9e](../../commit/215f7e2c9ebaa9b0b1a100dd0663e55f033e2959) 2019-02-16T21:44:39+00:00 (Dragonrun1) - patient example doc.
 * [137400beaa](../../commit/137400beaaa7391374eb0073aa2b5343194eb1e5) 2019-02-11T01:48:08+00:00 (Dragonrun1) - Adding dragonrun1/git-change-log-creator to require-dev in composer.json.
 * [4a8b105807](../../commit/4a8b105807e1cfba4ce33ed7ffb890d5e53338c7) 2019-02-10T23:58:36+00:00 (Dragonrun1) - Merge remote-tracking branch 'origin/master'
 * [836dcc2676](../../commit/836dcc267608759758f5484e3ab10f3a8346a33c) 2019-02-10T19:03:38+00:00 (jwood) - fixed login added patientidbar and the php to make it work. something is wrong with the databindings but the values get pulled.
 * [ef2d624158](../../commit/ef2d6241586a1bfefc3e1dfcf57e235311aacd7f) 2019-02-08T21:03:27+00:00 (jwood) - wired up the login page. error msg needs fixed, added the php for the login scripts
 * [c040b1bcd9](../../commit/c040b1bcd952e56f6ba9df44f1dd695549f2c264) 2019-02-01T23:31:20+00:00 (jwood) - added loginpage
 * [83d97ac58a](../../commit/83d97ac58ad03c059a23961dec93ce589f5b7c6f) 2019-02-01T05:06:49+00:00 (Dragonrun1) - Merge remote-tracking branch 'origin/master'
 * [eb19268655](../../commit/eb19268655f0c06c013bbf21ade89c57fe342bb3) 2019-02-01T01:40:19+00:00 (jwood) - I added a simple Loginpage with a login modelview
 * [fa04127d52](../../commit/fa04127d527131a7ad6b1983bc6cac02eb411cb3) 2019-01-31T06:35:13+00:00 (Dragonrun1) - Adding deny .htaccess file to non-web directories.
 * [dfe7b57287](../../commit/dfe7b57287f2e1ec3adfcc5517d60e46cfd45bef) 2019-01-31T06:34:22+00:00 (Dragonrun1) - First try at .htaccess file to redirect to the public/index.php file.
 * [9b8d0c9360](../../commit/9b8d0c93600c2c636caec76cdd558a5cf9535e74) 2019-01-31T06:13:06+00:00 (Dragonrun1) - First try at .htaccess file to redirect to the public/index.php file.
 * [e1cdbae45c](../../commit/e1cdbae45cb27d618f338429a0af42814c8c00db) 2019-01-31T05:22:19+00:00 (Dragonrun1) - Updated developer instructions for setting up per user server staging setup
 * [fadc38062f](../../commit/fadc38062fba7afa2bba464871c82856c9f5e3ba) 2019-01-31T02:42:36+00:00 (jwood) - added classes and set up navbar.::
 * [507a91b332](../../commit/507a91b33205e125ff7221b015d295ed30e6912a) 2019-01-30T00:58:56+00:00 (jwood) - Testing junk
 * [451236e006](../../commit/451236e0061d38f915508807d7b43adc8ef86006) 2019-01-30T00:56:33+00:00 (jwood) - Testing junk
 * [9897c28a31](../../commit/9897c28a31cd920da0250eff46e5a6d835313879) 2019-01-30T00:55:23+00:00 (jwood) - Testing junk
 * [0e6519ae4d](../../commit/0e6519ae4d36dfbd329c93f6d92e824421c21fe0) 2019-01-29T23:29:27+00:00 (Dragonrun1) - Merge remote-tracking branch 'origin/master'
 * [fee9f22dbe](../../commit/fee9f22dbeb8628a96a2e8216e914b5ed4fc941d) 2019-01-29T23:11:32+00:00 (Dragonrun1) - Add misc stuff.
 * [7d53fbe62f](../../commit/7d53fbe62fecf56094fdb98b99441f2c27381f54) 2019-01-29T23:08:37+00:00 (Dragonrun1) - Add behat config file.
 * [fede86261d](../../commit/fede86261d87b93f9d25b7461d886a341f178582) 2019-01-29T23:06:09+00:00 (Dragonrun1) - Add some behat test stuff
 * [fb6d1866ee](../../commit/fb6d1866ee9c32d0ef3228a5d3d3d8e47627c369) 2019-01-29T23:02:03+00:00 (Dragonrun1) - Updated .dev_template/README.md
 * [2201203c40](../../commit/2201203c405a6b6a7b68c8456ffb8b20b602cd47) 2019-01-29T22:57:03+00:00 (Dragonrun1) - Updated composer.json and .lock
 * [a44bbbc465](../../commit/a44bbbc465ad271fdeb74d982203d1d4a119f583) 2019-01-29T22:50:55+00:00 (Dragonrun1) - Added .phpspec directory.
 * [ea8665abd3](../../commit/ea8665abd3235a10859075c7858244f78b58c58b) 2019-01-29T22:45:00+00:00 (jwood) - stuff here:
 * [667fbbec44](../../commit/667fbbec446c9e1851cd9d297b86afd95ba382a1) 2019-01-29T22:44:04+00:00 (jwood) - test
 * [82c668a7c2](../../commit/82c668a7c2630c775d0214c5a6ef19c1b1e8acbb) 2019-01-29T22:38:00+00:00 (jwood) - Revert "hey some stuff here"
 * [4080730a26](../../commit/4080730a260f6d87e8197f64680c06b96390f88a) 2019-01-29T22:27:53+00:00 (jwood) - hey some stuff here ywa
 * [acb1a450a9](../../commit/acb1a450a9174129eff038cca3a39703ae2f6e20) 2019-01-23T06:37:28+00:00 (Dragonrun1) - Added docs/Actors.md file to start capturing some development concepts.
 * [74774518b4](../../commit/74774518b432dbd212f0be2701cb4c2dbc6f6480) 2019-01-23T06:34:49+00:00 (Dragonrun1) - Added first trial features for behat config testing.
 * [faa13c6864](../../commit/faa13c686480e9c793e3a8976d5f8a4bd77fea10) 2019-01-23T06:31:29+00:00 (Dragonrun1) - Added initial behat configuration file.
 * [ff2d8eb941](../../commit/ff2d8eb9419e905b5a682151e6fc57de36ba3429) 2019-01-23T06:30:59+00:00 (Dragonrun1) - Added initial phpspec configuration file.
 * [07f6b3865f](../../commit/07f6b3865f35c83615619de6d79df9dc128d49b6) 2019-01-23T00:46:58+00:00 (Dragonrun1) - Added starter public/ .htaccess and index.php files.
 * [e5b4369117](../../commit/e5b43691175bc4464e7b6c419a6ff3533e804eda) 2019-01-23T00:45:23+00:00 (Dragonrun1) - Added some more composer packages.
 * [ca34a484fb](../../commit/ca34a484fbad4f85825cc1d6bf0a7393b953ce86) 2019-01-21T09:41:16+00:00 (Dragonrun1) - Updated composer packages.
 * [e7be515406](../../commit/e7be51540642d9c15402dc42f8ffd839fdd5a13e) 2019-01-21T09:40:39+00:00 (Dragonrun1) - Added config/, public/, resources/, and tests/ directory.
 * [f63711291b](../../commit/f63711291b2846fa6fbb9b32b37f9e3fd0e25f44) 2019-01-21T08:46:52+00:00 (Dragonrun1) - Added composer.json and composer.lock files.
 * [4db839620b](../../commit/4db839620b94181b7fec937948bcb87c3b6f9eb5) 2019-01-21T07:46:34+00:00 (Dragonrun1) - Added conventions.md file.
 * [b8b0f89cc3](../../commit/b8b0f89cc30a48624c3c9d9e3fe19950e1bb0d7e) 2019-01-21T07:22:25+00:00 (Dragonrun1) - Added developer welcome template directory and files.
 * [b776929508](../../commit/b776929508299ea0cf8e65a208231087a6ab24c6) 2019-01-21T07:20:14+00:00 (Dragonrun1) - Add some more directories.
 * [8635e24366](../../commit/8635e2436678ded381a5712edc6b74506646bcc7) 2019-01-17T10:04:04+00:00 (Dragonrun1) - Add some basic directory structure.
 * [990056a0d6](../../commit/990056a0d6f66f7ffec50a1d0cb271f2c9ca8612) 2019-01-17T10:02:01+00:00 (Dragonrun1) - Init commit

Create with [Git Change Log Creator](https://github.com/Dragonrun1/git-change-log-creator)