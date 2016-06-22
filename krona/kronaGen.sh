#!/bin/bash

#export path install krona
export PATH=$PATH:/home/v/d/vdeleeuw/krona/bin
#generation du fichier
./krona/scripts/ImportText.pl $1 -o $2
