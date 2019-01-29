# README_developer.md

## Git setup for windows

Download the exe from https://git-scm.com/downloads
Make sure to get 64bit version if your computer is 64bit.

Run the file to start the install. You will find some included pics for ref in
the git_install(n).png files starting with
[git_install1.png](media/git_install1.png). Most of them should be just the
defaults I think. On the last step of install have it open git-bash for you
we'll be using it in the next couple steps.

See [conventions](conventions.md) for file and path name conventions used in
in the follows sections.

## SSH setup

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

```text
cp {path/to/unzipped/files}/.ssh/config ~/.ssh/
cp {path/to/unzipped/files}/.ssh/cim_rsa ~/.ssh/
```

You can optionally copy the `cim_rsa.pub` there as well. Next the permissions
on the two files need to be set so only your login has access to them.

```bash
chmod 0600 ~/.ssh/*
```

### Testing SSH

Now its time to test SSH to make sure it has been config correctly.

```text
ssh {username}@cim

# Expected sample output:
# Last login: Mon Jan 21 02:03:18 2019 from xxx.xxx.xxx.xxx
#  ____ _                _     ___ _     __  __ ____
# / ___| |__   __ _ _ __| |_  |_ _| |_  |  \/  |  _ \
#| |   | '_ \ / _` | '__| __|  | || __| | |\/| | | | |
#| |___| | | | (_| | |  | |_   | || |_  | |  | | |_| |
# \____|_| |_|\__,_|_|   \__| |___|\__| |_|  |_|____/
#
#Have a lot of fun...
#  {username}@www.chartitmd.com:~>
```

Your user name from above should have been already given to you. If login
doesn't seem to work try `ssh -v {username}@cim` and sent the output to
Mike C. for additional help and troubleshooting. Enter `exit` to leave ssh.

## Git project checkout

The follow steps should give you a working checkout for the project.

### Where to put things

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

### Initial checkout (clone)

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

## Suggestions

Please forward any suggestion for improve this guide to me (Mike C).
