# Conventions

I'll going to establish some conventions we should be using everywhere. When
there's a part of a directory path or a file name that are variable put them
inside of a set of "<>". For example

c:/{my/download/path}/setup.zip

In these you would need to fill in where you'd downloaded the setup.zip too.
Notice how "/" is used and not "\" in the path. Since at least Windows 7 most
things in Windows understands both but not using both in one path. So

c:/some\long/path/

will not work. Tools that come from the Linux world usually do as well but
they all understand "/" so it is easier to use them everywhere now to make
things simpler. If a path or file name has a space in it like "My Docs" do as
shown and put double quotes around it but make sure you do it around the
whole path.

"c:/<path with space>/more/path/"

NOT

c:/"<path with space>"/more/path/

## Comments and Output

Comments for the command line will use '#' before them as most shells use them.
