#!/usr/bin/perl

print "Content-type:text/html\r\n\r\n";
print '<html>';
print '<head>';
print '<title>MVCCC Upgrade Process</title>';
print '</head>';
print '<body>';
print '<h2>MVCCC Upgrade Process</h2>';
print '</body>';
print '</html>';

use strict;
use warnings;

use LWP::Simple;

my $url = 'https://github.com/Triassic/XiaoLongBao/archive/master.zip';
my $file = 'master.zip';
getstore($url, $file);

system("./update.sh | tee update.log");

1;
