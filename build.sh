#!/bin/bash
php ./main.php
svgo -f ./out -o ./out
# inkscape 3066.svg --export-type=png --export-filename=out.png --export-dpi=100 --export-background-opacity=0.0