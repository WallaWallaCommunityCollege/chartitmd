# README_developer.md

## Git Setup For Windows

Download the exe from https://git-scm.com/downloads
Make sure to get 64bit version if your computer is 64bit.

Run the file to start the install. You will find some included pics for ref in
the git_install(n).png files starting with
[git_install1.png](media/git_install1.png). Most of them should be just the
defaults I think. On the last step of install have it open git-bash for you
we'll be using it in the next couple steps.

See [conventions](conventions.md) for file and path name conventions used in
in the follows sections.

## SSH Setup

All git connections will use ssh for security so it must be setup as well
before you can access anything through git.

You should have received a set of files in a .ssh/ directory like this:

```text
.ssh/
    config
    cim_rsa
    cim_rsa.pub
```

The first two files `config` and `cim_rsa` need to be copied into your personal
.ssh directory using the following commands in the git bash window from above.

```bash
cp <path/to/unzipped/files>/.ssh/config ~/.ssh/
cp <path/to/unzipped/files>/.ssh/cim_rsa ~/.ssh/
```

You can optionally copy the `cim_rsa.pub` there as well. Next the permissions
on the two files need to be set so only your login has access to them.

```bash
chmod 0600 ~/.ssh/*
```

### Testing SSH

Now its time to test SSH to make sure it has been config correctly.

```bash
ssh <username>@cim

# Expected sample output:
# Last login: Mon Jan 21 02:03:18 2019 from xxx.xxx.xxx.xxx
#  ____ _                _     ___ _     __  __ ____
# / ___| |__   __ _ _ __| |_  |_ _| |_  |  \/  |  _ \
#| |   | '_ \ / _` | '__| __|  | || __| | |\/| | | | |
#| |___| | | | (_| | |  | |_   | || |_  | |  | | |_| |
# \____|_| |_|\__,_|_|   \__| |___|\__| |_|  |_|____/
#
#Have a lot of fun...
#  <username>@www.chartitmd.com:~>
```

Your user name from above should have been already given to you. If login
doesn't seem to work try `ssh -v <username>@cim` and sent the output to
Mike C. for additional help and troubleshooting. Enter `exit` to leave ssh.

## Git Project Checkout

The follow steps should give you a working checkout for the project.

### Where To Put Things

First think you need to decide is where you are going to put your checkout of
the project. Some thing to consider are that paths with spaces in them don't
work well because you end up having to quote them a lot of the time. Your
Document or Downloads folders might be okay but usually turn out to be
sub-optimal in many cases as well. Different IDEs etc all tend to make new
project in many different places as well. Something I (Mike C) started using
several years back was a repos/ directory on my main drive. Since I work on or
at least check out many open source projects I've gone to the following
directory structure:

```text
c://repos/
    bitbucket/
    chartitmd/
    Github/
    local/
```

You will notice the first level within is the base host server name for the
first three which makes it much easier to remember where they are from etc.
I suggest using something like this even if the chartitmd project is going to
be the only project there for now. I'll be using this path structure in the
following examples.

### Git User Setup

You will need to setup your information in `git` to use it. Instead of trying
to explain here myself how to do it I'll refer you to the instructions from the
git website. They now even include setting up using Notepad++ for your commit
messages which can be very useful when doing commits from the command line.

https://git-scm.com/book/en/v2/Getting-Started-First-Time-Git-Setup

### Initial Checkout (Cloning)

Change to the directory you are going to use for the project then clone from
the server.

```bash
# If you haven't already made the directory do next line.
mkdir c:/repos/chartitmd/
# Switch to it.
cd c:/repos/chartitmd/
# clone (checkout) project from git.
git clone cim:/srv/git/chartitmd.git
# Expected sample output:
# Cloning into 'chartitmd'...
# remote: Enumerating objects: 7, done.
# remote: Counting objects: 100% (7/7), done.
# remote: Compressing objects: 100% (4/4), done.
# remote: Total 7 (delta 0), reused 0 (delta 0)
# Receiving objects: 100% (7/7), 738 bytes | 184.00 KiB/s, done.
```

You should now see a new chartitmd/ directory inside the already existing one.
Just `cd chartitmd` to have a look at the project layout. You can now start up
your IDE or other editor to start working with it.

## Package (Library) Manager

The main package manager in PHP is Composer and is required by ChartItMD.
Directions for installing Composer can be found at:

https://getcomposer.org/doc/00-intro.md

Note that `composer` is already setup on the ChartItMD server and in your path.
You can confirm it's setup for you there in a ssh connection by running:

```bash
composer --version
# Expected sample output:
# Composer version 1.8.3 2019-01-30 08:31:33
```

## Setup Composer And Command Line Tools

Once you have confirmed your `composer` setup it is time add all the required
packages so things can be run in the local or remote instance like tests and
have the ChartItMD instance work correctly. The easiest way to do this is to
open up a terminal (git-bash) to the root of the project then run the
following:

```bash
composer up
# Expected sample output:
# Loading composer repositories with package information
#  Updating dependencies (including require-dev)
# ... Lots of important (boring) info about packages being installed ...
# Writing lock file
# Generating optimized autoload files
```

Once `composer` is done you'll need to setup some environment variables with your
database user info etc. Start by copying the example file in the root of the
project:

```bash
cp .env.example .env
```

Use the comments you will find in the new `.env` file to make any changes
needed to allow access to the database etc.

### Checking Database Connection

Now that you have added the required environment variable values in `.env` it
is possible to use the doctrine console tool to check some things out. From the
project root directory try the following:

```bash
./vendor/bin/doctrine dbal:run-sql "select table_name from information_schema.tables where table_schema = 'chartitmd'"
# Expected sample output:
# Long list of PHP array output containing table names of the selected database
```

Make sure the `table_schema` value matches your database name. If the table
names seem to match the correct database your connection should now be working.

## Server Side Staging Website Setup

This is an optional step but most developers like to be able to do some testing
server side as well as in their local git. We'll be adding a `public_html`
directory and setting up a new git in it to be used as an additional remote
push target.

Start up git bash again if you closed it before and once more ssh into the
server.

```bash
ssh <username>@cim
```

Next you need to make the `public_html` directory and init a new git repo in it.

```bash
md public_html
cd public_html
git init
# Expected output
#Initialized empty Git repository in /home/<username>/public_html/.git/
```

Next you need to copy the git post receive hook script so when you do pushes to
it the change are available automatically. After copying it the permissions
have to be updated as well. By default git won't let the push do the update so
that config setting needs changed as well.

```bash
cp <path/to/unzipped/files>/hooks/post-receive .git/hooks/
chmod +x .git/hooks/post-receive
git config receive.denyCurrentBranch updateInstead
```

You should now perform the same instructions for setting up `composer` and the
database that was given above and check that the connection works. 

You can now `exit` out of the server but don't close the bash window yet it
will be needed to add the new server side git repo as a remote so you can push
to it from your local copy.

```bash
git remote add staging ssh://<username>@www.chartitmd.com/~/public_html/
```

Now to push the local master to it.

```bash
git push staging master
```

You should now be able to use a web browser and go to

`www.chartitmd.com/~<username>`

and see the main project index. Make sure you include the `~` before the
username.

You can now do a commit to your local git and just push it to your own
staging area and look at the output or use it for testing client side code
interactively etc.

## Suggestions

Please forward any suggestion for improve this guide to me (Mike C).
