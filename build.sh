#!/bin/bash
php ./main.php
svgo -f ./out -o ./out
php ./to_img.php