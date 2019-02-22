CHANGELOG.md
============

Auto-generated from Git log.

## Table of Contents

 * [master](#master)
 * [0.0.1](#0.0.1)

## [master](../../tree/master)
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